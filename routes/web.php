<?php

use App\Http\Controllers\AdminController;
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

Route::get('/admin/register', [AdminController::class, 'create'])->name('register.admin'); //->middleware('adminCreated');
Route::post('/admin/register', [AdminController::class, 'store'])->name('register.admin'); //->middleware('adminCreated');

Route::get('/', function () {
    return view('welcome');
});
