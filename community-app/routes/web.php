<?php

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

Route::get('/', function () {
    return view('main');
});

Route::get('/whisky/info', function(){
    return view('whisky/info');
});

Route::get('/whisky/review', function(){
    return view('whisky/review');
});

Route::get('/recommend/bar', function(){
    return view('recommend/bar');
});

Route::get('/recommend/shop', function(){
    return view('recommend/shop');
});

Route::get('/mypage/signin', function(){
    return view('mypage/signin');
});

Route::get('/mypage/signup', function(){
    return view('mypage/signup');
});

Route::post('/mypage/signup', [UserController::class, 'store']);
Route::post('/checkDuplicate',[UserController::class, 'check']);