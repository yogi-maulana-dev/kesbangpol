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

use App\Models\Dashboard;
use Illuminate\Http\Request;
use App\Models\Upload;
use App\Models\Categori;

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

// Route::get('/',[HomeController::class, 'index']);
Route::get('/home', [HomeController::class, 'index'])->name('home');

// router bagian loginuser
Route::get('/login', ['App\Http\Controllers\AuthUser\LoginController', 'index'])->name('user.login');
Route::post('/keluar', ['App\Http\Controllers\AuthUser\LoginController', 'keluar'])->name('user.keluar');
Route::post('/login', ['App\Http\Controllers\AuthUser\LoginController', 'loginuser'])->name('user.login.save');
Route::get('/dashboard', ['App\Http\Controllers\AuthUser\AdminController', 'index'])->name('user.dashboard');

Route::get('/daftar', ['App\Http\Controllers\AuthUser\DaftarController', 'index'])->middleware('guest');
Route::post('/daftar', ['App\Http\Controllers\AuthUser\DaftarController', 'store'])->name('user.daftar');

Router::get('/berita', ['App\Http\Controller\AuthUser\Berita', 'index'])->middleware('guest');
Router::get('/berita/{berita:slug}', ['App\Http\Controller\AuthUser\Berita', 'show'])->middleware('guest');
Router::get('/categori/{categori:slug}', function (Categori $categori) {
    return view('categori', [
        'title' => $categori->name,
        'beritas' => $categori->beritas,
        'categori' => $categori->name,
    ]);
});

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

        Route::middleware(['auth:admin', 'preventBackHistory'])->group(function () {
            Route::get('/dashboard', ['App\Http\Controllers\AuthAdmin\AdminController', 'index'])->name('dashboard');
            Route::get('/berita', ['App\Http\Controllers\AuthAdmin\BeritaController', 'index'])->name('berita');
            Route::post('/berita', ['App\Http\Controllers\AuthAdmin\BeritaController', 'store'])->name('berita.store');
            Route::get('/menudata', ['App\Http\Controllers\AuthAdmin\MenudataController', 'index'])->name('menudata');
            Route::post('/editor', ['App\Http\Controllers\AuthAdmin\EditorController', 'uploadimage'])->name('ckeditor.upload');

            Route::get('/menudata/download/{nama}', ['App\Http\Controllers\AuthAdmin\MenudataController', 'download'])->name('download');
        });
    });
