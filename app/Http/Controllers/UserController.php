<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ProfileSchema;
use App\Models\Catalogo;
use App\User;

class userController extends Controller {

    protected $_catalogModel;

    public function __construct() {
        //$this->middleware('can:isUser');
    }

    public function index() {
        return view('userHome');
    }


    public function showCatalog($categoria = 'computer') {

        $mainCats = $this->_catalogModel->getAllMainCat();
        $subCats = $this->_catalogModel->getAllSubCat();

        $prodotti = $this->_catalogModel->getProdsByCat([$categoria], 4, 'desc');

        return view('catalogo')
                        ->with('mainCats', $mainCats)
                        ->with('subCats', $subCats)
                        ->with('selected', $categoria)
                        ->with('prodotti', $prodotti);
    }


    public function editProfilo(){
        
        return view('form.modificaProfilo')
                ->with('lista_occupaz', User::occupazione() )
                ->with('utente',  Auth::user() );
                                    //facade    oppure auth()->user();
    }

    public function storeProfilo(ProfileSchema $request){

        /*$user = User::find( Auth::user() );
        $user->nome = $request->nome;
        $user->cognome = $request->cognome;
        $user->password = Hash::make($request->password);
        $user->residenza = $request->residenza;
        $user->dataNascita = $request->dataNascita;
        $user->occupazione = $request->occupazione;
        $user->save();*/



        /*DB::table('utente')
              ->where('username', Auth::user() )
              ->update(['nome' => $request->nome,
                        'cognome' =>  $request->cognome,
                        'password' => $request->password,
                        'residenza' =>  $request->residenza,
                        'dataNascita' => $request->dataNascita,
                        'occupazione' =>  $request->occupazione,
              ]);*/



        /*DB::table('utente')
            ->updateOrInsert(
                ['username' => Auth::user()->username, 'nome' => $request->nome, 
                'cognome' => $request->cognome, 'password' => Hash::make($request->password),
                'residenza' => $request->residenza, 'dataNascita' => $request->dataNascita,
                'occupazione' => $request->occupazione]
            );*/



        /*$user = User::findOrFail(Auth::user()->username);
        $user->nome=$request->input('nome');
        $user->cognome=$request->input('cognome');
        $user->password=$request->input('password');
        $user->residenza=$request->input('residenza');
        $user->dataNascita=$request->input('dataNascita');
        $user->occupazione=$request->input('occupazione');
        $user->save(); */
        


        /*$user = Auth::user();
        $user->update($request->all());*/



        /*$user = User::findOrFail(Auth::user()->username);
        $user->nome=$request->find('nome');
        $user->cognome=$request->find('cognome');
        $user->password=$request->find('password');
        $user->residenza=$request->find('residenza');
        $user->dataNascita=$request->find('dataNascita');
        $user->occupazione=$request->find('occupazione');
        $user->save();*/



        /*$user = Auth::user();
        $user->nome=request('nome');
        $user->cognome=request('cognome');
        $user->password=request('password');
        $user->residenza=request('residenza');
        $user->dataNascita=request('dataNascita');
        $user->occupazione=request('occupazione');
        $user->save();*/


        $user = User::findOrFail( Auth::user() );
        $user->nome = $request['nome'];
        $user->cognome = $request['cognome'];
        $user->residenza = $request['residenza'];
        $user->password = $request['password'];
        $user->dataNascita = $request['dataNascita'];
        $user->occupazione = $request['occupazione'];
        $user->save();


        return Redirect::route('user');
    }
}
