<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        /**
         * définit la longueur par défaut des chaînes de caractères dans la base de données à 191 caractères,
         * assurant la compatibilité avec MySQL 5.7 et MariaDB 10.2 pour éviter les erreurs potentielles.
         */
        Schema::defaultStringLength(191);
        Paginator::useBootstrapFive();
        Date::setLocale('fr');
    }
}
