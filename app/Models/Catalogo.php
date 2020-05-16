<?php

namespace App\Models;

use App\Models\Resources\Categoria;
use App\Models\Resources\Prodotto;

class Catalogo {

    public function getMainCat() {
        return Categoria::get();
    }

    public function getParentCat($subCat){
        return Sottocategoria::join('categoria', 'categoria.id', '=', 'sottocategoria.mainCat')
                ->where('sottocategoria.nome', '=', $subCat)
                ->get('nomeCat');
                //->only(['nomeCat'])->all();
    }

    public function getSubCat($mainCat) {
        return Sottocateogoria::join('categoria', 'sottocategoria.mainCat', '=', 'categoria.id')-> whereIn('mainCat', $mainCat)->get();
    }

    
    //Estrae tutti o solo quelli in sconto, eventualmente ordinati
    public function getProdsByCat($category, $paged = 1, $order = null, $discounted = false) {
                                                                                                    
        $prods = Prodotto::join('sottocategoria', 'sottocategoria.id', '=', 'prodotto.subCat')
                ->join('categoria', 'categoria.id', '=', 'sottocategoria.mainCat')
                ->whereIn('nomeSubCat', $category)
                ->orWhereIn('nomeCat', $category);
        /** Oppure
        $prods = Prodotto::join('sottocategoria', 'sottocategoria.id', '=', 'prodotto.subCat')
                ->where('mainCat')
        */
        if ($discounted) {
            $prods = $prods->where('percSconto', '<>', '')    //ossia se è valorizzato
                           ->orWhere('percSconto', '>=', 0);    //se è stato "tolto" uno sconto
        }
        if (!is_null($order)) {
            $prods = $prods->orderBy('percSconto', $order);
        }
        return $prods->paginate($paged);
    }

}
