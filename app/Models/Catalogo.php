<?php

namespace App\Models;

use App\Models\Resources\Categoria;
use App\Models\Resources\Sottocategoria;
use App\Models\Resources\Prodotto;

class Catalogo {
    
    /**popola la option-list con le (sotto)categorie assegnabili ad un nuovo prodotto
     * non applicate ad un particolare oggetto di questa classe */
    public static function getAllMainCat() {
        return Categoria::get();
    }
    public static function getAllSubCat(){
        return Sottocategoria::get();
    }


    public static function getParentCat($subCatId){
        return Sottocategoria::join('categoria', 'sottocategoria.mainCat', '=', 'categoria.id')
                ->where('sottocategoria.id','=', $subCatId)
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


    public function getProdsByCat($category, $paged = 1, $order = null, $search = null) {

        if(!is_null($search)){
            $string = (string) '%'.$search.'%';
            
            return Prodotto::join('sottocategoria', 'sottocategoria.id', '=', 'prodotto.subCat')
                        ->join('categoria', 'categoria.id', '=', 'sottocategoria.mainCat')
                        ->where('nome', 'LIKE', $string)
                        ->orWhere('descBreve', 'LIKE', $string)
                        ->orWhere('descEstesa', 'LIKE', $string)
                        ->paginate($paged);
        }

        $prods = Prodotto::join('sottocategoria', 'sottocategoria.id', '=', 'prodotto.subCat')
                    ->join('categoria', 'categoria.id', '=', 'sottocategoria.mainCat')
                    ->whereIn('nomeSubCat', $category)
                    ->orWhereIn('nomeCat', $category);

        if (!is_null($order))
            $prods = $prods->orderBy('percSconto', $order);

        return $prods->paginate($paged);
    }

}
