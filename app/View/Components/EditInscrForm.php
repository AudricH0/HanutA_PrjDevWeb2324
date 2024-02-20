<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

/**
 * Composant pour afficher le formulaire de modification des inscriptions à une épreuve.
 */
class EditInscrForm extends Component
{
    /**
     * Toutes les épreuves disponibles.
     */
    public $allEpr;

    /**
     * L'épreuve spécifique à laquelle les inscriptions sont associées.
     */
    public $epr;

    /**
     * Liste des étudiants déjà inscrits à l'épreuve.
     */
    public $allEtudIn;

    /**
     * Liste des étudiants disponibles pour l'inscription à l'épreuve.
     */
    public $allEtudNotIn;

    /**
     * Crée une nouvelle instance du composant.
     */
    public function __construct($allEpr, $epr, $allEtudIn, $allEtudNotIn)
    {
        $this->allEpr = $allEpr;
        $this->epr = $epr;
        $this->allEtudIn = $allEtudIn;
        $this->allEtudNotIn = $allEtudNotIn;
    }

    /**
     * Renvoie la vue / le contenu qui représente le composant.
     */
    public function render(): View|Closure|string
    {
        return view('components.edit-inscr-form');
    }
}
