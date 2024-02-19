<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;

/**
 * Réprésentation d'un Utilisateur de notre Site Web
 * Le lien avec la DB est réaliser par Laravel et Eloquent.
 */
class User extends Model implements Authenticatable
{

    /**
     * @var string Attribut utilisé par Eloquent pour faire le lien avec la clé Primaire
     */
    protected $primaryKey = 'pkUser';

    /**
     * Définit les attributs qui doivent être convertis en types natifs.
     *
     * Les attributs spécifiés dans ce tableau seront automatiquement convertis
     * en types natifs lorsqu'ils sont accédés ou définis sur le modèle.
     * Cela permet de simplifier le traitement de certains types de données
     * et d'appliquer des transformations automatiques lors de leur accès ou de leur définition.
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    /**
     * Obtient le nom de l'attribut utilisé pour l'identification de l'utilisateur.
     */
    public function getAuthIdentifierName()
    {
        return 'pkUser';
    }

    /**
     * Obtient l'identifiant authentifié de l'utilisateur.
     */
    public function getAuthIdentifier()
    {
        return $this->{$this->getAuthIdentifierName()};
    }

    /**
     * Obtient le mot de passe authentifié de l'utilisateur.
     */
    public function getAuthPassword()
    {
        return $this->attributes['pswd'];
    }

    /**
     * Obtient le jeton de rappel pour l'authentification "remember me".
     */
    public function getRememberToken()
    {
        //
    }

    /**
     * Définit le jeton de rappel pour l'authentification "remember me".
     */
    public function setRememberToken($value)
    {
        //
    }

    /**
     * Obtient le nom de la colonne utilisée pour le jeton de rappel "remember me".
     */
    public function getRememberTokenName()
    {
        //
    }
}
