<?php

namespace App\Http\Controllers;

use App\Models\Epr;
use App\Models\Inscr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

/**
 * Contrôleur gérant les arrivées des étudiants aux épreuves.
 */
class ArrivController extends Controller
{
    /**
     * Affiche la page d'accueil des arrivées.
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

            $allEtud = $epr->etuds()->wherePivot('rw', '=', 'W')->get();

            return view('Arriv.edit', [
                'breadcrump' => $breadcrump,
                'epr' => $epr,
                'nbEtud' => $nbEtud,
                'nbEtudArrive' => $nbEtudArrive,
                'allEtud' => $allEtud
            ]);
        } catch (\Exception $e) {
            return redirect()->back()->with('alert', ['type' => 'danger', 'message' => 'Erreur.']);
        }

    }

    /**
     * Enregistre l'arrivée d'un étudiant à une épreuve.
     */
    public function store(Request $request, Epr $epr)
    {
        try {
            $inscr = Inscr::where('noDos', $request['noDos'])->first();
            $inscr = $epr->etuds()->find($inscr->fkEtud);

            if(! is_null($inscr->pivot->tend))
            {
                return redirect()->back()->with('alert', ['type' => 'danger', 'message' => 'Etudiant déjà arrivé']);
            }

            $inscr->pivot->tend = now();
            $inscr->pivot->save();

            return redirect()->back()->with('alert', ['type' => 'success', 'message' => 'Arrivée enregistrée.']);

        } catch (\Exception $e) {
            return redirect()->back()->with('alert', ['type' => 'danger', 'message' => 'Erreur.']);
        }

    }
}
