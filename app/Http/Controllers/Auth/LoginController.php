<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller {
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
/*public function authenticate(Request $request)
    {
        $credentials = $request->only('username', 'password');
        if (Auth::attempt($credentials)) {
            // Authentication passed...
            return redirect()->intended('dashboard');
        }
    }*/
/*protected $primaryKey = 'username';
public $incrementing = false;
protected $keyType = 'string';
public function getAuthIdentifierName()

{

    return 'username';

}*/
    /**
     * Where to redirect users after login.
     *
     * @var string
     */
//    protected $redirectTo = '/home';

    protected function redirectTo() {
        $ruolo = auth()->user()->ruolo;
        switch ($ruolo) {
            case 'admin': return '/admin';
                break;
            case 'user': return '/user';
                break;
            case 'staff': return '/staff';
                break;
            default: return '/';
        };
    }

    /**
     * Override del metodo 'username' del trait AuthenticateUsers
     *
     */
    public function username() {
        return 'username';
    }


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        $this->middleware('guest')->except('logout');
    }


}
