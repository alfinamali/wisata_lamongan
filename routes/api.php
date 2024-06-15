<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TempatWisataController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DestinasiController;
use App\Http\Controllers\UmkmController;
use App\Models\TempatWisata;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Response;
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

Route::get('destinasi', [DestinasiController::class, 'index']);

Route::get('wisata', [TempatWisataController::class, 'index']);
Route::post('wisata', [TempatWisataController::class, 'store']);
Route::get('wisata/{id}', [TempatWisataController::class, 'show']);
Route::post('wisata/{id}', [TempatWisataController::class, 'update']);
Route::delete('wisata/{id}', [TempatWisataController::class, 'destroy']);
// Route::get('bukit/{id}', [TempatWisataController::class, 'image']);
Route::get('alam', [TempatWisataController::class, 'alam']);
Route::get('religi', [TempatWisataController::class, 'religi']);
// Route::get('umkm', [TempatWisataController::class, 'umkm']);
// Route::post('/auth/register', [AuthController::class, 'register']);
// Route::post('/auth/login', [AuthController::class, 'login']);

// Route::get('user/{id}', [AuthController::class, 'show']);
// Route::get('/profile', [AuthController::class, 'getProfile']);
Route::get('umkm', [UmkmController::class, 'index']);
Route::post('umkm', [UmkmController::class, 'store']);
Route::get('umkm/{id}', [UmkmController::class, 'show']);
Route::post('umkm/{id}', [UmkmController::class, 'update']);
Route::delete('umkm/{id}', [UmkmController::class, 'destroy']);



Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);
Route::post('logout', [AuthController::class, 'logout'])->middleware('auth:api');
Route::get('profile', [AuthController::class, 'getProfile'])->middleware('auth:api');



Route::middleware('auth:api')->group(function () {
    // Routes that require authentication
    Route::post('wisata/favorite', [TempatWisataController::class, 'toggleFavorite']);
});
// Route::get('/wisata', [TempatWisataController::class, 'index']);

Route::get('/file/{filename}', function ($filename) {
    $path = storage_path('app/public/images/' . $filename);

    if (!file_exists($path)) {
        return response()->json(['message' => 'Gambar tidak ditemukan.'], 404);
    }

    $mimeType = mime_content_type($path);

    if (strpos($mimeType, 'image/') !== 0) {
        return response()->json(['message' => 'File bukan gambar.'], 400);
    }

    return Response::file($path, ['Content-Type' => $mimeType]);
});
