<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

/**
 * Composant Blade pour afficher un tableau d'étudiants.
 */
class EtudTable extends Component
{
    /**
     * La liste de tous les étudiants à afficher dans le tableau.
     */
    public $allEtud;

    /**
     * Crée une nouvelle instance du composant.
     */
    public function __construct($allEtud)
    {
        $this->allEtud = $allEtud;
    }

    /**
     * Récupère la vue ou le contenu qui représente le composant.
     */
    public function render(): View|Closure|string
    {
        // Retourne la vue associée au composant pour afficher le tableau d'étudiants.
        return view('components.etud-table');
    }
}
