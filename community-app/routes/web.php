<?php

use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Route;
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

// CSRF 토큰을 제공하는 라우트
Route::get('csrf-cookie', function () {
    return response()->json([
        'csrfToken' => csrf_token()
    ]);
});

Route::get('/api/admin/nickname', [UserController::class, 'getAdminNickname']);

Route::get('login', [LoginController::class, 'redirectToGoogle'])->name('login.google');
Route::get('login/callback', [LoginController::class, 'handleGoogleCallback']);
Route::get('clear', [LoginController::class, 'clear']);
Route::post('logout', [LoginController::class, 'logout']);

require __DIR__.'/auth.php';