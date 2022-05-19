<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class GoogleController extends Controller
{
    public function getGoogleSignInUrl()
    {
        //dd(Socialite::driver('google')->stateless()->redirect());
        return Socialite::driver('google')->stateless()->redirect();   
    }

    public function loginCallback(Request $request)
    {
        $googleUser = Socialite::driver('google')->stateless()->user();
        $user = User::where('email', $googleUser->email)->first();
        if(!$user){
            //create new user
            $user = new User();
            $user->name = $googleUser->name;
            $user->email = $googleUser->email;
            $user->level = 0;
            $user->password = bcrypt($googleUser->id);
            //$user->password = bcrypt('123');
            $user->save();
        }
        auth()->login($user, true);
        session(['user_name' => Auth::user()->name]);
        return redirect()->route('todos.index');
    }
}
