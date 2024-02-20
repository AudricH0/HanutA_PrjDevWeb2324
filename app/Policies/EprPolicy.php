<?php

namespace App\Policies;

/**
 * Contrôle l'accès aux ressources des épreuves.
 */
class EprPolicy
{
    /**
     * Crée une nouvelle instance de politique.
     */
    public function __construct()
    {
        //
    }

    /**
     * Détermine si l'utilisateur peut voir la liste des épreuves.
     */
    public function viewAny()
    {
        return true;
    }

    /**
     * Détermine si l'utilisateur peut voir une épreuve spécifique.
     */
    public function view()
    {
        return true;
    }

    /**
     * Détermine si l'utilisateur peut créer une nouvelle épreuve.
     */
    public function create()
    {
        return true;
    }

    /**
     * Détermine si l'utilisateur peut mettre à jour une épreuve existante.
     */
    public function update()
    {
        return true;
    }

    /**
     * Détermine si l'utilisateur peut supprimer une épreuve.
     */
    public function delete()
    {
        return true;
    }
}
