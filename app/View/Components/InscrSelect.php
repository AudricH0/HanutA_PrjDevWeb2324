<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

/**
 * Représente un composant de sélection des épreuves pour les inscriptions.
 */
class InscrSelect extends Component
{
    /**
     * La liste de toutes les épreuves disponibles pour l'inscription.
     */
    public $allEpr;

    /**
     * Crée une nouvelle instance de composant.
     */
    public function __construct($allEpr)
    {
        $this->allEpr = $allEpr;
    }

    /**
     * Renvoie la vue ou le contenu qui représente le composant.
     */
    public function render(): View|Closure|string
    {
        return view('components.inscr-select');
    }
}
