<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

use App\Models\Resources\Prodotto;
use App\Http\Requests\ProductSchema;
use App\Models\Catalogo;
use App\Models\Resources\Categoria;
use App\Http\Requests\CatSchema;
use App\Models\Resources\Sottocategoria;
use App\Http\Requests\SubCatSchema;

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

/*----------------------------------------------------------------------------*/

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

/*----------------------------------------------------------------------------*/
    
    public function eliminaProdotti() {

        if( isset($_POST['selezionati']) && is_array($_POST['selezionati']) )
            foreach($_POST['selezionati'] as $selezionato)
                Prodotto::get()->find($selezionato)->delete();
        
        return redirect()->route('listaProdotti');
    }
    
/*----------------------------------------------------------------------------*/
    
    public function aggiungiCat() {
        $Cats = Catalogo::getAllMainCat()->pluck('nomeCat','id');
        return view ('form.aggiungiCategoria')
            ->with('Cats', $Cats)
            ->with('Conferma',0);
        
    }
    
    public function storeCat(CatSchema $request) {
        $categoria = new Categoria;
        $categoria->fill($request->validated());     
        $categoria->save();
        $Cats = Catalogo::getAllMainCat()->pluck('nomeCat','id');
        return view ('form.aggiungiCategoria')
            ->with('Conferma', 1)
            ->with('Cats', $Cats);
    }
    
    public function storeSub(SubCatSchema $request) {
        $sub = new Sottocategoria;
        $sub->fill($request->validated());     
        $sub->save();
        $Cats = Catalogo::getAllMainCat()->pluck('nomeCat','id');
        return view ('form.aggiungiCategoria')
            ->with('Conferma', 2)
            ->with('Cats', $Cats);
    }
}
