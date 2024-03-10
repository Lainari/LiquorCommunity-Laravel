<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Log;
use Tymon\JWTAuth\Facades\JWTAuth;

class LoginController extends Controller
{
    /**
     * Redirect the user to the Google authentication page.
     *
     * @return \Illuminate\Http\Response
     */
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    /**
     * Obtain the user information from Google.
     *
     * @return \Illuminate\Http\Response
     */
    public function handleGoogleCallback()
    {
        try {
            $googleUser = Socialite::driver('google')->user();
        } catch (\Exception $e) {
            Log::error('Google login error: ' . $e->getMessage());
            return redirect('http://localhost:3000')->withErrors('Unable to authenticate with Google.');
        }

        // Check if the user exists
        $existingUser = User::where('email', $googleUser->getEmail())->first();

        // If user doesn't exist, create a new one
        if (!$existingUser) {
            $newUser = new User();
            $newUser->user_id = $googleUser->getId();
            $newUser->name = $googleUser->getName();
            $newUser->email = $googleUser->getEmail();
            $newUser->birthday = '1999-10-21';
            $newUser->password = ''; // Password not required for OAuth login
            $newUser->save();

            Auth::login($newUser);
            $user = $newUser;
        } else {
            Auth::login($existingUser);
            $user = $existingUser;
        }
        // JWT Token Create
        $token = JWTAuth::fromUser($user);

        // Redirect with Cookie
        return redirect('/clear')->withCookie($token);
    }

    public function clear()
    {
        return redirect('http://localhost:3000');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('http://localhost:3000');
    }
}
