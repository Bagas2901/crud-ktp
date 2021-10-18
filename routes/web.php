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
Route::get('cek_nik/{nik}', [KTPController::class, 'cek_nik']);
//route simpan data ktp
Route::post('simpan', [KTPController::class, 'simpan']);
//route update data ktp
Route::post('update/{id}', [KTPController::class, 'update']);
//Route resource data ktp
Route::resource('action_ktp', KTPController::class);
//Route Export Data KTP
Route::get('/siswa/export_excel', [KTPController::class, 'update']);

//Route User
Route::get('/user', [UserController::class, 'index'])->name('user');
//route cek username
Route::get('cek_username/{username}', [UserController::class, 'cek_username']);
//route cek email
Route::get('cek_email/{email}', [UserController::class, 'cek_email']);
//route simpan data user
Route::post('simpan_user', [UserController::class, 'simpan']);
//route update data user
Route::post('update_user/{id}', [UserController::class, 'update']);
//Route resource data user
Route::resource('action_user', UserController::class);

