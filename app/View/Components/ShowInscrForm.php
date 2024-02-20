<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

/**
 * Composant pour afficher le formulaire de détails d'une inscription à une épreuve.
 */
class ShowInscrForm extends Component
{
    /**
     * L'étudiant associé à l'inscription.
     */
    public $etud;

    /**
     * L'épreuve à laquelle l'inscription est associée.
     */
    public $epr;

    /**
     * Crée une nouvelle instance du composant.
     */
    public function __construct($etud, $epr)
    {
        $this->etud = $etud;
        $this->epr = $epr;
    }

    /**
     * Renvoie la vue / le contenu qui représente le composant.
     */
    public function render(): View|Closure|string
    {
        return view('components.show-inscr-form');
    }
}
