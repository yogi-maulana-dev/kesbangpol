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


use App\Models\Dashboard;
use Illuminate\Http\Request;
use App\Models\Upload;



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

Route::get('/dashboard',function() {
return view('user.dashboard', ["judul" => "Halaman Dashboard",
'datas' => Upload::where('id_user', auth()->user()->id)->get()
]);
})->middleware('auth');




Route::resource('/data',DataController::class)->middleware('auth');

Route::get('/dashboard',[DashboardController::class, 'index'])->middleware('auth');
Route::get('/tutorial',[TutorialController::class, 'index']);
Route::get('/user',[UserController::class, 'index'])->name('login')->middleware('guest');
Route::post('/user',[UserController::class, 'authenticate']);
Route::post('/keluar',[UserController::class, 'keluar']);


Route::resource('/data',DataController::class);
// Route::resource('/menudata',MenudataController::class);

Route::get('/dashboard',[DashboardController::class, 'index'])->middleware('auth');
// Route::get('/menudata',[MenudataController::class, 'index']);

Route::get('/admin_dashboard',[AdminDashboardController::class, 'index'])->middleware('auth');
Route::get('/tutorial',[TutorialController::class, 'index']);
Route::get('/loginadmin',[LoginadminController::class, 'index'])->middleware('guest');
Route::post('/loginadmin',[LoginadminController::class, 'loginauth']);
Route::post('/keluar',[LoginadminController::class, 'keluar']);

Route::get('/menudata',[MenudataController::class, 'index']);
Route::post('/menudata', [MenudataController::class, 'update']);
// Route::resource('/menudata',MenudataController::class);
Route::get('/menudata/download/{nama}', [MenudataController::class, 'download'])->name('download');



//Route::post('/login',[LoginController::class, 'authenticate']);
//Route::post('/user',[UserController::class, 'authenticate']);

Route::get('/daftar',[DaftarController::class, 'index'])->middleware('guest');
Route::post('/daftar',[DaftarController::class, 'store']);
