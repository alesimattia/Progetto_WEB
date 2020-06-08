<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

use App\Models\Resources\Sottocategoria;
use App\Models\Resources\Categoria;
use App\Models\Resources\Prodotto;
use App\Models\Catalogo;

use App\Http\Requests\ProductSchema;
use App\Http\Requests\SubCatSchema;
use App\Http\Requests\CatSchema;

class staffController extends Controller {

    protected $_adminModel;

    public function __construct() {
        $this->middleware('auth');
        $this->_catalogModel = new Catalogo;
    }

    public function index() {
        return view('staffHome');
    }

    public function addProduct() {
        $subCats = Catalogo::getAllSubCat()->pluck('nomeSubCat','id');
        return view('product.inserisciProdotto')
                ->with('subCats', $subCats);
    }

    public function storeProduct(ProductSchema $request) {

        if ($request->hasFile('foto')) {
            $image = $request->file('foto');
            $imageName = $image->getClientOriginalName();
            $destinationPath = public_path() . '/img/' . Catalogo::getParentCat($request->subCat) 
                                                . '/' . Catalogo::subCatToName($request->subCat);
            $image->move($destinationPath, $imageName);
        } 
        else  $imageName = 'dummy.jpg';

        $prodotto = new Prodotto;
        $prodotto->fill($request->validated());
        $prodotto->foto = $imageName;
        $prodotto->save();

        return redirect()->route('catalogo');
    }

/*--------------------------------------------------------------------------------------*/

    public function listaProdotti() {
        return view('product.listaProdotti')
                    ->with('prodotti', Prodotto::paginate(6) );
    }


    public function modificaProdotto($id){
        
        $subCats = Catalogo::getAllSubCat()->pluck('nomeSubCat','id');
        $prodotto = Prodotto::where('id','=', $id)
                                ->get()->first();
        
        return view('product.modificaProdotto')
                    ->with('prodotto', $prodotto)
                    ->with('subCats', $subCats);
    }


    public function updateProdotto(ProductSchema $request) {

        if ($request->hasFile('foto')) {
            $image = $request->file('foto');
            $imageName = $image->getClientOriginalName();
            $destinationPath = public_path() . '/img/' . Catalogo::getParentCat($request->subCat) 
                                                . '/' . Catalogo::subCatToName($request->subCat);
            $image->move($destinationPath, $imageName);
        }

        $prodotto = new Prodotto;
        $prodotto->find($request->id)
                 ->update($request->validated());

        return redirect()->route('catalogo');
    }


    public function eliminaProdotti() {

        if( isset($_POST['selezionati']) && is_array($_POST['selezionati']) )
            foreach($_POST['selezionati'] as $selezionato)
                Prodotto::get()->find($selezionato)->delete();
        
        return redirect()->route('listaProdotti');
    }

/*--------------------------------------------------------------------------------------*/
    
    public function aggiungiCat() {

        $cats = Catalogo::getAllMainCat()->pluck('nomeCat','id');
        return view ('form.aggiungiCategoria')
                ->with('cats', $cats);
    }


    public function storeCat(CatSchema $request) {
        $categoria = new Categoria;
        $categoria->fill($request->validated());     
        $categoria->save();
        $cats = Catalogo::getAllMainCat()->pluck('nomeCat','id');
        $msg = "Categoria aggiunta correttamente";

        return view ('form.aggiungiCategoria')
                ->with('cats', $cats)
                ->with('confirm', $msg);
    }


    public function storeSub(SubCatSchema $request) {
        $sub = new Sottocategoria;
        $sub->fill($request->validated());     
        $sub->save();
        $cats = Catalogo::getAllMainCat()->pluck('nomeCat','id');
        $msg = "Sottocategoria aggiunta correttamente";

        return view ('form.aggiungiCategoria')
                ->with('cats', $cats)
                ->with('confirm', $msg);
    }
    
    
}
