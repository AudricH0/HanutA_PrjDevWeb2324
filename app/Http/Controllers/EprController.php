<?php

namespace App\Http\Controllers;

use App\Http\Requests\EprRequest;
use App\Models\Epr;
use Exception;
use Illuminate\Http\Request;

/**
 * Gère les opérations liées aux épreuves.
 */
class EprController extends Controller
{
    /**
     * Crée une nouvelle instance du contrôleur.
     */
    public function __construct()
    {
        $this->authorizeResource(Epr::class, 'epr');
    }

    /**
     * Affiche la liste des épreuves.
     */
    public function index(Request $request)
    {
        $breadcrump = [
            ['label' => 'Epreuves', 'url' => '/epr'],
        ];

        $result = Epr::latest()->filter(request(['search']))->paginate(10);

        return view('Epr.index', [
            'allEpr' => $result,
            'breadcrump' => $breadcrump
        ]);
    }

    /**
     * Affiche le formulaire de création d'une nouvelle épreuve.
     */
    public function create()
    {
        $breadcrump = [
            ['label' => 'Epreuves', 'url' => '/epr'],
            ['label' => 'Nouvelle epreuve', 'url' => '/epr/create'],
        ];

        return view('Epr.create', [
            'breadcrump' => $breadcrump
        ]);
    }

    /**
     * Enregistre une nouvelle épreuve.
     */
    public function store(EprRequest $request)
    {
        $request = $request->validated();
        $e = new Epr();
        $e->date = $request['date'];
        $e->dist = $request['dist'];
        $e->tstart = $request['tstart'];
        $e->anSco = $request['anSco'];
        $e->nbPart = 0;

        try
        {
            $e->save();
        }
        catch (Exception)
        {
            return redirect()->route('epr.index')->with('alert', ['type' => 'danger', 'message' => 'Erreur lors de l\'enregistrement de l\'epreuve.']);
        }

        return redirect()->route('epr.index')->with('alert', ['type' => 'success', 'message' => 'Epreuve enregistrée.']);
    }

    /**
     * Affiche le formulaire d'édition d'une épreuve existante.
     */
    public function edit(Request $request, Epr $epr)
    {
        $breadcrump = [
            ['label' => 'Epreuves', 'url' => '/epr'],
            ['label' => $epr->date, 'url' => '/epr/' . $epr->pkEpr],
        ];

        $allEtuds = $epr->etuds()->filter(request(['search']))->paginate(10);

        return view('Epr.edit', [
            'breadcrump' => $breadcrump,
            'epr' => $epr,
            'allEtuds' => $allEtuds,
        ]);
    }

    /**
     * Met à jour une épreuve existante.
     */
    public function update(EprRequest $request, Epr $epr)
    {
        $request = $request->validated();

        $epr->date = $request['date'];
        $epr->dist = $request['dist'];
        $epr->tstart = $request['tstart'];
        $epr->anSco = $request['anSco'];

        try
        {
            $epr->save();
        }
        catch (Exception)
        {
            return redirect()->back()->with('alert', ['type' => 'danger', 'message' => 'Impossible de mettre à jour l\'épreuve']);
        }

        return redirect()->back()->with('alert', ['type' => 'success', 'message' => 'Epreuve mise à jour']);
    }

    /**
     * Affiche le formulaire de confirmation de suppression d'une épreuve.
     */
    public function delete(Epr $epr)
    {
        $breadcrump = [
            ['label' => 'Epreuves', 'url' => '/epr'],
            ['label' => $epr->date, 'url' => '/epr/' . $epr->pkEpr],
        ];

        return view('Epr.delete', [
            'breadcrump' => $breadcrump,
            'epr' => $epr
        ]);
    }

    /**
     * Supprime une épreuve.
     */
    public function destroy(Epr $epr)
    {
        try
        {
            $epr->delete();
        }
        catch (Exception)
        {
            return redirect()->back()->with('alert', ['type' => 'danger', 'message' => 'Impossible de supprimer l\'epreuve']);
        }

        return redirect()->route('epr.index')->with('alert', ['type' => 'success', 'message' => 'Epreuve supprimée']);
    }
}

