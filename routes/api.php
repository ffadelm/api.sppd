<?php

use App\Http\Controllers\API\Auth\LoginController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\UserController;
use App\Http\Controllers\API\SuratController;
use App\Http\Controllers\API\LaporanController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('surat', SuratController::class);
Route::post('/surat/{id}/serahkan', [SuratController::class, 'serahkan']);
Route::get('/surats', [SuratController::class, 'search']);
Route::get('/surat-selesai', [SuratController::class, 'getSuratSelesai']);
Route::get('/surats-selesai', [SuratController::class, 'getAllSuratSelesai']);


Route::apiResource('laporan', LaporanController::class);
Route::get('laporan/user/{id}', [LaporanController::class, 'getByUserID']);

Route::apiResource('user', UserController::class);
Route::get('/users', [UserController::class, 'index']);

Route::post('/login', [LoginController::class, 'index']);
Route::get('/logout', [LoginController::class, 'logout']);
