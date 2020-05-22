<?php

namespace App\Http\Controllers;
use App\Models\Catalogo;

class PublicController extends Controller {

    protected $_catalogModel;

    public function __construct() {
        $this->_catalogModel = new Catalogo;
    }

    public function index(){
        return view('home');
    }

                                //mostrare tutto se non cliccato
    public function showCatalog($categoria = 'computer') {

        /*Le prime due instruzioni servono a estrarre dal db
        gli elementi con cui popolare i filtri del catalogo*/

        $mainCats = $this->_catalogModel->getAllMainCat();
        $subCats = $this->_catalogModel->getAllSubCat();    

        //Tutti i prodotti della categoria selezionata, ordinati per sconto decrescente
        $prodotti = $this->_catalogModel->getProdsByCat([$categoria], 4, 'desc' , true);
    
        return view('catalogo')
                        ->with('mainCats', $mainCats)
                        ->with('subCats', $subCats)
                        ->with('selected', $categoria)
                        ->with('prodotti', $prodotti);
    }

    //rotte NON DEFINITIVE  
    public function showLoginForm(){
        return view('form.login');
    }
    public function showRegisterForm(){
        return view('form.registrazione');
    }
}
