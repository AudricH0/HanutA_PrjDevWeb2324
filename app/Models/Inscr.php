<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasTimestamps;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Représente le modèle d'une inscription à une épreuve pour un étudiant.
 */
class Inscr extends Model
{
    use HasTimestamps;
    use HasFactory;
    use SoftDeletes;

    /**
     * Le nom de la table associée au modèle.
     */
    protected $table = 'inscrs';

    /**
     * Les clés primaires du modèle.
     */
    protected $primaryKey = ['fkEtud', 'fkEpr'];

    /**
     * Les attributs pouvant être assignés en masse.
     */
    protected $fillable = [
        'noDos',
        'rw',
        'tstart',
        'tend',
        'temps',
    ];

    /**
     * Définit la relation "belongsTo" avec le modèle Etud.
     */
    public function etud(): BelongsTo
    {
        return $this->belongsTo(Etud::class, 'fkEtud', 'pkEtud');
    }
}
