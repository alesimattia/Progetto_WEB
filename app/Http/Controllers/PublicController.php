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

    //Solo prodotti in sconto, dal più scontato
    public function showGuestCatalog() {
        //Recupera le macro-categorie
        $mainCat = $this->_catalogModel->getMainCat();
        
        //Solo prodotti in sconto di tutte le categorie, ordinati per sconto decrescente
        $products = $this->_catalogModel->getProdsByCat($mainCat->map->only(['id']), 2, 'desc', true);

        return view('catalogo')
                    ->with('topCategories', $mainCat)
                    ->with('products', $products);
    }


    public function showCatalog2($topCatId) {

        //Categorie Top
        $mainCat = $this->_catalogModel->getMainCat();

        //Categoria Top selezionata
        $selTopCat = $mainCat->where('catId', $topCatId)->first();

        // Sottocategorie
        $subCats = $this->_catalogModel->getCatsByParId([$topCatId]);
                        
        //Tutti i prodotti della categoria Top selezionata, ordinati per sconto decrescente 
        $prodotti = $this->_catalogModel->getProdsByCat([$topCatId], 2, 'desc', false);

        return view('catalogo')
                        ->with('topCategories', $mainCat)
                        ->with('selectedTopCat', $selTopCat)
                        ->with('subCategories', $subCats)
                        ->with('products', $prodotti);
    }

    public function showCatalog3($topCatId, $catId) {

        //Categorie Top
        $mainCat = $this->_catalogModel->getMainCat();

        //Categoria Top selezionata
        $selTopCat = $mainCat->where('catId', $topCatId)->first();

        // Sottocategorie
        $subCats = $this->_catalogModel->getCatsByParId([$topCatId]);

        // Prodotti della categoria selezionata, in sconto o meno
       $prodotti = $this->_catalogModel->getProdsByCat([$catId]);

        return view('catalogo')
                        ->with('topCategories', $mainCat)
                        ->with('selectedTopCat', $selTopCat)
                        ->with('subCategories', $subCats)
                        ->with('products', $prodotti);
    }

}
