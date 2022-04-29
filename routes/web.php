<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DataController;
use App\Http\Controllers\MenudataController;


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
Route::get('/home',[HomeController::class, 'index'])->name('home');

// router bagian loginuser
Route::get('/login',['App\Http\Controllers\AuthUser\LoginController', 'index'])->name('user.login');
Route::post('/keluar',['App\Http\Controllers\AuthUser\LoginController', 'keluar'])->name('user.keluar');
Route::post('/login',['App\Http\Controllers\AuthUser\LoginController', 'loginuser'])->name('user.login.save');
Route::get('/dashboard',['App\Http\Controllers\AuthUser\AdminController', 'index'])->name('user.dashboard');
Route::resource('/data',DataController::class);
// Route::resource('/menudata',MenudataController::class);


// router bagian loginuser

Route::prefix('admin')->name('admin.')->group(function(){
// Route::middleware(['guest:admin', 'PreventBackHistory'])->group(function () {
Route::middleware(['guest:admin','preventBackHistory'])->group(function () {

Route::view('/login','admin.login', ["judul" => "Home Admin "])->name('login');
Route::post('/check',['App\Http\Controllers\AuthAdmin\LoginController', 'loginadmin'])->name('login.save');

});


Route::middleware(['auth:admin','preventBackHistory'])->group(function(){
Route::get('/dashboard',['App\Http\Controllers\AuthAdmin\AdminController', 'index'])->name('dashboard');
Route::get('/berita',['App\Http\Controllers\AuthAdmin\BeritaController', 'index'])->name('berita');
Route::post('/berita',['App\Http\Controllers\AuthAdmin\BeritaController', 'store'])->name('berita.save');
Route::post('/berita',['App\Http\Controllers\AuthAdmin\BeritaController', 'uploadimage'])->name('ckeditor.upload');

Route::get('/menudata',['App\Http\Controllers\AuthAdmin\MenudataController', 'index'])->name('menudata');
Route::get('/menudata/download/{nama}', ['App\Http\Controllers\AuthAdmin\MenudataController', 'download'])->name('download');
Route::post('/logout',['App\Http\Controllers\AuthAdmin\LoginController', 'logout'])->name('logout');


});
});
