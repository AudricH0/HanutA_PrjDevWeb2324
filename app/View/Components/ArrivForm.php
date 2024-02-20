<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

/**
 * Composant pour afficher le formulaire d'arrivée des étudiants à une épreuve.
 */
class ArrivForm extends Component
{
    /**
     * Le nombre d'étudiants arrivés.
     */
    public $nbEtudArrive;

    /**
     * Le nombre total d'étudiants.
     */
    public $nbEtud;

    /**
     * Crée une nouvelle instance du composant.
     */
    public function __construct($nbEtudArrive, $nbEtud)
    {
        $this->nbEtudArrive = $nbEtudArrive;
        $this->nbEtud = $nbEtud;
    }

    /**
     * Renvoie la vue / le contenu qui représente le composant.
     */
    public function render(): View|Closure|string
    {
        return view('components.arriv-form');
    }
}
