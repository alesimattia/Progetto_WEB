<?php

namespace App\Http\Controllers;


use App\Http\Requests\StaffSchema;
use App\Http\Requests\ProductSchema;

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
        $user->residenza=NULL;
        $user->occupazione=NULL;
        $user->dataNascita=NULL;
        $user->ruolo='staff';
        $user->fill($request->validated());  //valorizza le proprietà dell'oggetto user con ciò che era nel request object (dal form)
        $user->save();   //genera query nel dbms

        
        $confirm="Utente Staff aggiunto correttamente";
        return view('form.inserisciStaff')
                    ->with('confirm', $confirm);
    }
    
/*------------------------------------------------------------------------------------------*/
    
    public function listaUtenti($ruolo = null) {
        switch($ruolo){
            case 'user':
                return view('form.listaUtenti')
                    ->with('profili', User::get()->where('ruolo','user'));
            break;

            case 'staff':
                return view('form.listaUtenti')
                    ->with('profili', User::get()->where('ruolo','staff'));
            break;

            default :
                return view('form.listaUtenti')
                        ->with('profili', User::get()->notIn('ruolo','amdin'));
            break;
        }
    }
    

    public function eliminaProfilo() {

        User::get()->find($_POST["username"])->delete();
        return route()->action('listaUtenti');
    }

}


