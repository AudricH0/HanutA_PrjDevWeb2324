<?php

namespace App\Http\Controllers;

use App\Http\Requests\InscrRequest;
use App\Models\Epr;
use App\Models\Etud;
use App\Models\Inscr;
use Exception;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

/**
 * Contrôleur pour la gestion des inscriptions aux épreuves.
 */
class InscrController extends Controller
{

    /**
     * Affiche la liste des épreuves disponibles pour les inscriptions.
     */
    public function index()
    {
        $breadcrump = [
            ['label' => 'Inscriptions', 'url' => '/inscr'],
        ];

        return view('Inscr.index', [
            'allEpr' => Epr::all(),
            'breadcrump' => $breadcrump
        ]);
    }

    /**
     * Affiche le formulaire pour l'inscription à une épreuve spécifique.
     */
    public function edit(Epr $epr): RedirectResponse|\Illuminate\Contracts\Foundation\Application|Factory|View|Application
    {
        $breadcrump = [
            ['label' => 'Inscriptions', 'url' => '/inscr'],
            ['label' => $epr->date, 'url' => '/inscr/' . $epr->pkEpr],
        ];

        try {
            $allEtudIn = $epr->etuds()->paginate(10);

            $allEtudNotIn = Etud::
            whereNotIn('pkEtud', function ($query) use ($epr) {
                $query->select('fkEtud')
                    ->from('inscrs')
                    ->leftJoin('etuds', 'inscrs.fkEtud', '=', 'etuds.pkEtud')
                    ->where('fkEpr', $epr->pkEpr);
            })->get();
        } catch (\Exception $e) {
            return redirect()->back()->with('alert', ['type' => 'danger', 'message' => 'Erreur.']);
        }


        return view('Inscr.edit', [
            'allEpr' => Epr::all(),
            'epr' => $epr,
            'allEtudIn' => $allEtudIn,
            'allEtudNotIn' => $allEtudNotIn,
            'breadcrump' => $breadcrump
        ]);
    }

    /**
     * Récupère l'ID de l'épreuve sélectionnée et redirige vers la page de modification de l'inscription.
     */
    public function getEpr(Request $request)
    {
        $request->validate([
            'epr' => 'required|integer'
        ]);
        $value = $request->input('epr');
        return redirect("/inscr/$value");
    }

    /**
     * Traite la soumission du formulaire d'inscription et enregistre l'inscription à l'épreuve.
     */
    public function store(InscrRequest $request, Epr $epr)
    {
        $validated = $request->validated();

        try
        {
            $noDos = DB::table('Inscrs')->max('noDos');

            if (DB::table('Inscrs')->count() == 0) {
                $noDos = 1001;
            } else {
                $noDos = $noDos + 1;
            }

            $tstart = $epr->tstart ?? $validated['tstart'];

            $epr->etuds()->attach($validated['etud'], ['noDos' => $noDos, 'rw' => $validated['rw'], 'tstart' => $tstart]);
            $etud = Etud::findOrFail($validated['etud']);
            $etud->nbIns++;
            $epr->nbPart++;

            $etud->save();
            $epr->save();
        }
        catch (Exception)
        {
            return redirect()->back()->with('alert', ['type' => 'danger', 'message' => 'Erreur lors de l\'enregistrement de l\'inscription.']);
        }

        return redirect()->back()->with('alert', ['type' => 'success', 'message' => 'Etudiant inscrit']);
    }

    /**
     * Traite la suppression d'une inscription à une épreuve.
     */
    public function destroy(Request $request, Epr $epr)
    {
        try
        {
            $inscr = $epr->etuds()->find($request->input('etud'));

            if (!is_null($inscr->pivot->tend)) {
                return redirect()->back()->with('alert', ['type' => 'danger', 'message' => 'Etudiant déjà arrivé']);
            }

            $etud = Etud::findOrFail($request->input('etud'));
            $etud->nbIns--;
            $epr->etuds()->detach($etud);
            $epr->nbPart--;

            $etud->save();
            $epr->save();
        }
        catch (Exception)
        {
            return redirect()->back()->with('alert', ['type' => 'danger', 'message' => 'Erreur lors de la suppression de l\'inscription.']);
        }

        return redirect()->back()->with('alert', ['type' => 'warning', 'message' => 'Etudiant désinscrit']);
    }

    /**
     * Affiche les détails d'une inscription à une épreuve.
     */
    public function show(Epr $epr, Etud $etud)
    {
        $breadcrump = [
            ['label' => 'Inscriptions', 'url' => '/inscr'],
            ['label' => $epr->date, 'url' => '/inscr/' . $epr->pkEpr],
            ['label' => $etud->nom, 'url' => '/etud/' . $epr->pkEpr],
        ];

        return view('Inscr.show', [
            'etud' => $epr->etuds()->find($etud->pkEtud),
            'epr' => $epr,
            'breadcrump' => $breadcrump
        ]);
    }

    /**
     * Met à jour les détails d'une inscription à une épreuve.
     * @throws AuthorizationException
     */
    public function update(Request $request, Epr $epr, Etud $etud)
    {
        $request->validate([
            'rw' => 'required'
        ]);

        try {
            $inscr = Inscr::where('fkEpr', $epr->pkEpr)->where('fkEtud', $etud->pkEtud)->first();
            $this->authorize('update', $inscr);
            $inscr = $epr->etuds()->find($etud->pkEtud);
            $inscr->pivot->rw = $request['rw'];

            if (isset($request['tstart']) && is_null($epr->tstart)) {
                $inscr->pivot->tstart = $request['tstart'];
            }
            $inscr->pivot->save();
        } catch (\Illuminate\Auth\Access\AuthorizationException $e) {
            return redirect()->back()->with('alert', ['type' => 'danger', 'message' => 'Impossible de modifié car l\'étudiant a terminé la courseeeee']);
        } catch (Exception) {
            return redirect()->back()->with('alert', ['type' => 'danger', 'message' => 'Erreur lors de la modification de l\'inscription.']);
        }

        return redirect()->back()->with('alert', ['type' => 'success', 'message' => 'Inscription modifiée']);
    }
}
