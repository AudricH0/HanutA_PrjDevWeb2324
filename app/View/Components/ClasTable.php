<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

/**
 * Composant Blade pour afficher une table de classes.
 */
class ClasTable extends Component
{
    /**
     * Les classes à afficher dans la table.
     */
    public $allClas;

    /**
     * Crée une nouvelle instance du composant.
     */
    public function __construct($allClas)
    {
        $this->allClas = $allClas;
    }

    /**
     * Récupère la vue ou le contenu qui représente le composant.
     */
    public function render(): View|Closure|string
    {
        return view('components.clas-table');
    }
}
