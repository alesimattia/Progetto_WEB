<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use App\Models\Resources\Prodotto;
use App\Http\Requests\ProductSchema;

class staffController extends Controller {
    
    protected $_adminModel;

    public function __construct() {
        //$this->middleware('auth');
        $this -> _adminModel = new Admin;
    }

    public function index() {
        return view('staffHome');
    }
    
    public function addProduct() {
      $prodCats = $this->_adminModel->getAllSubCat()->pluck('nomeSubCat','id');
        return view('product.inserisciprodotto')
            ->with('cats',$prodCats);
    }
    
    public function storeProduct(ProductSchema $request) {
        
        if ($request->hasFile('foto')) {
            $image = $request->file('foto');
            $imageName = $image->getClientOriginalName();
        } else {
            $imageName = NULL;
        }
        
        $prodotto = new Prodotto;
        $prodotto->fill($request->validated());
        $prodotto->foto=$imageName;
        $prodotto->save(); 
        
        if (!is_null($imageName)) {
            $destinationPath = public_path() .'/img/' .$request->subCat;
            $image->move($destinationPath, $imageName);
        };
    }
    
    public function modificaProdotto() {
        return view('product.modificaprodotto');
    }
}
