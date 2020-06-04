<?php

namespace App\Models;

use App\Models\Resources\Categoria;
use App\Models\Resources\Sottocategoria;
use App\Models\Resources\Prodotto;

class Catalogo {
    
    //serve per la option-list con le (sotto)categorie assegnabili ad un nuovo prodotto
    public static function getAllMainCat() {
        return Categoria::get();
    }
    public static function getAllSubCat(){
        return Sottocategoria::get();
    }

    //Non usata -- Dato il NOME restituisce la sottocategoria
    /*public static function whatSubCat($mainCat) {
        return Sottocategoria::join('categoria', 'sottocategoria.mainCat', '=', 'categoria.id')
                ->where('nomeCat','=', $mainCat)
                ->get()
                ->pluck('nomeSubCat')
                ->first();
    }*/
    
    public static function getParentCat($subCatId){
        return Sottocategoria::join('categoria', 'sottocategoria.mainCat', '=', 'categoria.id')
                ->where('mainCat','=', $subCatId)
                ->get()
                ->pluck('nomeCat')
                ->first();
    }

    public static function subCatToName($subCatId){
        return Sottocategoria::where('id','=', $subCatId)
                    ->get()
                    ->pluck('nomeSubCat')
                    ->first();
    }


    public function getProdsByCat($category, $paged = 1, $order = null) {

        if(is_null($category)){  //estrae i prodotti da tutte le categorie se non si è selezionata una
            $prods = Prodotto::join('sottocategoria', 'sottocategoria.id', '=', 'prodotto.subCat')
                             ->join('categoria', 'categoria.id', '=', 'sottocategoria.mainCat');
        }
        else{
            $prods = Prodotto::join('sottocategoria', 'sottocategoria.id', '=', 'prodotto.subCat')
                    ->join('categoria', 'categoria.id', '=', 'sottocategoria.mainCat')
                    ->whereIn('nomeSubCat', $category)
                    ->orWhereIn('nomeCat', $category);
        }

        if (!is_null($order)){
            $prods = $prods->orderBy('percSconto', $order);
        }

        return $prods->paginate($paged);
    }

}
