<?php

namespace App\Http\Controllers;

use App\Models\Epr;
use App\Models\Inscr;
use Carbon\Carbon;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

/**
 * Contrôleur gérant les arrivées des étudiants aux épreuves.
 */
class ArrivController extends Controller
{
    /**
     * Affiche la page d'accueil des arrivées.
     *
     * @return View
     */
    public function index()
    {
        $breadcrump = [
            ['label' => 'Arrivées', 'url' => '/arriv'],
        ];

        return view('Arriv.index', [
            'allEpr' => Epr::all(),
            'breadcrump' => $breadcrump
        ]);
    }

    /**
     * Récupère l'épreuve sélectionnée pour afficher les arrivées.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function getEpr(Request $request)
    {
        $request->validate([
            'epr' => 'required|integer'
        ]);

        $value = $request['epr'];
        return redirect("/arriv/$value");
    }

    /**
     * Affiche les détails des arrivées pour une épreuve spécifique.
     *
     * @param Epr $epr
     * @return View|RedirectResponse
     */
    public function edit(Epr $epr)
    {
        $breadcrump = [
            ['label' => 'Arrivées', 'url' => '/arriv'],
            ['label' => $epr->date, 'url' => '/arriv/' . $epr->pkEpr],
        ];

        try {
            $nbEtud = $epr->etuds()->count();
            $nbEtudArrive = $epr->etuds()->wherePivot('tend', '<>', 'null')->count();

            $allEtudWalk = $epr->etuds()->wherePivot('rw', '=', 'W')->wherePivot('temps', '<>', 'null')->get();
            $allEtudRun = $epr->etuds()->wherePivot('rw', '=', 'R')->wherePivot('temps', '<>', 'null')->orderBy('temps')->get();

            return view('Arriv.edit', [
                'breadcrump' => $breadcrump,
                'epr' => $epr,
                'nbEtud' => $nbEtud,
                'nbEtudArrive' => $nbEtudArrive,
                'allEtudWalk' => $allEtudWalk,
                'allEtudRun' => $allEtudRun
            ]);
        } catch (\Exception $e) {
            return redirect()->back()->with('alert', ['type' => 'danger', 'message' => 'Erreur.']);
        }

    }

    /**
     * Enregistre l'arrivée d'un étudiant à une épreuve.
     *
     * @param Request $request
     * @param Epr $epr
     * @return RedirectResponse
     */
    public function store(Request $request, Epr $epr)
    {
        $noDos = $request['noDos'];

        try {
            $inscr = $epr->etuds()->wherePivot('noDos', $noDos)->first();

            if (is_null($inscr)) {
                return redirect()->back()->with('alert', ['type' => 'danger', 'message' => 'N° de dossard introuvable pour cette epreuve.']);
            }

            if (!is_null($inscr->pivot->tend)) {
                return redirect()->back()->with('alert', ['type' => 'danger', 'message' => 'Etudiant déjà arrivé']);
            }

            $inscr->pivot->tend = now();

            $tstart = Carbon::createFromTimeString($inscr->pivot->tstart);
            $tend = Carbon::createFromTimeString($inscr->pivot->tend);

            $diff = $tstart->diff($tend);

            $diffFormatted = $diff->format('%H:%I:%S');

            $inscr->pivot->temps = $diffFormatted;
            $inscr->pivot->save();

            return redirect()->back()->with('alert', ['type' => 'success', 'message' => 'Arrivée enregistrée.']);

        } catch (\Exception) {
            return redirect()->back()->with('alert', ['type' => 'danger', 'message' => 'Erreur.']);
        }

    }
}
