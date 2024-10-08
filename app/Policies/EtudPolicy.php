<?php

namespace App\Policies;

/**
 * Politique d'accès pour les étudiants.
 */
class EtudPolicy
{
    /**
     * Crée une nouvelle instance de politique.
     */
    public function __construct()
    {
        //
    }

    /**
     * Détermine si l'utilisateur peut voir la liste des étudiants.
     */
    public function viewAny()
    {
        return true;
    }

    /**
     * Détermine si l'utilisateur peut voir un étudiant spécifique.
     */
    public function view()
    {
        return true;
    }

    /**
     * Détermine si l'utilisateur peut créer un nouvel étudiant.
     */
    public function create()
    {
        return true;
    }

    /**
     * Détermine si l'utilisateur peut mettre à jour un étudiant existant.
     */
    public function update()
    {
        return true;
    }

    /**
     * Détermine si l'utilisateur peut supprimer un étudiant.
     */
    public function delete()
    {
        return true;
    }
}
