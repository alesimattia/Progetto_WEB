<?php

namespace App\Http\Controllers;

use App\Models\Catalogo;
use App\Models\Resources\Prodotto;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Validator;


class PublicController extends Controller {


    protected $_catalogModel;

    public function __construct() {
        $this->_catalogModel = new Catalogo;
    }

    public function index(){
        return view('home');
    }

                            
    public function showCatalog( $categoria = 'monitor' ) {

        /** Estraggono dal db gli elementi con cui popolare i filtri del catalogo*/
        $mainCats = $this->_catalogModel->getAllMainCat();
        $subCats = $this->_catalogModel->getAllSubCat();    
        $prodotti = $this->_catalogModel->getProdsByCat([$categoria], 4, 'desc');
    
        return view('catalogo')
                    ->with('mainCats', $mainCats)
                    ->with('subCats', $subCats)
                    ->with('prodotti', $prodotti);
    }

    
    public function getInfoProdotto(Request $request){
    
        $prodotto = Prodotto::getProdotto($request->id);
        return response()->json($prodotto);     /** L'oggetto è già in forma 'chiave'-'valore' */
    }


    public function cerca(Request $request){
        return redirect()->route('cerca/{prodotto}', $request->prodotto );
    }


    public function showSearch($cercato) {

        $mainCats = $this->_catalogModel->getAllMainCat();
        $subCats = $this->_catalogModel->getAllSubCat();    

        /*if(! is_null($cercato)){
            $cercato = Validator::make([
                'start_time'=>'required',
            ]);
            if($validator->passes())
        }*/

        $prodotti = $this->_catalogModel->getProdsByCat(null, 4, 'desc', $cercato);
    
        return view('catalogo')
                    ->with('mainCats', $mainCats)
                    ->with('subCats', $subCats)
                    ->with('prodotti', $prodotti);
    }
}
