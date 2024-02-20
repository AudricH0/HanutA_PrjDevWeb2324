<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * Représente une épreuve.
 */
class Epr extends Model
{
    use HasFactory;

    /**
     * Le nom de la table associée au modèle.
     */
    protected $table = 'eprs';

    /**
     * Le nom de la clé primaire de la table associée au modèle.
     */
    protected $primaryKey = 'pkEpr';

    /**
     * Applique les filtres de recherche sur la requête.
     */
    public function scopeFilter($request, array $filters)
    {
        $request->when($filters['search'] ?? false, fn ($query, $search) =>
        $request
            ->where('date', 'like', '%' . $search . '%')
            ->orWhere('dist', 'like', '%' . $search . '%')
            ->orWhere('nbPart', 'like', '%' . $search . '%')
            ->orWhere('anSco', 'like', '%' . $search . '%'));
    }

    /**
     * Récupère les étudiants inscrits à cette épreuve.
     */
    public function etuds(): BelongsToMany
    {
        return $this->belongsToMany(Etud::class, 'inscrs', 'fkEpr', 'fkEtud')->withPivot('noDos', 'rw', 'tstart', 'tend', 'temps');
    }
}
