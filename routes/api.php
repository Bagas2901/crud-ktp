<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KTPController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//menampilkan semua data
Route::get('tampil', [KTPController::class, 'show']);

//simpan data
Route::post('simpan', [KTPController::class, 'store']);

//menampilkan data berdasrkan id
Route::get('tampil_data/{id}', [KTPController::class, 'edit']);

//update data
Route::put('update/{id}', [KTPController::class, 'store']);

//hapus data 
Route::delete('hapus/{id}', [KTPController::class, 'destroy']);
