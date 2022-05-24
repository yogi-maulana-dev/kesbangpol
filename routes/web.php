<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DataController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\DaftarController;
use App\Http\Controllers\TutorialController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginadminController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\MenudataController;
use App\Http\Controllers\SendMailController;
use App\Http\Controllers\ResetPasswordController;
use App\Http\Controllers\VerifikasiController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\PerpanjanganController;

use App\Models\Dashboard;
use Illuminate\Http\Request;
use App\Models\Upload;
use App\Models\Categori;
use App\Models\Home;

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

/**
 * Show the form for creating a new resource.
 * Whatapps 6289631031237
 * email : yogimaulana100@gmail.com
 * https://github.com/Ays1234
 * https://serbaotodidak.com/
 */

// ----------------------------- forget password ----------------------------//
Route::get('/reset-password', [App\Http\Controllers\AuthUser\ResetPasswordController::class, 'index'])->name('reset-password');
Route::post('/reset-password', [App\Http\Controllers\AuthUser\ResetPasswordController::class, 'reset-password'])->name('user.reset-password');

Route::get('/verifikasi', [App\Http\Controllers\AuthUser\VerifikasiController::class, 'index'])->name('user.verifikasi');
Route::post('/verifikasi/verifikasi', [App\Http\Controllers\AuthUser\VerifikasiController::class, 'verifikasi'])->name('user.add.verifikasi');
Route::post('/verifikasi/reset', [App\Http\Controllers\AuthUser\VerifikasiController::class, 'reset'])->name('user.reset.verifikasi');

// ----------------------------- reset password -----------------------------//
Route::get('reset-password/{token}', [App\Http\Controllers\AuthUser\ResetPasswordController::class, 'getPassword']);
Route::post('reset-password', [App\Http\Controllers\AuthUser\ResetPasswordController::class, 'updatePassword']);

Route::get('/', [HomeController::class, 'index']);
Route::get('/home', [HomeController::class, 'index']);

Route::get('/home/{home:slug}', [HomeController::class, 'show']);
Route::get('/categori/{categori:id}', function (Categori $categori) {
    return view('categori_berita', ['judul' => 'Categori Berita', 'beritas' => $categori->home, 'categoris' => $categori->name]);
});
Route::resource('/data', DataController::class);

// router bagian loginuser
Route::get('/login', ['App\Http\Controllers\AuthUser\LoginController', 'index'])->name('user.login');
Route::post('/keluar', ['App\Http\Controllers\AuthUser\LoginController', 'keluar'])->name('user.keluar');
Route::post('/login', ['App\Http\Controllers\AuthUser\LoginController', 'loginuser'])->name('user.login.save');
Route::get('/dashboard', ['App\Http\Controllers\AuthUser\AdminController', 'index'])->name('user.dashboard');
Route::get('/perpanjangan', ['App\Http\Controllers\AuthUser\PerpanjangController', 'index'])->name('user.perpanjang');
Route::get('/profil', ['App\Http\Controllers\AuthUser\ProfilController', 'index'])->name('profil');
Route::post('/profil/update', ['App\Http\Controllers\AuthUser\ProfilController', 'update'])->name('user.update.profil');

Route::get('/daftar', ['App\Http\Controllers\AuthUser\DaftarController', 'index'])->middleware('guest');
Route::post('/daftar', ['App\Http\Controllers\AuthUser\DaftarController', 'store'])->name('user.daftar');

Route::get('/berita', ['App\Http\Controller\AuthUser\BeritaController', 'index']);

// router bagian loginuser

Route::prefix('admin')
    ->name('admin.')
    ->group(function () {
        // Route::middleware(['guest:admin', 'PreventBackHistory'])->group(function () {
        Route::middleware(['guest:admin', 'preventBackHistory'])->group(function () {
            Route::view('/login', 'admin.login', ['judul' => 'Home Admin '])->name('login');
            Route::post('/check', ['App\Http\Controllers\AuthAdmin\LoginController', 'loginadmin'])->name('login.save');
        });
        Route::post('/logout', ['App\Http\Controllers\AuthAdmin\LoginController', 'logout'])->name('logout');

        Route::get('/send/mail', ['App\Http\Controllers\SendMailController', 'send_mail'])->name('send_mail');

        Route::middleware(['auth:admin', 'preventBackHistory'])->group(function () {
            Route::get('/dashboard', ['App\Http\Controllers\AuthAdmin\AdminController', 'index'])->name('dashboard');
            Route::get('/profil', ['App\Http\Controllers\AuthAdmin\ProfilController', 'index'])->name('profil');
            Route::post('/profil/update', ['App\Http\Controllers\AuthAdmin\ProfilController', 'update'])->name('update.profil');
            Route::get('/berita', ['App\Http\Controllers\AuthAdmin\BeritaController', 'index'])->name('berita');
            Route::post('/berita', ['App\Http\Controllers\AuthAdmin\BeritaController', 'store'])->name('berita.store');
            Route::post('/berita/update', ['App\Http\Controllers\AuthAdmin\BeritaController', 'update'])->name('berita.update');
            Route::post('/berita/destroy/{id}', ['App\Http\Controllers\AuthAdmin\BeritaController', 'destroy']);
            Route::get('/berita/checkSlug', ['App\Http\Controllers\AuthAdmin\BeritaController', 'checkSlug']);
            Route::get('/menudata', ['App\Http\Controllers\AuthAdmin\MenudataController', 'index'])->name('menudata');
            Route::post('/menudata', ['App\Http\Controllers\AuthAdmin\MenudataController', 'update'])->name('menudata.update');
            Route::post('/editor', ['App\Http\Controllers\AuthAdmin\EditorController', 'uploadimage'])->name('ckeditor.upload');

            Route::get('/menudata/download/{nama}', ['App\Http\Controllers\AuthAdmin\MenudataController', 'download'])->name('download');
        });
    });
