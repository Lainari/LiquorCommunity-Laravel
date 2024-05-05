<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

// Route::middleware(['auth:sanctum'])->get('/token', function (Request $request) {
//     $user = $request->user();
//     $hasJwtCookie = $request->hasCookie('JWT');

//     return response()->json(['user' => $user, 'hasJwtCookie' => $hasJwtCookie]);
// });

Route::middleware('web')->group(function () {
    Route::get('/token', function () {
        $hasJwtSession = session()->get('JWT');

        return response()->json(['hasJwtSession' => $hasJwtSession]);
    });
});