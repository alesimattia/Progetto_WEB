<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
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


    public function showCatalog($categoria = null) {

        /*Le prime due instruzioni servono a estrarre dal db
        gli elementi con cui popolare i filtri del catalogo*/

        $mainCats = $this->_catalogModel->getAllMainCat();
        $subCats = $this->_catalogModel->getAllSubCat();    

        //Tutti i prodotti della categoria selezionata, ordinati per sconto decrescente
        $prodotti = $this->_catalogModel->getProdsByCat([$categoria], 4, 'desc');
    
        return view('catalogo')
                    ->with('mainCats', $mainCats)
                    ->with('subCats', $subCats)
                    //->with('selected', $categoria)
                    ->with('prodotti', $prodotti);
    }


    public function editProfilo(){
        return view('form.modificaProfilo')
                ->with('lista_occupaz', User::occupazione() )
                ->with('utente',  Auth::user() );
                                    //facade    oppure auth()->user();
    }

    public function storeProfilo(ProfileSchema $request){

        $user = new User;
        $user->find(Auth::user()->username)
             ->update($request->validated())
             ->save();

        return redirect()->action('UserController@index');
    }
}
