<?php

namespace App\Http\Controllers;

use App\Models\Epr;
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
    }

    /**
     * Enregistre l'arrivée d'un étudiant à une épreuve.
     */
    public function store(Request $request, Epr $epr)
    {
        $inscr = DB::table('inscrs')->where('noDos', $request['noDos'])->first();

        $inscr = $epr->etuds()->find($inscr->fkEtud);

        if(is_null($inscr->pivot->tend))
        {
            $inscr->pivot->tend = now();
        } else {
            return redirect()->back()->with('alert', ['type' => 'danger', 'message' => 'Etudiant déjà arrivé']);
        }
        $inscr->pivot->save();

        return redirect()->back()->with('alert', ['type' => 'success', 'message' => 'Arrivée enregistrée.']);
    }
}
