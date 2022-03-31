<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\ResetsPasswords;

use Auth;

class ResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    /**
     * Where to redirect users after resetting their password.
     *
     * @var string
     */

    protected $redirectTo = RouteServiceProvider::HOME;
    //protected $redirectTo;

    public function __construct()
    {
        // azrin - buat multiple user
        if(Auth::check() && Auth::user()->role_id == 1){
            $this->redirectTo = route('admins.dashboard');
        } elseif(Auth::check() && Auth::user()->role_id == 2){
            $this->redirectTo = route('managers.dashboard');
        } elseif(Auth::check() && Auth::user()->role_id == 3){
            $this->redirectTo = route('users.dashboard');
        } elseif(Auth::user() && Auth::user()->role_id == 4){
            $this->redirectTo = route('linemanagers.dashboard');
        }

        $this->middleware('guest')->except('logout');
    }
}
