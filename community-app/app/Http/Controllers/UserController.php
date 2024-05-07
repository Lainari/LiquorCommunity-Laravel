<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Tymon\JWTAuth\Facades\JWTAuth;

class UserController extends Controller
{
    public function show($id)
    {
        $user = User::find($id);
        return response()->json(['user' => $user]);
    }
    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $user->name = $request->input('name');
        $user->email = $request->input('email');
    
        if ($request->hasFile('image')) {
            if ($user->profile) {
                $oldImagePath = public_path('../client/public' . $user->profile);
                if (File::exists($oldImagePath)) {
                    File::delete($oldImagePath);
                }
            }
    
            $file = $request->file('image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('../client/public/images/user'), $filename);
            $user->profile = '/images/user/' . $filename;
        }
    
        $user->save();
    
        return response()->json(['user' => $user]);
    }
}
