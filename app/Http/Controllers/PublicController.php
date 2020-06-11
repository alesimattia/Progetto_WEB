<?php

namespace App\Http\Controllers;


use App\Models\Catalogo;
use App\Models\Resources\Prodotto;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Response;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\JsonResponse;

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

        /*if(! is_null($search)){
            $search = Validator::make($search, [
                'prodotto' => 'string|max:25',
            ]);
        }*/
        $prodotti = $this->_catalogModel->getProdsByCat([$categoria], 4, 'desc', $search->prodotto);
    
        return view('catalogo')
                    ->with('mainCats', $mainCats)
                    ->with('subCats', $subCats)
                    ->with('prodotti', $prodotti);
    }

    
    public function mostraDesc(){

        /*$this->_prodotto->id = $request->idProdotto;
        $testo = $this->_prodotto->readDescEstesa();*/
        
        $testo = Prodotto::readDescEstesa(2);
        //$testo = JSON.stringify(yourdata) 
        return response()->json(['text' => $testo], Response::HTTP_OK );
        //throw new HttpResponseException( response( $data, Response::HTTP_OK ) );
    }
}
