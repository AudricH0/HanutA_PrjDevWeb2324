<?php

namespace App\View\Components;

use App\Models\Clas;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

/**
 * Composant Blade pour afficher un formulaire de classe.
 */
class ClasForm extends Component
{
    /**
     * La classe associée au formulaire.
     */
    public Clas $clas;

    /**
     * La méthode HTTP utilisée pour soumettre le formulaire (par exemple, "POST" ou "PUT").
     */
    public string $method;

    /**
     * Crée une nouvelle instance du composant.
     */
    public function __construct(Clas $clas, string $method)
    {
        $this->clas = $clas;
        $this->method = $method;
    }

    /**
     * Récupère la vue ou le contenu qui représente le composant.
     */
    public function render(): View|Closure|string
    {
        // Retourne la vue associée au composant pour afficher le formulaire de classe.
        return view('components.clas-form');
    }
}
