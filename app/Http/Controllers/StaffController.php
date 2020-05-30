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
        //$this->middleware('auth');
    }

    public function index() {
        return view('staffHome');
    }
    
    public function addProduct() {
      $subCats = Catalogo::getAllSubCat()->pluck('nomeSubCat','id');
        return view('product.inserisciprodotto')
            ->with('subCats',$subCats);
    }
    
    public function storeProduct(ProductSchema $request) {
        
        if ($request->hasFile('foto')) {
            $image = $request->file('foto');
            $imageName = $image->getClientOriginalName();
        } 
        else    $imageName = 'dummy.jpg';
        
        $prodotto = new Prodotto;
        $prodotto->fill($request->validated());
        $prodotto->foto=$imageName;
        $prodotto->save(); 
        
        if (!is_null($imageName)) {
            $destinationPath = public_path() . '/img/' . Catalogo::getParentCat($request->subCat) . '/' . $request->subCat;
            $image->move($destinationPath, $imageName);
        };
    }
    
    public function modificaProdotto() {
        return view('product.modificaprodotto');
    }
}