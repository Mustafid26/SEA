<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ArtikelController;


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

Route::get('/', function () {
    return view('layouts/main', [
        'active' => 'beranda'
    ]);
});
Route::get('/kelas', [KelasController::class, 'index']);
Route::get('/kelas/{id}/materi', [KelasController::class, 'show']);
Route::get('/login', [LoginController::class, 'index']);
Route::get('/artikel', [ArtikelController::class, 'index']);
Route::get('/artikel/{artikel:slug}', [ArtikelController::class, 'show'])->name('artikel.show');
