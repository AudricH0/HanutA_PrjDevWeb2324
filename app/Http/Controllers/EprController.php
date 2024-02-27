<?php

namespace App\Http\Controllers;

use App\Http\Requests\EprRequest;
use App\Models\Epr;
use Exception;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
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
     *
     * @param Request $request
     * @return View|RedirectResponse
     */
    public function index(Request $request)
    {
        $breadcrump = [
            ['label' => 'Epreuves', 'url' => '/epr'],
        ];

        try {
            $result = Epr::latest()->filter(request(['search']))->paginate(10);
        } catch (Exception) {
            return redirect()->back()->with('alert', ['type' => 'danger', 'message' => 'Erreur.']);
        }

        return view('Epr.index', [
            'allEpr' => $result,
            'breadcrump' => $breadcrump
        ]);
    }

    /**
     * Affiche le formulaire de création d'une nouvelle épreuve.
     *
     * @return View
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
     *
     * @param EprRequest $request
     * @return RedirectResponse
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
     *
     * @param Request $request
     * @param Epr $epr
     * @return View|RedirectResponse
     */
    public function edit(Request $request, Epr $epr)
    {
        $breadcrump = [
            ['label' => 'Epreuves', 'url' => '/epr'],
            ['label' => $epr->date, 'url' => '/epr/' . $epr->pkEpr],
        ];

        try {
            $allEtuds = $epr->etuds()->filter(request(['search']))->paginate(10);
        } catch (Exception) {
            return redirect()->back()->with('alert', ['type' => 'danger', 'message' => 'Erreur.']);
        }

        return view('Epr.edit', [
            'breadcrump' => $breadcrump,
            'epr' => $epr,
            'allEtuds' => $allEtuds,
        ]);
    }

    /**
     * Met à jour une épreuve existante.
     *
     * @param EprRequest $request
     * @param Epr $epr
     * @return RedirectResponse
     */
    public function update(EprRequest $request, Epr $epr)
    {
        $request = $request->validated();

        try
        {
            $epr->date = $request['date'];
            $epr->dist = $request['dist'];
            $epr->tstart = $request['tstart'];
            $epr->anSco = $request['anSco'];
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
     *
     * @param Epr $epr
     * @return View
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
     *
     * @param Epr $epr
     * @return RedirectResponse
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

