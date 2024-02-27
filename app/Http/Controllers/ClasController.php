<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClasRequest;
use App\Models\Clas;
use Exception;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

/**
 * Contrôleur ClasController
 *
 * Ce contrôleur gère les opérations liées aux classes dans l'application.
 */
class ClasController extends Controller
{
    /**
     * Crée une nouvelle instance du contrôleur.
     */
    public function __construct()
    {
        $this->authorizeResource(Clas::class, 'clas');
    }

    /**
     * Affiche la liste des classes.
     *
     * @param Request $request
     * @return View|RedirectResponse
     */
    public function index(Request $request)
    {
        $breadcrump = [
            ['label' => 'Classes', 'url' => '/clas'],
        ];

        try {
            $result = Clas::latest()->filter(request(['search']))->paginate(10);
        } catch (Exception) {
            return redirect()->back()->with('alert', ['type' => 'danger', 'message' => 'Erreur.']);
        }


        return view('Clas.index', [
            'allClas' => $result,
            'breadcrump' => $breadcrump
        ]);
    }

    /**
     * Affiche le formulaire de création d'une nouvelle classe.
     *
     * @return View
     */
    public function create()
    {

        $breadcrump = [
            ['label' => 'Classes', 'url' => '/clas'],
            ['label' => 'Nouvelle classe', 'url' => '/clas/create'],
        ];

        return view('Clas.create', [
            'breadcrump' => $breadcrump
        ]);
    }

    /**
     * Affiche le formulaire d'édition d'une classe existante.
     *
     * @param Request $request
     * @param Clas $clas
     * @return View|RedirectResponse
     */
    public function edit(Request $request, Clas $clas)
    {
        $breadcrump = [
            ['label' => 'Classes', 'url' => '/clas'],
            ['label' => $clas->ident, 'url' => '/clas/' . $clas->pkClas],
        ];

        try {
            $allEtuds = $clas->etuds()->filter(request(['search']))->paginate(10);
        } catch (Exception) {
            return redirect()->back()->with('alert', ['type' => 'danger', 'message' => 'Erreur.']);
        }

        return view('Clas.edit', [
            'breadcrump' => $breadcrump,
            'allEtuds' => $allEtuds,
            'clas' => $clas,
        ]);
    }

    /**
     * Affiche le formulaire de confirmation de suppression d'une classe.
     *
     * @param Clas $clas
     * @return View
     */
    public function delete(Clas $clas)
    {
        $breadcrump = [
            ['label' => 'Classes', 'url' => '/clas'],
            ['label' => $clas->ident, 'url' => '/clas/' . $clas->pkClas],
        ];

        return view('Clas.delete', [
            'breadcrump' => $breadcrump,
            'clas' => $clas
        ]);
    }

    /**
     * Enregistre une nouvelle classe dans la base de données.
     *
     * @param ClasRequest $request
     * @return RedirectResponse
     */
    public function store(ClasRequest $request)
    {
        $request = $request->validated();
        $c = new Clas();
        $c->fkEtab = 0;
        $c->ident = $request['ident'];
        $c->niv = $request['niv'];
        $c->nbEtud = 0;

        try
        {
            $c->save();
        }
        catch (Exception)
        {
            return redirect()->route('clas.index')->with('alert', ['type' => 'danger', 'message' => 'Erreur lors de l\'enregistrement.']);
        }

        return redirect()->route('clas.index')->with('alert', ['type' => 'success', 'message' => 'Classe enregistrée.']);
    }

    /**
     * Supprime une classe de la base de données.
     *
     * @param Clas $clas
     * @return RedirectResponse
     */
    public function destroy(Clas $clas)
    {
        try
        {
            $clas->delete();
        }
        catch (Exception)
        {
            return redirect()->back()->with('alert', ['type' => 'danger', 'message' => 'Impossible de supprimer la classe']);
        }

        return redirect()->route('clas.index')->with('alert', ['type' => 'success', 'message' => 'Classe supprimée']);
    }

    /**
     * Met à jour une classe dans la base de données.
     *
     * @param ClasRequest $request
     * @param Clas $clas
     * @return RedirectResponse
     */
    public function update(ClasRequest $request, Clas $clas)
    {
        $request = $request->validated();

        try
        {
            $clas->ident = $request['ident'];
            $clas->niv = $request['niv'];
            $clas->save();
        }
        catch (Exception)
        {
            return redirect()->back()->with('alert', ['type' => 'danger', 'message' => 'Impossible de mettre à jour la classe']);
        }

        return redirect()->back()->with('alert', ['type' => 'success', 'message' => 'Classe mise à jour']);
    }
}
