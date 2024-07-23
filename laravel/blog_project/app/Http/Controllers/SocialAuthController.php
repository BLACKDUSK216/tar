<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Str;

class SocialAuthController extends Controller
{
    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    public function handleProviderCallback($provider)
    {
        $user = Socialite::driver($provider)->stateless()->user();  
        $authUser = $this->findOrCreateUser($user, $provider);
        Auth::login($authUser, true);
        return redirect()->intended('/home');
    }

    public function findOrCreateUser($user, $provider)
    {
        $authUser = User::where('provider_id', $user->id)->first();
        if ($authUser) {
            return $authUser;
        }
    
        $username = Str::slug($user->name);
    
        while (User::where('username', $username)->exists()) {
            $username .= rand(1, 1000);
        }
    
        return User::create([
            'name' => $user->name,
            'email' => $user->email,
            'username' => $username,
            'provider' => $provider,
            'provider_id' => $user->id,
        ]);
    }
    
}

