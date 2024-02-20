<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ClasController;
use App\Http\Controllers\SessionController;
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

    Route::get('/', function () {
        return view('welcome');
    })->name('home');
});


