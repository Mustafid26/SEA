<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KelasController;


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
