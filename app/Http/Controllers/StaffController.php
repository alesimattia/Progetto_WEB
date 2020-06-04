<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

use App\Models\Resources\Prodotto;
use App\Http\Requests\ProductSchema;
use App\Models\Catalogo;

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
            $destinationPath = public_path() . '/img/' . (String) Catalogo::getParentCat($request->subCat) 
                                                . '/' . (String) Catalogo::subCatToName($request->subCat);
            $image->move($destinationPath, $imageName);
        }
        else    $imageName = 'dummy.jpg';

        $prodotto = new Prodotto;
        $prodotto->foto=$imageName;
        $prodotto->fill($request->validated());
        $prodotto->save();

        return redirect()->route('catalogo');
    }

/*----------------------------------------------------------------------------*/

    public function listaProdotti() {
        return view('product.listaProdotti')
                    ->with('prodotti', Prodotto::get() );
    }

    public function modificaProdotto($id){
        
        $subCats = Catalogo::getAllSubCat()->pluck('nomeSubCat','id');
        $prodotto = Prodotto::where('id','=', $id)
                                ->get()->first();
        
        return view('product.modificaProdotto')
                    ->with('prodotto', $prodotto)
                    ->with('subCats', $subCats);
    }

    public function updateProduct(ProductSchema $request) {

        if ($request->hasFile('foto')) {
            $image = $request->file('foto');
            $imageName = $image->getClientOriginalName();
            $destinationPath = public_path() . '/img/' . (String) Catalogo::getParentCat($request->subCat) 
                                                . '/' . (String) Catalogo::subCatToName($request->subCat);
            $image->move($destinationPath, $imageName);
        }

        $prodotto = new Prodotto;
        $prodotto->find($request->id)
                 ->update($request->validated());

        return redirect()->route('catalogo');
    }

/*----------------------------------------------------------------------------*/
    public function eliminaProdotto() {
        return view('product.eliminaProdotto')
                ->with('prodotto', prodotto::all());
    }
    
    public function eliminaProdottoConf() {
        $prod= Prodotto::getAll()->find($_POST["id"]);
        $prod->delete();
        
        return view('staffHome');
    }
}
