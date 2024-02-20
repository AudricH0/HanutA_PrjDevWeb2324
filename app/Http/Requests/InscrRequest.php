<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Valide les requêtes de création ou de mise à jour d'une inscription à une épreuve.
 */
class InscrRequest extends FormRequest
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
            'etud' => 'required',
            'tstart' => '',
            'rw' => 'required'
        ];
    }

    /**
     * Récupère les messages d'erreur personnalisés pour les règles de validation définies.
     */
    public function messages(): array
    {
        return [
            'etud.required' => 'L\'étudiant est requis.',
            'rw.required' => 'Le résultat de l\'épreuve est requis.',
        ];
    }
}
