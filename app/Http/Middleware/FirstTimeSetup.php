<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;

/**
 * Middleware FirstTimeSetup
 *
 * Ce middleware vérifie si c'est la première fois que le setup est effectué dans l'application.
 * S'il n'y a aucun utilisateur enregistré dans la base de données, il redirige l'utilisateur
 * vers la page d'inscription de l'administrateur.
 */
class FirstTimeSetup
{
    /**
     * Manipule une requête entrante.
     *
     * @param Closure(Request): (Response) $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if ($this->isFirstTimeSetup() && !$request->is('admin/register')) {
            return redirect()->route('register.admin');
        }

        return $next($request);
    }

    /**
     * Vérifie si c'est la première fois que le setup est effectué.
     */
    private function isFirstTimeSetup(): bool
    {
        return DB::table('users')->count() === 0;
    }
}
