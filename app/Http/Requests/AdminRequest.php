<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Classe AdminRequest
 *
 * Cette classe représente une requête pour un administrateur.
 * Elle étend la classe FormRequest de Laravel pour valider les données
 * entrées par l'utilisateur dans le cadre des opérations administratives.
 */
class AdminRequest extends FormRequest
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
            'password' => 'required|confirmed'
        ];
    }

    /**
     * Messages d'erreur personnalisés pour les règles de validation.
     */
    public function messages()
    {
        return [
            'login.required' => 'Un nom d\'utilisateur est requis.',
            'password.required' => 'Un mot de passe est requis.',
            'password.confirmed' => 'Les mots de passe ne correspondent pas.'
        ];
    }
}
