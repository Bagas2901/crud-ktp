<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\KTPController;
use App\Http\Controllers\UserController;

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

//Route Index/Halaman Utama
Route::get('/', [LoginController::class, 'index']);
//Route Logout
Route::post('/logout', [LoginController::class, 'logout']);
//Route Proses Login
Route::post('/proses_login', [LoginController::class, 'proses_login']);

//Route KTP
Route::get('/ktp', [KTPController::class, 'index'])->name('ktp')->middleware('cek_login:0,1');
//route cek nik
Route::get('/ktp/cek_nik/{nik}', [KTPController::class, 'cek_nik'])->middleware('cek_login:1');
//route simpan data ktp
Route::post('/ktp/simpan', [KTPController::class, 'simpan'])->middleware('cek_login:1');
//route update data ktp
Route::post('/ktp/update/{id}', [KTPController::class, 'update'])->middleware('cek_login:1');
//Route resource data ktp
Route::resource('/ktp/action', KTPController::class)->middleware('cek_login:1');
//Route Export excel
Route::get('/ktp/export_excel', [KTPController::class, 'export_excel'])->middleware('cek_login:0,1');
//Route Export csv
Route::get('/ktp/export_csv', [KTPController::class, 'export_csv'])->middleware('cek_login:0,1');
//Route Export pdf
Route::get('/ktp/export_pdf', [KTPController::class, 'export_pdf'])->middleware('cek_login:0,1');
//Route Import  csv
Route::post('/ktp/import', [KTPController::class, 'import'])->middleware('cek_login:1');

//Route User
Route::get('/user', [UserController::class, 'index'])->name('user')->middleware('cek_login:1');
//route cek username
Route::get('/user/cek_username/{username}', [UserController::class, 'cek_username'])->middleware('cek_login:1');
//route cek email
Route::get('/user/cek_email/{email}', [UserController::class, 'cek_email'])->middleware('cek_login:1');
//route simpan data user
Route::post('/user/simpan', [UserController::class, 'simpan'])->middleware('cek_login:1');
//route update data user
Route::post('/user/update/{id}', [UserController::class, 'update'])->middleware('cek_login:1');
//Route resource data user
Route::resource('/user/action', UserController::class)->middleware('cek_login:1');


