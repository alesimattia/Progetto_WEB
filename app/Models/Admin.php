<?php

namespace App\Models;

use App\Models\Resources\Sottocategoria;
use App\Models\Resources\Prodotto;

class Admin {

    //serve per la option-list con le (sotto)categorie assegnabili ad un nuovo prodotto
    public function getAllSubCat() {       
        return Sottocategoria::get();
    }

    public function getAllMainCat() {
        return Categoria::get();
    }
}
