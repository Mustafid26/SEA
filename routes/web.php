<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ArtikelController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;


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

Route::get('/', [HomeController::class, 'index'], function () {
    [
        'active' => 'beranda'
    ];
});


Route::get('/redirect', [HomeController::class, 'redirect'])->middleware('auth','verified');


route::post('/add_user', [AdminController::class,'add_user']);
route::get('/view_user', [AdminController::class,'view_user']);
route::get('/show_user', [AdminController::class,'show_user']);
route::get('/update_user/{id}', [AdminController::class,'update_user']);
route::post('/update_user_2/{id}', [AdminController::class,'update_user_2']);
route::get('/delete_user/{id}', [AdminController::class,'delete_user']);
route::get('/search_user', [AdminController::class,'search_user']);

route::post('/add_artikel', [AdminController::class,'add_artikel']);
route::get('/view_artikel', [AdminController::class,'view_artikel']);
route::get('/show_artikel', [AdminController::class,'show_artikel']);
route::get('/update_artikel/{id}', [AdminController::class,'update_artikel']);
route::post('/update_artikel_2/{id}', [AdminController::class,'update_artikel_2']);
route::get('/delete_artikel/{id}', [AdminController::class,'delete_artikel']);
route::get('/search_artikel', [AdminController::class,'search_artikel']);


Route::get('/kelas', [KelasController::class, 'index'])->middleware('auth','verified');
Route::get('/kelas/{id}/materi', [KelasController::class, 'show'])->middleware('auth','verified');
Route::get('/artikel', [ArtikelController::class, 'index']);
Route::get('/artikel/{artikel:slug}', [ArtikelController::class, 'show'])->name('artikel.show');


Route::get('/profile/{id}', [ProfileController::class, 'index'])->name('index')->middleware('auth','verified');
Route::post('/profile/upload', [ProfileController::class, 'upload'])->name('profile.upload')->middleware('auth','verified');
Route::delete('/profile/delete', [ProfileController::class, 'delete'])->name('profile.delete')->middleware('auth','verified');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});