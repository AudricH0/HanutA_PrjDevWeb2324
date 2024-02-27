<?php

namespace App\Http\Controllers;

use App\Http\Requests\SessionRequest;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/**
 * Contrôleur SessionController
 *
 * Ce contrôleur gère les opérations de gestion de session utilisateur,
 * telles que la connexion, la déconnexion, etc.
 */
class SessionController extends Controller
{
    /**
     * Affiche le formulaire de connexion.
     *
     * @return Factory|View
     */
    public function create()
    {
        return view('Session.create');
    }

    /**
     * Gère la soumission du formulaire de connexion.
     *
     * @param SessionRequest $request
     * @return RedirectResponse
     */
    public function store(SessionRequest $request)
    {
        $creds = $request->validated();
        if (Auth::attempt($creds))
        {
            $request->session()->regenerate();
            return redirect()->route('home');
        }

        return redirect()->back()->with('alert', ['type' => 'danger', 'message' => 'Nom d\'utilisateur ou mot de passe incorrect.'])->onlyInput('login');
    }

    /**
     * Affiche la page de confirmation de déconnexion.
     *
     * @return Factory|View
     */
    public function logout()
    {
        $breadcrump = [
            ['label' => 'Se déconnecter', 'url' => '/logout'],
        ];

        return view('Session.delete', [
            'breadcrump' => $breadcrump
        ]);
    }

    /**
     * Déconnecte l'utilisateur.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function destroy(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
}
