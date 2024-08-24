<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class GoogleController extends Controller
{
    //
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }
    public function handleGoogleCallback()
    {
        $user = Socialite::driver('google')->stateless()->user();

        // Find or create the user in your database
        $authUser = User::firstOrCreate([
            'email' => $user->getEmail(),
        ], [
            'name' => $user->getName(),
            'google_id' => $user->getId(),
            'image' => $user->getAvatar(),
        ]);

        Auth::login($authUser, true);

        // $redirectUrl = session()->pull('previous_url', url('/'));

        return redirect('/');
        // return redirect("/about");
    }

    // logout
    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }

    public function profile(){
       if (!Auth::check()) {
            return redirect('/login');
        }
       $user = auth()->user();
       return view('front-end.profile', compact('user'));
    }


}
