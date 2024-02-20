<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Classe SessionRequest
 *
 * Cette classe représente une requête de session utilisateur.
 * Elle étend la classe FormRequest de Laravel pour valider les données
 * entrées par l'utilisateur lors de la connexion.
 */
class SessionRequest extends FormRequest
{
    /**
     * Détermine si l'utilisateur est autorisé à effectuer cette requête.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Règles de validation pour la requête.
     */
    public function rules(): array
    {
        return [
            'login' => 'required',
            'password' => 'required'
        ];
    }

    /**
     * Messages d'erreur personnalisés pour les règles de validation.
     */
    public function messages()
    {
        return [
            'login.required' => 'Un nom d\'utilisateur est requis.',
            'password.required' => 'Un mot de passe est requis.'
        ];
    }
}
