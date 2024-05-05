<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;

class UserController extends Controller
{
    public function show($id)
    {
        $user = User::find($id);
        return response()->json(['user' => $user]);
    }
}
