<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

/**
 * Composant FlashMessage
 *
 * Ce composant est utilisé pour afficher un message éphémère à l'utilisateur.
 * Il peut être utilisé pour afficher des messages d'alerte, de succès, etc.
 */
class FlashMessage extends Component
{
    /**
     * Le type de message (par exemple: success, danger, warning, etc.).
     */
    public string $type;

    /**
     * Le contenu du message à afficher.
     */
    public string $message;

    /**
     * Crée une nouvelle instance de composant.
     *
     * @param string $type Le type de message
     * @param string $message Le contenu du message
     */
    public function __construct(string $type, string $message)
    {
        $this->type = $type;
        $this->message = $message;
    }

    /**
     * Récupère la vue ou le contenu représentant le composant.
     *
     * @return View|Closure|string
     */
    public function render(): View|Closure|string
    {
        return view('components.flash-message');
    }
}
