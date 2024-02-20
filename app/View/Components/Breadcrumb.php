<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

/**
 * Composant Breadcrumb
 *
 * Ce composant est utilisé pour afficher une barre de navigation
 * en utilisant des éléments de navigation spécifiés.
 */
class Breadcrumb extends Component
{
    public array $items;
    /**
     * Les éléments de navigation à afficher dans la barre de navigation.
     */

    /**
     * Crée une nouvelle instance de composant.
     */
    public function __construct(array $items)
    {
        $this->items = $items;
    }

    /**
     * Récupère la vue ou le contenu représentant le composant.
     */
    public function render(): View|Closure|string
    {
        return view('components.breadcrump');
    }
}
