<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Modèle Clas
 *
 * Ce modèle représente une classe dans l'application.
 */
class Clas extends Model
{
    use HasFactory;

    /**
     * Le nom de la table associée au modèle.
     */
    protected $table = 'class';

    /**
     * Le nom de la clé primaire du modèle.
     */
    protected $primaryKey = 'pkClas';

    /**
     * Définit la relation "hasMany" avec le modèle "Etud".
     */
    public function etuds(): HasMany
    {
        return $this->hasMany(Etud::class, 'fkClas');
    }

    /**
     * Filtre les résultats de la requête en fonction des filtres fournis.
     */
    public function scopeFilter($request, array $filters)
    {
        $request->when($filters['search'] ?? false, function ($query, $search) use ($request) {
            $request->where('ident', 'like', '%' . $search . '%')
                ->orWhere('niv', 'like', '%' . $search . '%');
        });
    }
}
