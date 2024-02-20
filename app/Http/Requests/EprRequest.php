<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Valide les données de la requête pour la création ou la mise à jour d'une épreuve.
 */
class EprRequest extends FormRequest
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
            'date' => 'required|date', // La date est requise et doit être une date valide
            'dist' => 'required|integer', // La distance est requise et doit être un entier
            'anSco' => 'required', // L'année scolaire est requise
            'tstart' => '' // La validation de l'heure de début est absente
        ];
    }

    /**
     * Récupère les messages d'erreur personnalisés pour les règles de validation.
     */
    public function messages()
    {
        return [
            'date.required' => 'Une date est requise.', // Message si la date est manquante
            'date.date' => 'Date non valide', // Message si la date n'est pas une date valide
            'dist.required' => 'Une distance est requise', // Message si la distance est manquante
            'dist.integer' => 'La distance doit être un nombre entier', // Message si la distance n'est pas un entier
            'anSco.required' => 'L\'année scolaire est requise', // Message si l'année scolaire est manquante
        ];
    }
}
