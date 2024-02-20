<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

/**
 * Composant Blade pour une barre de recherche.
 */
class Search extends Component
{
    /**
     * Crée une nouvelle instance du composant.
     *
     * Ce composant ne prend aucun argument.
     */
    public function __construct()
    {
        //
    }

    /**
     * Récupère la vue ou le contenu qui représente le composant.
     */
    public function render(): View|Closure|string
    {
        // Retourne la vue associée au composant pour afficher la barre de recherche.
        return view('components.search');
    }
}
