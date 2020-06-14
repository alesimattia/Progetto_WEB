<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\ProfileSchema;
use App\Models\Catalogo;
use App\User;

class userController extends Controller {

    protected $_catalogModel;

    public function __construct() {
        $this->middleware('can:isUser');
        $this->_catalogModel = new Catalogo;
    }

    public function index() {
        return view('userHome');
    }


    public function editProfilo(){
        return view('form.modificaProfilo')
                ->with('lista_occupaz', User::occupazione() )
                ->with('utente',  Auth::user() );
                                    //facade    oppure helper: auth()->user();
    }

    public function storeProfilo(ProfileSchema $request){

        $user = new User;
        $user->find(Auth::user()->username)
             ->update(array_merge( $request->validated(), ['password' => Hash::make($request->password)] ) );

        return response()->json(['redirect' => route('user')]);
    }
}
