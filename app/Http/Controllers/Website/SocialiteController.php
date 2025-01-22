<?php

namespace App\Http\Controllers\Website;

use App\Models\User;
use Nette\Utils\Random;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Services\SocialiteService;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;


class SocialiteController extends Controller
{

    private $socialiteService;
    public function __construct(SocialiteService $socialiteService)
    {
        $this->socialiteService = $socialiteService;
    }
    public function redirectToGoogle(Request $request)
    {
        // return Socialite::driver('google')->redirect();
        return $this->socialiteService->getGoogleToRedirect();
    }
    public function handelGoogleCallback(Request $request)
    {
        $userGoogle = $this->socialiteService->handelGoogleCallback();
        //Auth::login($userGoogle);
        return redirect()->intended('index');
    }

    public function redirectToFacebook(Request $request)
    {
        //return Socialite::driver('facebook')->redirect();
        return $this->socialiteService->getFacebookToRedirect();
    }

    public function handelFacebookCallback(Request $request)
    {


         $this->socialiteService->handelFacebookCallback();
         return redirect()->intended('index');

        //     $user = Socialite::driver('facebook')->stateless()->user();
        //    // dd($user->id);
        //     $existingUser = User::where('provider_id', $user->id)->first();
        //     //dd($existingUser->email);
        //     if ($existingUser) {
        //         Auth::login($existingUser);
        //         return redirect()->intended('index');
        //     } else {
        //         $existingUser = User::create([
        //             'name'          => $user->name,
        //             'email'         => $user->name ?? '',
        //             'password'      => Hash::make(Str::random(8)),
        //             'provider_id'      => $user->id,
        //         ]);
        //     }
        //     Auth::login($existingUser);
        //     return redirect()->intended('index');


    }
}
