<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

/**
 * Composant Blade pour afficher un formulaire de suppression.
 */
class DeleteForm extends Component
{
    /**
     * L'objet à supprimer.
     */
    public $obj;

    /**
     * La clé primaire de l'objet à supprimer.
     */
    public $pk;

    /**
     * Crée une nouvelle instance du composant.
     */
    public function __construct($obj, $pk)
    {
        $this->obj = $obj;
        $this->pk = $pk;
    }

    /**
     * Récupère la vue ou le contenu qui représente le composant.
     */
    public function render(): View|Closure|string
    {
        // Retourne la vue associée au composant pour afficher le formulaire de suppression.
        return view('components.delete-form');
    }
}
