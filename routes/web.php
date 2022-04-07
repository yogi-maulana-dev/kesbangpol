<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\DaftarController;
use App\Http\Controllers\TutorialController;
use App\Model\User;



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

Route::get('/',[HomeController::class, 'index']);
Route::get('/home',[HomeController::class, 'index']);
Route::get('/berita',[BeritaController::class, 'index']);
Route::get('/tutorial',[TutorialController::class, 'index']);
Route::get('/user',[UserController::class, 'index']);
Route::get('/login',[LoginController::class, 'authenticate']);
Route::get('/daftar',[DaftarController::class, 'index']);
Route::post('/daftar',[DaftarController::class, 'store']);

 