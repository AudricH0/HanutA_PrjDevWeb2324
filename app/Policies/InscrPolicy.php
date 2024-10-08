<?php

namespace App\Policies;

use App\Models\Inscr;
use App\Models\User;

/**
 * Politique d'accès pour les inscriptions.
 */
class InscrPolicy
{

    /**
     * Crée une nouvelle instance de politique.
     */
    public function __construct()
    {
        //
    }

    /**
     * Détermine si l'utilisateur peut voir la liste des inscription.
     */
    public function viewAny()
    {
        return true;
    }

    /**
     * Détermine si l'utilisateur peut voir une inscription spécifique.
     */
    public function view()
    {
        return true;
    }

    /**
     * Détermine si l'utilisateur peut créer une nouvelle inscription.
     */
    public function create()
    {
        return true;
    }

    /**
     * Détermine si l'utilisateur peut mettre à jour une inscription existant.
     */
    public function update(User $user, Inscr $inscr)
    {
        return is_null($inscr->tend);
    }

    /**
     * Détermine si l'utilisateur peut supprimer une inscription.
     */
    public function delete()
    {
        return true;
    }
}
