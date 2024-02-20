<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

/**
 * Composant Blade pour représenter un tableau d'affichage des épreuves.
 */
class EprTable extends Component
{
    /**
     * Les épreuves à afficher dans le tableau.
     */
    public $allEpr;

    /**
     * Crée une nouvelle instance du composant.
     */
    public function __construct($allEpr)
    {
        $this->allEpr = $allEpr;
    }

    /**
     * Récupère la vue ou le contenu qui représente le composant.
     */
    public function render(): View|Closure|string
    {
        return view('components.epr-table');
    }
}
