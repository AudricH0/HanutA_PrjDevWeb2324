<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

/**
 * Composant Blade pour afficher le tableau de détails d'arrivée des etudiants a une course.
 */
class ArrivTable extends Component
{
    /**
     * Les données de tous les étudiants.
     */
    public $allEtud;

    /**
     * Crée une nouvelle instance de composant.
     */
    public function __construct($allEtud)
    {
        $this->allEtud = $allEtud;
    }

    /**
     * Renvoie la vue ou le contenu représentant le composant.
     */
    public function render(): View|Closure|string
    {
        return view('components.arriv-table');
    }
}
