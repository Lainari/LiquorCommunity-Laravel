<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Models\Post;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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

// 로그인 상태 없어도 되는 곳
Route::prefix('mypage')->group(function () {
    Route::get('/signin', function() {
        return view('mypage/signin');
    });
    Route::get('/signup', function() {
        return view('mypage/signup');
    });
    Route::post('/signup', [UserController::class, 'create']);
    Route::post('/signup/checkDuplicate', [UserController::class, 'check']);
    Route::post('/signin', [UserController::class, 'login']);
    Route::post('/signin/logout', [UserController::class, 'logout']);
});


// 여기서부터는 jwt.token을 요구함(로그인 상태)
Route::group(['middleware'=>'jwt.token'], function(){
    
    Route::get('/', function(){
        return view('main');
    });

    Route::prefix('whisky')->group(function () {
        Route::get('/info', function() {
            $posts = Post::where('type', 'info')->get();
            return view('whisky.info', ['posts' => $posts]);
        });
        Route::post('/info', [PostController::class, 'infoCreate']);
        Route::get('/info/{id}', [PostController::class, 'infoShow']);
        Route::put('/info/{id}', [PostController::class, 'infoUpdate']);
        Route::delete('/info/post/{id}', [PostController::class, 'infoDestroy']);

        Route::get('/review', function() {
            $posts = Post::where('type', 'review')->get();
            return view('whisky.review', ['posts' => $posts]);
        });
        Route::post('/review', [PostController::class, 'reviewCreate']);
        Route::get('/review/{id}', [PostController::class, 'reviewShow']);
        Route::put('/review/{id}', [PostController::class, 'reviewUpdate']);
        Route::delete('/review/post/{id}', [PostController::class, 'reviewDestroy']);

        Route::post('/search', [PostController::class, 'infoSearch']);
    });

    Route::prefix('mypage')->group(function () {
        Route::get('/info', function() {
            $posts = Post::where('user_id', auth()->id())->get();
            return view('mypage/info', ['posts' => $posts]);
        });
        Route::put('/account/edit', [UserController::class, 'update']);
        Route::delete('/account/withdrawal', [UserController::class, 'destroy']);
    });
    
    Route::prefix('manager')->group(function() {
        Route::get('/approve', function(){
            $posts = Post::where('approve', 0)->get();
            return view('manager/approve', ['posts' => $posts]);
        });

        Route::put('/approve/{id}',[PostController::class, 'approveSuccess']);
        Route::delete('/approve/{id}',[PostController::class, 'approveDenied']);
    });
});