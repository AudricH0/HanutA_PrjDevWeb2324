<?php

namespace App\Http\Controllers;

use App\Http\Requests\EtudRequest;
use App\Models\Clas;
use App\Models\Etud;
use Exception;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

/**
 * Contrôleur pour la gestion des étudiants.
 */
class EtudController extends Controller
{
    /**
     * Crée une nouvelle instance du contrôleur.
     */
    public function __construct()
    {
        $this->authorizeResource(Etud::class, 'etud');
    }

    /**
     * Affiche la liste des étudiants.
     *
     * @param Request $request
     * @return View|RedirectResponse
     */
    public function index(Request $request)
    {
        $breadcrump = [
            ['label' => 'Etudiants', 'url' => '/etud'],
        ];

        try {
            $result = Etud::latest()->filter(request(['search']))->paginate(10);
        } catch (Exception) {
            return redirect()->back()->with('alert', ['type' => 'danger', 'message' => 'Erreur.']);
        }

        return view('Etud.index', [
            'allEtud' => $result,
            'breadcrump' => $breadcrump
        ]);
    }

    /**
     * Affiche le formulaire de création d'un nouvel étudiant.
     *
     * @return View
     */
    public function create()
    {
        $breadcrump = [
            ['label' => 'Etudiants', 'url' => '/etud'],
            ['label' => 'Nouvel etudiant', 'url' => '/etud/create'],
        ];

        return view('Etud.create', [
            'allClas' => Clas::all(),
            'breadcrump' => $breadcrump
        ]);
    }

    /**
     * Enregistre un nouvel étudiant dans la base de données.
     *
     * @param EtudRequest $request
     * @return RedirectResponse
     */
    public function store(EtudRequest $request)
    {
        $request = $request->validated();

        $e = new Etud();
        $e->nom = $request['nom'];
        $e->pren = $request['pren'];
        $e->sexe = $request['sexe'];
        $e->nbIns = 0;
        $e->fkClas = $request['clas'];

        try
        {
            $e->save();
        }
        catch (Exception)
        {
            return redirect()->route('etud.index')->with('alert', ['type' => 'danger', 'message' => 'Erreur lors de l\'enregistrement de l\'etudiant.']);
        }

        return redirect()->route('etud.index')->with('alert', ['type' => 'success', 'message' => 'Etudiant enregistré.']);
    }

    /**
     * Affiche le formulaire de modification d'un étudiant.
     *
     * @param Request $request
     * @param Etud $etud
     * @return View|RedirectResponse
     */
    public function edit(Request $request, Etud $etud)
    {
        $breadcrump = [
            ['label' => 'Etudiants', 'url' => '/etud'],
            ['label' => $etud->nom, 'url' => '/etud/' . $etud->pkEtud],
        ];

        try {
            $allEpr = $etud->eprs()->filter(request(['search']))->paginate(10);
        } catch (Exception) {
            return redirect()->back()->with('alert', ['type' => 'danger', 'message' => 'Erreur.']);
        }

        return view('Etud.edit', [
            'breadcrump' => $breadcrump,
            'etud' => $etud,
            'allClas' => Clas::all(),
            'allEpr' => $allEpr
        ]);
    }

    /**
     * Met à jour les informations d'un étudiant dans la base de données.
     *
     * @param EtudRequest $request
     * @param Etud $etud
     * @return RedirectResponse
     */
    public function update(EtudRequest $request, Etud $etud)
    {
        $request = $request->validated();

        try
        {
            $etud->nom = $request['nom'];
            $etud->pren = $request['pren'];
            $etud->sexe = $request['sexe'];
            $etud->fkClas = $request['clas'];
            $etud->save();
        }
        catch (Exception)
        {
            return redirect()->back()->with('alert', ['type' => 'danger', 'message' => 'Impossible de mettre à jour l\'etudiant']);
        }

        return redirect()->back()->with('alert', ['type' => 'success', 'message' => 'Etudiant mis à jour']);
    }

    /**
     * Affiche le formulaire de confirmation de suppression d'un étudiant.
     *
     * @param Etud $etud
     * @return View
     */
    public function delete(Etud $etud)
    {
        $breadcrump = [
            ['label' => 'Etudiants', 'url' => '/etud'],
            ['label' => $etud->nom, 'url' => '/etud/' . $etud->pkEtud],
        ];

        return view('Etud.delete', [
            'breadcrump' => $breadcrump,
            'etud' => $etud
        ]);
    }

    /**
     * Supprime un étudiant de la base de données.
     *
     * @param Etud $etud
     * @return RedirectResponse
     */
    public function destroy(Etud $etud)
    {
        try
        {
            $etud->delete();
        }
        catch (Exception)
        {
            return redirect()->back()->with('alert', ['type' => 'danger', 'message' => 'Impossible de supprimer l\'etudiant']);
        }

        return redirect()->route('etud.index')->with('alert', ['type' => 'success', 'message' => 'Etudiant supprimé']);
    }
}
