<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MateriController;
use App\Http\Controllers\ArtikelController;
use App\Http\Controllers\PostestController;
use App\Http\Controllers\PretestController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\NonSekariController;
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
Route::get('/storage-link', function(){
    Artisan::call('storage:link');
    return 'Storage link has been created successfully.';
});


Route::get('/redirect', [HomeController::class, 'redirect'])->middleware('auth','verified');

Route::get('/', [HomeController::class, 'index'],function () {
    return view('home', [
        'active' => 'beranda'
    ]);
});



Route::get('/redirect', [HomeController::class, 'redirect'])->middleware('auth','verified');
Route::get('/comingsoon', [HomeController::class, 'comingsoon'])->middleware('auth','verified');
Route::get('/konseling', [HomeController::class, 'konseling']);


Route::get('/presensi_user', [AdminController::class,'presensi_user']);
Route::post('/add_presensi', [AdminController::class,'add_presensi']);
Route::get('/delete_presensi/{id}', [AdminController::class,'delete_presensi']);
Route::get('/search_presensi', [AdminController::class,'search_presensi']);

Route::get('/survey_user', [AdminController::class,'survey_user']);
Route::post('/add_survey', [AdminController::class,'add_survey']);
Route::get('/delete_survey/{id}', [AdminController::class,'delete_survey']);

Route::get('/popupmateri', [HomeController::class, 'popupmateri']);


Route::post('/add_foto', [AdminController::class,'add_foto']);
Route::get('/view_foto', [AdminController::class,'view_foto']);
Route::get('/show_foto', [AdminController::class,'show_foto']);
Route::get('/update_foto/{id}', [AdminController::class,'update_foto']);
Route::post('/update_foto_2/{id}', [AdminController::class,'update_foto_2']);
Route::get('/delete_foto/{id}', [AdminController::class,'delete_foto']);

Route::post('/add_user', [AdminController::class,'add_user']);
Route::get('/view_user', [AdminController::class,'view_user']);
Route::get('/show_user', [AdminController::class,'show_user']);
Route::get('/update_user/{id}', [AdminController::class,'update_user']);
Route::post('/update_user_2/{id}', [AdminController::class,'update_user_2']);
Route::get('/delete_user/{id}', [AdminController::class,'delete_user']);
Route::get('/search_user', [AdminController::class,'search_user']);

Route::get('/update_points/{id}', [AdminController::class,'update_points']);
Route::post('/update_points_2/{id}', [AdminController::class,'update_points_2']);

Route::get('/nilai_user', [AdminController::class,'nilai_user']);
Route::get('/update_nilai_pretest/{id}', [AdminController::class,'update_nilai_pretest']);
Route::post('/update_nilai_pretest_2/{id}', [AdminController::class,'update_nilai_pretest_2']);

Route::get('show_jawaban/{id}', [AdminController::class, 'show_jawaban']);
Route::get('show_jawaban_postest/{id}', [AdminController::class, 'show_jawaban_postest']);

Route::get('/nilai_postest_user', [AdminController::class,'nilai_postest_user']);
Route::get('/update_nilai_postest/{id}', [AdminController::class,'update_nilai_postest']);
Route::post('/update_nilai_postest_2/{id}', [AdminController::class,'update_nilai_postest_2']);

Route::get('/pretest_user', [AdminController::class,'pretest_user']);
Route::get('/delete_pretest_user/{id}', [AdminController::class,'delete_pretest_user']);

Route::get('/postest_user', [AdminController::class,'postest_user']);
Route::get('/delete_postest_user/{id}', [AdminController::class,'delete_postest_user']);

Route::post('/add_artikel', [AdminController::class,'add_artikel']);
Route::get('/view_artikel', [AdminController::class,'view_artikel']);
Route::get('/show_artikel', [AdminController::class,'show_artikel']);
Route::get('/update_artikel/{id}', [AdminController::class,'update_artikel']);
Route::post('/update_artikel_2/{id}', [AdminController::class,'update_artikel_2']);
Route::get('/delete_artikel/{id}', [AdminController::class,'delete_artikel']);
Route::get('/search_artikel', [AdminController::class,'search_artikel']);

Route::post('/add_pelatihan', [AdminController::class,'add_pelatihan']);
Route::get('/view_pelatihan', [AdminController::class,'view_pelatihan']);
Route::get('/show_pelatihan', [AdminController::class,'show_pelatihan']);
Route::get('/update_pelatihan/{id}', [AdminController::class,'update_pelatihan']);
Route::post('/update_pelatihan_2/{id}', [AdminController::class,'update_pelatihan_2']);
Route::get('/delete_pelatihan/{id}', [AdminController::class,'delete_pelatihan']);
Route::get('/search_pelatihan', [AdminController::class,'search_pelatihan']);



Route::post('/add_kelas', [AdminController::class,'add_kelas']);
Route::get('/view_kelas', [AdminController::class,'view_kelas']);
Route::get('/show_kelas', [AdminController::class,'show_kelas']);
Route::get('/update_kelas/{id}', [AdminController::class,'update_kelas']);
Route::post('/update_kelas_2/{id}', [AdminController::class,'update_kelas_2']);
Route::get('/delete_kelas/{id}', [AdminController::class,'delete_kelas']);
Route::get('/search_kelas', [AdminController::class,'search_kelas']);

Route::post('/add_form', [AdminController::class,'add_formpenilaian']);
Route::get('/view_formpenilaian', [AdminController::class,'view_form']);
Route::get('/show_formpenilaian', [AdminController::class,'show_formpenilaian']);
Route::get('/show_penilaian', [AdminController::class,'show_penilaian']);
Route::get('/delete_penilaian/{id}', [AdminController::class,'delete_penilaian']);
Route::get('/delete_form/{id}', [AdminController::class,'delete_form']);
Route::get('/update_formpenilaian/{id}', [AdminController::class,'update_formpenilaian']);
Route::post('/update_formpenilaian_2/{id}', [AdminController::class,'update_formpenilaian_2']);

Route::post('/add_materi', [AdminController::class,'add_materi']);
Route::get('/view_materi', [AdminController::class,'view_materi']);
Route::get('/show_materi', [AdminController::class,'show_materi']);
Route::get('/update_materi/{id}', [AdminController::class,'update_materi']);
Route::post('/update_materi_2/{id}', [AdminController::class,'update_materi_2']);
Route::get('/delete_materi/{id}', [AdminController::class,'delete_materi']);
Route::get('/search_materi', [AdminController::class,'search_materi']);

Route::post('/add_konten', [AdminController::class,'add_konten']);
Route::get('/view_konten/{id}', [AdminController::class,'view_konten']);
Route::get('/show_konten', [AdminController::class,'show_konten']);
Route::get('/update_konten/{id}', [AdminController::class,'update_konten']);
Route::post('/update_konten_2/{id}', [AdminController::class,'update_konten_2']);
Route::get('/delete_konten/{id}', [AdminController::class,'delete_konten']);
Route::get('/search_konten', [AdminController::class,'search_konten']);


Route::get('/show_pretest/{id}', [AdminController::class,'show_pretest']);
Route::get('/update_pretest/{id}', [AdminController::class,'update_pretest']);
Route::post('/update_pretest_2/{id}', [AdminController::class,'update_pretest_2']);
Route::get('/delete_pretest/{id}', [AdminController::class,'delete_pretest']);
Route::get('/search_pretest', [AdminController::class,'search_pretest']);

Route::get('/show_postest/{id}', [AdminController::class,'show_postest']);
Route::get('/update_postest/{id}', [AdminController::class,'update_postest']);
Route::post('/update_postest_2/{id}', [AdminController::class,'update_postest_2']);
Route::get('/delete_postest/{id}', [AdminController::class,'delete_postest']);
Route::get('/search_postest', [AdminController::class,'search_postest']);


Route::get('/kelas', [KelasController::class, 'index'])->name('kelas')->middleware('auth','verified');
Route::get('/kelas/{id}/materi', [KelasController::class, 'show'])->name('materi.show')->middleware('auth','verified');
Route::get('/kelas/{id}/penilaian', [KelasController::class, 'showFormPenilaian'])->name('form.show')->middleware('auth','verified');
Route::post('/submit_penilaian', [KelasController::class, 'submitFormPenilaian'])->name('submit.penilaian');
Route::get('/artikel', [ArtikelController::class, 'index']);
Route::get('/artikel/{artikel:slug}', [ArtikelController::class, 'show'])->name('artikel.show');

Route::get('/pelatihan', [PelatihanController::class, 'index']);
Route::get('/pelatihan/{pelatihan:slug}', [PelatihanController::class, 'show'])->name('pelatihan.show');


Route::get('/profile/{id}', [ProfileController::class, 'index'])->name('index')->middleware('auth','verified');
Route::get('/profile/submit', [ProfileController::class, 'submitUAS'])->name('submit')->middleware('auth','verified');
Route::post('/profile/upload', [ProfileController::class, 'upload'])->name('profile.upload')->middleware('auth','verified');
Route::delete('/profile/delete', [ProfileController::class, 'delete'])->name('profile.delete')->middleware('auth','verified');

Route::get('/comingsoon', [HomeController::class, 'comingsoon']);

Route::middleware(['auth', 'pretest.not.taken'])->group(function () {
    Route::get('/kelas/{kelas}/pretest', [PretestController::class, 'show'])->name('pretest.show');
    Route::post('/kelas/{kelas}/pretest', [PretestController::class, 'submit'])->name('pretest.submit');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/kelas/{kelas}/postest', [PostestController::class, 'show'])->name('postest.show');
    Route::post('/kelas/{kelas}/postest', [PostestController::class, 'submit'])->name('postest.submit');
});
Route::middleware(['auth', 'pretest.completed'])->group(function () {
    Route::post('/materi/{id}/after/{kelas_id}', [MateriController::class, 'after'])->name('materi.after');
});

Route::get('/download/{id}', [MateriController::class, 'downloadFile'])->name('download.file');

Route::get('/view/{id}', [MateriController::class, 'view']);
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});