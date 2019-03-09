<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use App\UserSocial;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Laravel\Socialite\Facades\Socialite;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function redirectToGoogleProvider()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleProviderCallback()
    {
        try {
            $googleUser = Socialite::driver('google')->user();
        } catch (\Exception $e) {
            // TODO: log error message
            return redirect('/login');
        }

        $user = User::firstOrNew([
            'email' => $googleUser->email,
        ]);

        // new user
        if (! $user->name) {
            $user->name = $googleUser->name;
            $user->password = '';
            $user->save();
        }

        $user->socials()->updateOrCreate([
            'provider_type' => UserSocial::PROVIDER_TYPE_GOOGLE,
            'provider_id' => $googleUser->id,
            'avatar' => $googleUser->avatar,
        ]);

        auth()->login($user, true);

        return redirect()->to('/home');
    }
}
