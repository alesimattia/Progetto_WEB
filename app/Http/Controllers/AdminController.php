<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Resources\Prodotto;
use App\Http\Requests\ProductSchema;

class AdminController extends Controller {

    protected $_adminModel;

    public function __construct() {
        //$this->middleware('can:isAdmin');     //altrimenti la rotta non è raggiungibile inserendo direttamente l'url
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
    public function storeProduct(ProductSchema $request) {

        if ($request->hasFile('foto')) {
            $image = $request->file('foto');
            $imgName = $image->getClientOriginalName();
        } 
        else  $imgName = NULL;

        $product = new Prodotto;
        $product->fill($request->validated());  //valorizza le proprietà dell'oggetto product con ciò che era nel request object (dal form)
        $product->foto = $imgName;
        $product->save();   //genera query nel dbms

        if (!is_null($imgName)) {
            //costruire path con /img/mainCat/subCat

            $destinationPath = public_path() . '/img/' . $product->getMainCat() . '/' . $product->getSubCat();
            $image->move($destinationPath, $imgName);
        };

        return redirect()->action('AdminController@index');
    }
    
    public function aggiungiStaff(){
        return view('form.inserisciStaff');
    }

}
