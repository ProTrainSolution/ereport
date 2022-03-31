<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

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

     protected $redirectTo = RouteServiceProvider::HOME;
    //protected $redirectTo;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
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
