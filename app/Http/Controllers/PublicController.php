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

                            //mostra tutto se non cliccato
    public function showCatalog($categoria = null) {

        /*Estraggono dal db gli elementi con cui popolare i filtri del catalogo*/
        $mainCats = $this->_catalogModel->getAllMainCat();
        $subCats = $this->_catalogModel->getAllSubCat();    

        $prodotti = $this->_catalogModel->getProdsByCat([$categoria], 4, 'desc');
    
        return view('catalogo')
                    ->with('mainCats', $mainCats)
                    ->with('subCats', $subCats)
                    //->with('selected', $categoria)
                    ->with('prodotti', $prodotti);
    }

    public function showDesc($prodotto){
        return view('product.descProdotto')
                    ->with('prodotto', $prodotto);
    }
}
