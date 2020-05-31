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

    public static function whatSubCat($mainCat) {
        return Sottocategoria::join('categoria', 'sottocategoria.mainCat', '=', 'categoria.id')
                ->where('nomeCat','=', $mainCat)
                ->get('nomeSubCat');
    }
    
    public static function getParentCat($subCat){
        return Sottocategoria::join('categoria', 'sottocategoria.mainCat', '=', 'categoria.id')
                ->where('nomeSubCat','=', $subCat)
                ->get('nomeCat');
                //->only(['nomeCat'])->all();
    }


    public function getProdsByCat($category, $paged = 1, $order = null, $only_discounted = false) {

        $prods = Prodotto::join('sottocategoria', 'sottocategoria.id', '=', 'prodotto.subCat')
                ->join('categoria', 'categoria.id', '=', 'sottocategoria.mainCat')
                ->whereIn('nomeSubCat', $category)
                ->orWhereIn('nomeCat', $category);

        if ($only_discounted) {
            $prods = $prods->where('percSconto', '>', 0);
        }
        if (!is_null($order)) {
            $prods = $prods->orderBy('percSconto', $order);
        }
        return $prods->paginate($paged);
    }

}
