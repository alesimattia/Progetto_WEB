<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;     //trait php per validazione form

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */

    protected $redirectTo = '/user';
    protected $_utente;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //vincola l'accesso di questo controller
        $this->middleware('guest');   //guest è il ruolo predefinito degli utenti non registrati
        $this->_utente = new User;
        
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'nome' => ['required', 'string', 'max:20'],
            'cognome' => ['required', 'string', 'max:20'],
            'residenza' => ['required', 'string', 'max:30'],
            'dataNascita' => ['required', 'date'],
            'occupazione' => ['required', 'string', 'max:30'],
            'username' => ['required', 'string', 'min:8', 'unique:utente'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],

        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        
        return User::create([
            'nome' => $data['nome'],
            'cognome' => $data['cognome'],
            'residenza' => $data['residenza'],
            'dataNascita' => $data['dataNascita'],
            'occupazione' => $data['occupazione'],
            'username' => $data['username'],
            'password' => Hash::make($data['password']),
            'ruolo' => 'user'

        ]);
    }

    
    public function showRegistrationForm(){
        return view('auth.register')
            ->with('occupazione' , $this->_utente->occupazione());
    }
}
