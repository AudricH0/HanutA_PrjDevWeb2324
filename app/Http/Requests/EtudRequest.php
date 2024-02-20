<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Valide les requêtes de création ou de mise à jour d'un étudiant.
 */
class EtudRequest extends FormRequest
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
            'nom' => 'required',
            'pren' => 'required',
            'sexe' => 'required',
            'clas' => 'required|integer',
        ];
    }

    /**
     * Récupère les messages d'erreur personnalisés pour les règles de validation définies.
     */
    public function messages(): array
    {
        return [
            'nom.required' => 'Un nom est requis.',
            'pren.required' => 'Un prénom est requis.',
            'sexe.required' => 'Le sexe doit être précisé',
            'clas.required' => 'La classe doit être précisée',
            'clas.integer' => 'La classe est invalide',
        ];
    }
}
