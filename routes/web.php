<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ArrivController;
use App\Http\Controllers\ClasController;
use App\Http\Controllers\EprController;
use App\Http\Controllers\EtudController;
use App\Http\Controllers\InscrController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\StatsController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/admin/register', [AdminController::class, 'create'])->name('register.admin')->middleware('adminCreated');
Route::post('/admin/register', [AdminController::class, 'store'])->name('register.admin')->middleware('adminCreated');

Route::middleware(['guest'])->group(function() {
    Route::get('/login', [SessionController::class, 'create'])->name('login');
    Route::post('/login', [SessionController::class, 'store']);
});

Route::middleware(['auth'])->group(function() {
    Route::get('/logout', [SessionController::class, 'logout']);
    Route::delete('/logout', [SessionController::class, 'destroy']);

    Route::get('/clas', [ClasController::class, 'index'])->name('clas.index');
    Route::get('/clas/create', [ClasController::class, 'create'])->name('clas.create');
    Route::post('/clas/create', [ClasController::class, 'store']);
    Route::get('/clas/{clas}', [ClasController::class, 'edit']);
    Route::put('/clas/{clas}', [ClasController::class, 'update']);
    Route::get('/clas/{clas}/delete', [ClasController::class, 'delete']);
    Route::delete('/clas/{clas}/delete', [ClasController::class, 'destroy'])->name('clas.delete');

    Route::get('/etud', [EtudController::class, 'index'])->name('etud.index');
    Route::get('/etud/create', [EtudController::class, 'create'])->name('etud.create');
    Route::post('/etud/create', [EtudController::class, 'store']);
    Route::get('/etud/{etud}', [EtudController::class, 'edit'])->name('etud.edit');
    Route::put('/etud/{etud}', [EtudController::class, 'update']);
    Route::get('/etud/{etud}/delete', [EtudController::class, 'delete']);
    Route::delete('/etud/{etud}/delete', [EtudController::class, 'destroy']);

    Route::get('/epr', [EprController::class, 'index'])->name('epr.index');
    Route::get('/epr/create', [EprController::class, 'create'])->name('epr.create');
    Route::post('/epr/create', [EprController::class, 'store']);
    Route::get('/epr/{epr}', [EprController::class, 'edit'])->name('epr.edit');
    Route::put('/epr/{epr}', [EprController::class, 'update']);
    Route::get('/epr/{epr}/delete', [EprController::class, 'delete']);
    Route::delete('/epr/{epr}/delete', [EprController::class, 'destroy']);

    Route::get('/inscr', [InscrController::class, 'index'])->name('inscr.index');
    Route::post('/inscr', [InscrController::class, 'getEpr']);
    Route::get('/inscr/{epr}', [InscrController::class, 'edit'])->name('inscr.edit');
    Route::post('/inscr/{epr}', [InscrController::class, 'store']);
    Route::delete('/inscr/{epr}', [InscrController::class, 'destroy']);

    Route::get('/inscr/{epr}/{etud}', [InscrController::class, 'show']);
    Route::put('/inscr/{epr}/{etud}', [InscrController::class, 'update']);

    Route::get('/arriv', [ArrivController::class, 'index']);
    Route::post('/arriv', [ArrivController::class, 'getEpr']);
    Route::get('/arriv/{epr}', [ArrivController::class, 'edit']);
    Route::post('/arriv/{epr}', [ArrivController::class, 'store']);

    Route::get('/', [StatsController::class, 'index'])->name('home');
});


