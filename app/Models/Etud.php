<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasTimestamps;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * Modèle Etud
 *
 * Ce modèle représente un étudiant dans l'application.
 */
class Etud extends Model
{
    use HasFactory;
    use HasTimestamps;

    /**
     * Le nom de la clé primaire du modèle.
     */
    protected $primaryKey = 'pkEtud';

    /**
     * Définit la relation "belongsTo" avec le modèle "Clas".
     */
    public function clas(): BelongsTo
    {
        return $this->belongsTo(Clas::class, 'fkClas', 'pkClas');
    }

    /**
     * Filtre les résultats de la requête en fonction des filtres fournis.
     */
    public function scopeFilter($request, array $filters)
    {
        $request->when($filters['search'] ?? false, function ($query, $search) use ($request) {
            $request->where('nom', 'like', '%' . $search . '%')
                ->orWhere('pren', 'like', '%' . $search . '%')
                ->orWhere('sexe', 'like', '%' . $search . '%')
                ->orWhere('nbIns', 'like', '%' . $search . '%');
        });
    }

    /**
     * Définit la relation "belongsToMany" avec le modèle "Epr".
     */
//    public function eprs(): BelongsToMany
//    {
//        return $this->belongsToMany(Epr::class, 'inscrs', 'fkEtud', 'fkEpr')->withPivot('noDos', 'rw', 'tstart', 'tend', 'temps');
//    }
}
