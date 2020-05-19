<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Resources\Prodotto;
use App\Http\Requests\NewProductRequest;

class AdminController extends Controller {

    protected $_adminModel;

    public function __construct() {
        $this->middleware('can:isAdmin');
        $this->_adminModel = new Admin;
    }

    public function index() {
        return view('adminHome');
    }

    public function addProduct() {
        $prodCats = $this->_adminModel->getProdsCats()->pluck('name', 'catId');
        return view('product.insert')
                    ->with('cats', $prodCats);
    }

                                    //request object tipizzato dalla classe
    public function storeProduct(NewProductRequest $request) {

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = $image->getClientOriginalName();
        } else {
            $imageName = NULL;
        }

        $product = new Prodotto;
        $product->fill($request->validated());
        $product->image = $imageName;
        $product->save();

        if (!is_null($imageName)) {
            $destinationPath = public_path() . '/images/products';
            $image->move($destinationPath, $imageName);
        };

        return redirect()->action('AdminController@index');
    }

}
