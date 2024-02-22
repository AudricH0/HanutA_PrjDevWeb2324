<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdminRequest;
use App\Models\User;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Database\QueryException;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

/**
 * Contrôleur AdminController
 *
 * Ce contrôleur gère la création et le stockage de nouveaux administrateurs.
 */
class AdminController extends Controller
{

    /**
     * Affiche le formulaire de création d'un nouvel administrateur.
     */
    public function create(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('Admin/Create');
    }

    /**
     * Stocke un nouvel administrateur dans la base de données, connecte celui-ci et redirige vers home.
     */
    public function store(AdminRequest $request): RedirectResponse
    {
        try{
            $request->validated();
            $u = new User();
            $u->login = $request['login'];
            $u->pswd = bcrypt($request['password']);
            $u->admin = true;
            $u->save();
        } catch (QueryException $e)
        {
            return redirect()->back()->with('alert', ['type' => 'danger', 'message' => 'Erreur lors de l\'enregistrement.']);
        } catch (\Exception $e)
        {
            return redirect()->back()->with('alert', ['type' => 'danger', 'message' => 'Erreur.']);
        }

        Auth::login($u);
        return redirect()->route('home');
    }
}
