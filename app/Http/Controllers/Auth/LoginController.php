<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

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

    /**
    * Customize credentials to use in login
    * @return array
    */
    protected function credentials(Request $request)
    {
        return array_merge($request->only($this->username(), 'password'), ['role_id' => 1]);
    }

    /**
     * Handle an authentication attempt.
     * @return Response
     */
     public function authenticate()
     {
        if (Auth::attempt($credentials)) 
        {
            return redirect()->intended('dashboard');
        }
     }
}
