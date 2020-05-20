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


    public function showCatalog($categoria = 'monitor') {

        /*Le prime due instruzioni servono a ottenere gli elementi
        con cui si creeranno i filtri del catalogo*/

        //Recupera le Categorie
        $mainCats = $this->_catalogModel->getMainCat();

        //Recupera le Sottocategorie
        $subCats = $this->_catalogModel->getSubCat([$mainCats]);        

        //Tutti i prodotti della categoria selezionata, ordinati per sconto decrescente 
        $prodotti = $this->_catalogModel->getProdsByCat([$categoria], 2, 'desc');
        //$prodotti=NULL; $selected=null; $subCats=null;  $mainCats=null;
        return view('catalogo')
                        ->with('mainCats', $mainCats)
                        ->with('subCats', $subCats)
                        ->with('selected', $categoria)
                        ->with('prodotti', $prodotti);
    }

    //NON DEFINITIVE
    public function showLoginForm(){
        return view('form.login');
    }
    public function showRegisterForm(){
        return view('form.registrazione');
    }

}
