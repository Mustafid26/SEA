<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\MateriController;
use App\Http\Controllers\ArtikelController;
use App\Http\Controllers\PostestController;
use App\Http\Controllers\PretestController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PelatihanController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// --- Rute Utilitas ---
Route::get('/storage-link', function () {
    Artisan::call('storage:link');
    return 'Storage link has been created successfully.';
});

// --- Rute Umum (Bisa diakses tanpa login atau dengan guest middleware) ---
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/artikel', [ArtikelController::class, 'index']);
Route::get('/artikel/{artikel:slug}', [ArtikelController::class, 'show'])->name('artikel.show');
Route::get('/pelatihan', [PelatihanController::class, 'index']);
Route::get('/pelatihan/{pelatihan:slug}', [PelatihanController::class, 'show'])->name('pelatihan.show');
Route::get('/konseling', [HomeController::class, 'konseling']);
Route::get('/popupmateri', [HomeController::class, 'popupmateri']); // Ini mungkin juga perlu auth, tergantung fungsinya


// --- Rute yang Membutuhkan Autentikasi dan Verifikasi Email ---
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/redirect', [HomeController::class, 'redirect']);
    Route::get('/comingsoon', [HomeController::class, 'comingsoon']);

    // Grup untuk Rute Kelas
    Route::prefix('kelas')->group(function () {
        Route::get('/', [KelasController::class, 'index'])->name('kelas');
        Route::post('/add_presensi', [KelasController::class, 'add_presensi']);
        Route::post('/add_survey', [KelasController::class, 'add_survey'])->name('survey.store');
        Route::get('/{kelas_id}/materi', [KelasController::class, 'show'])->name('materi.show');
    });

    // Grup untuk Rute Profile
    Route::prefix('profile')->group(function () {
        Route::get('/{id}', [ProfileController::class, 'index'])->name('index'); // Mengganti 'index' menjadi 'profile.index' untuk menghindari konflik nama
        Route::get('/submit', [ProfileController::class, 'submitUAS'])->name('profile.submit');
        Route::post('/upload', [ProfileController::class, 'upload'])->name('profile.upload');
        Route::delete('/delete', [ProfileController::class, 'delete'])->name('profile.delete');
    });

    // Rute Materi (Download/View)
    Route::get('/download/{id}', [MateriController::class, 'downloadFile'])->name('download.file');
    Route::get('/view/{id}', [MateriController::class, 'view']);

    // Rute Pretest (dengan middleware pretest.not.taken)
    Route::middleware('pretest.not.taken')->group(function () {
        Route::get('/kelas/{kelas_id}/materi/{materi_id}/pretest', [PretestController::class, 'show'])->name('pretest.show');
        Route::post('/kelas/{kelas_id}/materi/{materi_id}/pretest', [PretestController::class, 'submit'])->name('pretest.submit');
    });

    // Rute Postest (hanya perlu auth)
    Route::get('/kelas/{kelas_id}/materi/{materi_id}/postest', [PostestController::class, 'show'])->name('postest.show');
    Route::post('/kelas/{kelas_id}/materi/{materi_id}/postest', [PostestController::class, 'submit'])->name('postest.submit');

    // Rute After Materi (dengan middleware pretest.completed)
    Route::middleware('pretest.completed')->group(function () {
        Route::post('/materi/{materi_id}/after/{kelas_id}', [MateriController::class, 'after'])->name('materi.after');
    });

    // Rute Jetstream Dashboard
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

// --- Rute Penilaian (jika diaktifkan kembali) ---
// Route::middleware(['auth', 'verified'])->group(function () {
//     Route::prefix('kelas/{kelas_id}')->group(function () {
//         Route::get('/penilaian', [KelasController::class, 'showFormPenilaian'])->name('form.show');
//         Route::post('/submit_penilaian', [KelasController::class, 'submitFormPenilaian'])->name('submit.penilaian');
//     });
// });