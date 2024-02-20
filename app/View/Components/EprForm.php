<?php

namespace App\View\Components;

use App\Models\Epr;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

/**
 * Représente un formulaire pour les épreuves.
 */
class EprForm extends Component
{
    /**
     * L'épreuve associée au formulaire.
     */
    public Epr $epr;

    /**
     * La méthode utilisée par le formulaire (POST, PUT, PATCH, DELETE, etc.).
     */
    public string $method;

    /**
     * Crée une nouvelle instance du composant.
     */
    public function __construct(Epr $epr, string $method)
    {
        $this->epr = $epr;
        $this->method = $method;
    }

    /**
     * Renvoie la vue ou le contenu représentant le composant.
     */
    public function render(): View|Closure|string
    {
        return view('components.epr-form');
    }
}
