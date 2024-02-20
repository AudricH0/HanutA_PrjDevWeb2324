<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Requête de validation pour la création ou la mise à jour d'une classe.
 */
class ClasRequest extends FormRequest
{
    /**
     * Détermine si l'utilisateur est autorisé à effectuer cette requête.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Récupère les règles de validation qui s'appliquent à la requête.
     */
    public function rules(): array
    {
        return [
            'ident' => 'required',
            'niv' => 'required|integer'
        ];
    }

    /**
     * Récupère les messages d'erreur personnalisés pour les règles de validation.
     */
    public function messages()
    {
        return [
            'ident.required' => 'Un identifiant est requis.',
            'niv.required' => 'Un niveau est requis.',
            'niv.integer' => 'Le niveau doit être un nombre entier.'
        ];
    }
}
