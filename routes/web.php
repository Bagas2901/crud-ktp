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

//Route Login
Route::get('/', [LoginController::class, 'index']);

//Route KTP
Route::get('/ktp', [KTPController::class, 'index'])->name('ktp');
//route cek nik
Route::get('/ktp/cek_nik/{nik}', [KTPController::class, 'cek_nik']);
//route simpan data ktp
Route::post('/ktp/simpan', [KTPController::class, 'simpan']);
//route update data ktp
Route::post('/ktp/update/{id}', [KTPController::class, 'update']);
//Route resource data ktp
Route::resource('/ktp/action', KTPController::class);
//Route Export excel
Route::get('/ktp/export_excel', [KTPController::class, 'export_excel']);
//Route Export csv
Route::get('/ktp/export_csv', [KTPController::class, 'export_csv']);
//Route Export pdf
Route::get('/ktp/export_pdf', [KTPController::class, 'export_pdf']);

//Route User
Route::get('/user', [UserController::class, 'index'])->name('user');
//route cek username
Route::get('/user/cek_username/{username}', [UserController::class, 'cek_username']);
//route cek email
Route::get('/user/cek_email/{email}', [UserController::class, 'cek_email']);
//route simpan data user
Route::post('/user/simpan', [UserController::class, 'simpan']);
//route update data user
Route::post('/user/update/{id}', [UserController::class, 'update']);
//Route resource data user
Route::resource('/user/action', UserController::class);


