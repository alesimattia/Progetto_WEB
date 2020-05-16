<?php

namespace App\Models\Resources;

use Illuminate\Database\Eloquent\Model;

class Prodotto extends Model {

    protected $table = 'prodotto';
    protected $primaryKey = 'id';
    public $timestamps = false;

    // prodId non modificabile da un HTTP Request (Mass Assignment)
    protected $guarded = ['id'];


    public function getPrice($scontato = false) {
        $prezzo = $this->prezo;     //estrae l'attributo prezzo
        if (true == ($this->percSconto) && true == $scontato) {
            $sconto = ($prezzo * $this->percSconto) / 100;
            $prezzo = round($prezzo - $sconto, 2);      //arrotondamento 2 cifre dec.
        }
        return $prezzo;
    }

    public function getCat(){
        return SottocategoriaDB::where('id','=', $this->subCat)->get('nomeSubCat');
    }

    // Realazione One-To-One con Categoria
    // Selezionato un prodotto, recupera tutti gli attributi della categoria a cui appartiene.
    //Serve perchè dobbiamo recuperare prodotti sia se appartengono ad una macro-categoria, sia sotto-cat
    public function prodCat() {
        return $this->hasOne(Categoria::class, 'id', 'id');
    }
    
}
