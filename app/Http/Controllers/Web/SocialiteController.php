<?php
namespace App\Http\Controllers\Web;
use Illuminate\Http\Request;
use App\Services\SocialiteService;
use App\Http\Controllers\Controller;
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
        return redirect()->intended('/');
    }

    public function redirectToFacebook(Request $request)
    {

        return $this->socialiteService->getFacebookToRedirect();
    }

    public function handelFacebookCallback(Request $request)
    {
        $this->socialiteService->handelFacebookCallback();
        return redirect()->intended('/');
    }
}
