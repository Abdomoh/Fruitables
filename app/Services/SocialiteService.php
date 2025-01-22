<?php

namespace App\Services;

use App\Models\User;
use Mockery\Expectation;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;

class SocialiteService
{
    public function getGoogleToRedirect()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handelGoogleCallback()
    {
        try {
            $user = Socialite::driver('google')->stateless()->user();
            $userGoogle = User::where('email', $user->email)->first();
            if ($userGoogle) {
                Auth::login($userGoogle);
            } else {
                $user = User::create([

                    'name' => $user->name,
                    'email' => $user->email,
                    'password' => Hash::make(Str::random(8)),
                ]);
                Auth::login($user);
            }

            return $user;
        } catch (\Exception $e) {
            dd($e->getMessage());
        }
    }

    public function getFacebookToRedirect()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function handelFacebookCallback(){
        try {
            $user = Socialite::driver('facebook')->stateless()->user();
            $existingUser = User::where('provider_id', $user->id)->first();
           // dd($existingUser);
            if ($existingUser) {
                Auth::login($existingUser);
            } else {
                $existingUser = User::create([
                    'name'          => $user->name,
                    'email'         => $user->email ?? '',
                    'password'      => Hash::make(Str::random(8)),
                    'provider_id'      => $user->id,
                ]);
                Auth::login($existingUser);
            }

            return $existingUser;
        } catch (\Exception $e) {
            dd($e->getMessage());
        }
    }
}
