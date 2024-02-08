<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

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
            return redirect('/login')->withErrors('Unable to authenticate with Google.');
        }

        // Check if the user exists
        $existingUser = User::where('email', $googleUser->getEmail())->first();

        // If user doesn't exist, create a new one
        if (!$existingUser) {
            $newUser = new User();
            $newUser->name = $googleUser->getName();
            $newUser->email = $googleUser->getEmail();
            $newUser->password = ''; // Password not required for OAuth login
            $newUser->save();

            Auth::login($newUser);
        } else {
            Auth::login($existingUser);
        }

        return redirect('/'); // Redirect to home page after successful login
    }
}