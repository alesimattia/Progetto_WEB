<?php

namespace App\Http\Controllers;
use App\Models\Catalogo;

class userController extends Controller {

    public function __construct() {
        //$this->middleware('auth');
        $this->_catalogModel = new Catalogo;
    }

    public function index() {
        return view('userHome');
    }

    public function modificaProfilo(){
        return view('form.modificaProfilo');
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
}
