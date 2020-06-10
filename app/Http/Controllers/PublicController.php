<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Catalogo;
use App\Models\Resources\Prodotto;

use Symfony\Component\HttpFoundation\Response;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\Exceptions\HttpResponseException;

class PublicController extends Controller {


    protected $_catalogModel;

    public function __construct() {
        $this->_catalogModel = new Catalogo;
        $this->_prodotto = new Prodotto;
    }

    public function index(){
        return view('home');
    }

                            
    public function showCatalog(Request $search, $categoria = 'monitor') {

        /** Estraggono dal db gli elementi con cui popolare i filtri del catalogo*/
        $mainCats = $this->_catalogModel->getAllMainCat();
        $subCats = $this->_catalogModel->getAllSubCat();    
        $prodotti = $this->_catalogModel->getProdsByCat([$categoria], 4, 'desc', $search->prodotto);
    
        return view('catalogo')
                    ->with('mainCats', $mainCats)
                    ->with('subCats', $subCats)
                    ->with('prodotti', $prodotti);
    }

    
    public function mostraDesc($id){

        /*$this->_prodotto->id = $request->idProdotto;
        $testo = $this->_prodotto->readDescEstesa();*/
        
        $testo = Prodotto::readDescEstesa($id);

        return response()->json($testo, Response::HTTP_OK, ['X-CSRF-TOKEN']);
        //throw new HttpResponseException( response( $data, Response::HTTP_OK ) );
    }
}
