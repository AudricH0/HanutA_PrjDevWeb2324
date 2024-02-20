<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;

/**
 * Middleware AdminCreated
 *
 * Ce middleware vérifie si un administrateur a déjà été créé dans l'application.
 * Si un utilisateur est enregistré dans la base de données, il redirige l'utilisateur
 * vers la page d'accueil.
 */
class AdminCreated
{
    /**
     * Manipule une requête entrante.
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!$this->isFirstTimeSetup()) {
            return redirect()->route('home');
        }

        return $next($request);
    }

    /**
     * Vérifie si un administrateur a déjà été créé.
     */
    private function isFirstTimeSetup(): bool
    {
        return DB::table('users')->count() === 0;
    }
}
