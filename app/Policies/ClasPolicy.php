<?php

namespace App\Policies;

use Illuminate\Support\Facades\DB;
use Illuminate\Auth\Access\Response;

/**
 * Politique d'accès pour les classes.
 */
class ClasPolicy
{
    /**
     * Crée une nouvelle instance de politique.
     */
    public function __construct()
    {
        //
    }

    /**
     * Détermine si l'utilisateur peut voir toutes les classes.
     */
    public function viewAny()
    {
        return true;
    }

    /**
     * Détermine si l'utilisateur peut voir une classe spécifique.
     */
    public function view()
    {
        return true;
    }

    /**
     * Détermine si l'utilisateur peut créer une nouvelle classe.
     */
    public function create()
    {
        return DB::table('class')->count() === 0
            ? Response::allow()
            : Response::deny('Une classe est déjà enregistrée dans la base de données');
    }

    /**
     * Détermine si l'utilisateur peut mettre à jour une classe.
     */
    public function update()
    {
        return true;
    }

    /**
     * Détermine si l'utilisateur peut supprimer une classe.
     */
    public function delete()
    {
        return true;
    }
}
