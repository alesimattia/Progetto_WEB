<?php

namespace App\Http\Controllers;


use App\Http\Requests\StaffSchema;
use App\Http\Requests\ProductSchema;

use App\User;
use App\Http\Catalogo;
use App\Models\Resources\Prodotto;

class AdminController extends Controller {


    public function __construct() {
        //$this->middleware('can:isAdmin');     //altrimenti la rotta non è raggiungibile inserendo direttamente l'url
    }

    public function index() {
        return view('adminHome');
    }


    public function addProduct() {
        $prodCats = Catalogo::getProdsCats()->pluck('name', 'catId');
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
    
/*------------------------------------------------------------------------------------------*/

    public function addStaff() {
        return view('form.inserisciStaff');
    }

                                //request object tipizzato dalla classe
    public function storeStaff(StaffSchema $request) {
        
        $user = new User;
        $user->residenza=NULL;
        $user->occupazione=NULL;
        $user->dataNascita=NULL;
        $user->ruolo='staff';
        $user->fill($request->validated());  //valorizza le proprietà dell'oggetto user con ciò che era nel request object (dal form)
        $user->save();   //genera query nel dbms

        
        $confirm="Utente Staff aggiunto correttamente";
        return view('form.inserisciStaff')
                    ->with('confirm', $confirm);
    }
    
/*------------------------------------------------------------------------------------------*/
    
    public function eliminaStaff() {
        return view('form.eliminaStaff')
                ->with('staff', User::getAll()->where('ruolo','staff'));
    }
    
    public function eliminaStaffSel() {
        $stf= User::getAll()->find($_POST["username"]);
        $stf->delete();
        
        return view('adminHome');
    }

/*------------------------------------------------------------------------------------------*/
    
    public function eliminaUtente() {
        return view('form.eliminaUtente')
                ->with('utente', User::getAll()->where('ruolo','user'));
    }
    
    public function eliminaUtenteSel() {
        $utn= User::getAll()->find($_POST["username"]);
        $utn->delete();
        
        return view('adminHome');
    }
}


