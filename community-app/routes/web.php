<?php

use App\Http\Controllers\PageController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::prefix('mypage')->group(function () {
    Route::get('/signin', function() {
        return view('mypage/signin');
    });
    Route::get('/signup', function() {
        return view('mypage/signup');
    });
    Route::post('/signup', [UserController::class, 'store']);
    Route::post('/signup/checkDuplicate', [UserController::class, 'check']);
    Route::post('/signin', [UserController::class, 'login']);
    Route::post('/signin/logout', [UserController::class, 'logout']);
});

Route::group(['middleware'=>'jwt.token'], function(){
    
    Route::get('/', function(){
        return view('main');
    });

    Route::prefix('whisky')->group(function () {
        Route::get('/info', function() {
            return view('whisky/info');
        });
        Route::get('/review', function() {
            return view('whisky/review');
        });
    });
    
    Route::prefix('recommend')->group(function () {
        Route::get('/bar', function() {
            return view('recommend/bar');
        });
        Route::get('/shop', function() {
            return view('recommend/shop');
        });
    });
    
    Route::prefix('mypage')->group(function () {
        Route::get('/info', function() {
            return view('mypage/info');
        });
        Route::put('/account/edit', [UserController::class, 'update']);
        Route::delete('/account/withdrawal', [UserController::class, 'destroy']);
    });

    
    Route::prefix('manager')->group(function() {
        Route::get('/approve', function(){
            return view('manager/approve');
        });
    });
});