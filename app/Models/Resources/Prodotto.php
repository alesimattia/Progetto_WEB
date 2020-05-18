<?php

namespace App\Models\Resources;

use Illuminate\Database\Eloquent\Model;

class Prodotto extends Model {

    protected $table = 'prodotto';
    protected $primaryKey = 'id';
    public $timestamps = false;

    // prodId non modificabile da un HTTP Request (Mass Assignment)
    protected $guarded = ['id'];


    public function getPrezzo() {
        $prezzo = $this->prezo;     //estrae l'attributo prezzo
        if ($this->percSconto!='' && $this->percSconto>0) {
            $sconto = ($prezzo * $this->percSconto) / 100;
            $prezzo = round($prezzo - $sconto, 2);      //arrotondamento 2 cifre dec.
        }
        return $prezzo;
    }

    public function getCat(){
        return Sottocategoria::join('sottocategoria', 'sottocategoria.id', '=', 'prodotto.subCat')
                        ->where('prodotto.nome','=', $this->nome)->get('sottocategoria.nome');
    }

    // Realazione One-To-One con Categoria
    // Selezionato un prodotto, recupera tutti gli attributi della categoria a cui appartiene.
    //Serve perchè dobbiamo recuperare prodotti sia se appartengono ad una macro-categoria, sia sotto-cat
    public function prodCat() {
        return $this->hasOne(Sottocategoria::class, 'id', 'id');
    }
    
}
