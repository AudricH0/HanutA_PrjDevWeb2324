<?php

namespace App\Policies;

class EtudPolicy
{
    /**
     * Politique d'accès pour les étudiants.
     */
    public function __construct()
    {
        //
    }

    public function viewAny()
    {
        return true;
    }

    public function view()
    {
        return true;
    }

    public function create()
    {
        return true;
    }

    public function update()
    {
        return true;
    }

    public function delete()
    {
        return true;
    }
}
