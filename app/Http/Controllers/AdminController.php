<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductSchema;
use App\Http\Requests\StaffSchema;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Arr;

use App\User;
use App\Http\Catalogo;
use App\Models\Resources\Prodotto;

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

        $msg="Utente Staff aggiunto correttamente";
        return view('form.inserisciStaff')
                ->with('confirm', $msg);
        //return redirect()->route('listaUtenti/{ruolo}', 'staff');
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

        return redirect()->action('AdminController@listaUtenti', 'staff');
    }


    public function updateProdotto(ProductSchema $request) {

        if ($request->hasFile('foto')) {
            $image = $request->file('foto');
            $imageName = $image->getClientOriginalName();
            $destinationPath = public_path() . '/img/' . Catalogo::getParentCat($request->subCat) 
                                                . '/' . Catalogo::subCatToName($request->subCat);
            $image->move($destinationPath, $imageName);
        }

        $prodotto = new Prodotto;
        $prodotto->find($request->id)
                 ->update($request->validated());

        return redirect()->route('catalogo');
    }

    
}


