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
    //protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    //redirect user after login depending on their roles
    public function redirectTo()
    {
        if (Auth::user()->hasRole('admin')){
            $this->redirectTo = route('users.index');
            return $this->redirectTo;
        }
        else if (Auth::user()->hasRole('agent')){

        $this->redirectTo = route('listings.index');
            return $this->redirectTo;

        }

        $this->redirectTo = route('home');
            return $this->redirectTo;
           
    }
}
