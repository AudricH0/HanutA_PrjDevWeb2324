<?php

namespace App\View\Components;

use App\Models\Clas;
use App\Models\Etud;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

/**
 * Composant Blade qui représente un formulaire pour la création ou la modification d'un étudiant.
 */
class EtudForm extends Component
{
    /**
     * Les classes disponibles pour l'étudiant.
     */
    public $allClas;

    /**
     * L'étudiant à afficher dans le formulaire.
     */
    public Etud $etud;

    /**
     * La méthode à utiliser pour soumettre le formulaire (POST ou PUT/PATCH).
     */
    public string $method;

    /**
     * Crée une nouvelle instance du composant.
     *
     * @param mixed $allClas Les classes disponibles pour l'étudiant
     * @param Etud $etud L'étudiant à afficher dans le formulaire
     * @param string $method La méthode à utiliser pour soumettre le formulaire (POST ou PUT/PATCH)
     */
    public function __construct($allClas , Etud $etud, string $method)
    {
        $this->allClas = $allClas;
        $this->etud = $etud;
        $this->method = $method;
    }

    /**
     * Récupère la vue ou le contenu qui représente le composant.
     */
    public function render(): View|Closure|string
    {
        return view('components.etud-form');
    }
}
