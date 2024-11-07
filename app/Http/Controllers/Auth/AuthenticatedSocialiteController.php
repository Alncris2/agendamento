<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class AuthenticatedSocialiteController extends Controller
{
    /**
     * Redirect the user to the provider authentication page.
     *
     * @param  string  $provider
     * @return \Illuminate\Http\RedirectResponse
     */
    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    /**
     * Obtain the user information from the provider.
     *
     * @param  string  $provider
     * @return \Illuminate\Http\RedirectResponse
     */
    public function handleProviderCallback($provider)
    {
        $user = Socialite::driver($provider)->user();

        dd($user);

        $authUser = $this->findOrCreateUser($user, $provider);

        Auth::login($authUser, true);

        return redirect()->intended(RouteServiceProvider::HOME);
    }
}
