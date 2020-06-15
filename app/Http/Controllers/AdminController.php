<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductSchema;
use App\Http\Requests\StaffSchema;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Arr;

use App\User;
use App\Http\Catalogo;
use App\Models\Resources\Prodotto;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class AdminController extends Controller {


    public function __construct() {
        $this->middleware('can:isAdmin');
    }

    public function index() {
        return view('adminHome');
    }
    

    public function addStaff() {
        return view('form.inserisciStaff');
    }

                            //request object tipizzato dalla classe
    public function storeStaff(StaffSchema $request) {
        
        $user = new User;
        $user->fill($request->validated()); //valorizza le proprietà dell'oggetto user con ciò che era nel request object (dal form)
        
        $user->residenza=NULL;
        $user->occupazione=NULL;
        $user->dataNascita=NULL;
        $user->ruolo='staff';
        $user->password = Hash::make($request->password);
        
        $user->save();   //genera query nel dbms
        
        return response()->json(['redirect' => route('listaUtenti/{ruolo}' , ['staff'] ) ]);
    }
    
/*------------------------------------------------------------------------------------------*/
    
    public function listaUtenti($ruolo = null) {

        return view('listaUtenti')
            ->with('utenti', User::get()->where('ruolo', $ruolo))
            ->with('ruolo', $ruolo);
    }
    
 
    public function eliminaProfilo($ruolo) {

        if( isset($_POST['selezionati']) && is_array($_POST['selezionati']) )
            foreach($_POST['selezionati'] as $selezionato)
                User::get()->find($selezionato)->delete();
        
        return redirect()->route('listaUtenti/{ruolo}', $ruolo);
    }


    public function modificaStaff($username){

        return view('form.modificaProfilo')
                ->with('utente',  User::find($username) );
    }


    public function updateStaff(StaffSchema $request){

            $user = new User;
            if($request->oldUsername == $request->username)
                $user->find($request->oldUsername)
                        ->update(['password' => Hash::make($request->password), 'nome' => $request->nome, 'cognome' => $request->cognome] ) ;
            else
                $user->find($request->oldUsername)
                        ->update(array_merge( $request->validated(), ['password' => Hash::make($request->password)] ) );

        return response()->json(['redirect' => route('listaUtenti/{ruolo}' , ['staff'] ) ]);
    }

    public static function getAllUsername(){
        $utenti = User::get()->pluck('username');
        return response()->json($utenti); 
    }
}


