<?php

namespace App\Models\Resources;

use Illuminate\Database\Eloquent\Model;

class Prodotto extends Model {

    protected $table = 'prodotto';
    protected $primaryKey = 'id';
    public $timestamps = false;     //disattiva l'aggiornamento del timestamp quando si modifica un dato
    protected $guarded = ['id'];    //disattiva la possibilità di scrittura dell'attributo nel db (da form)


    public function getPrezzo() {
        $prezzo = $this->prezzo;     //estrae l'attributo dall'oggetto che invoca il metodo
        if ($this->percSconto!='' && $this->percSconto>0) {     //se lo sconto è stato tolto il valore è 0 (se non presente è Null)
            $sconto = ($prezzo * $this->percSconto) / 100;
            $prezzo = round($prezzo - $sconto, 2);      //2 cifre dec.
        }
        return $prezzo;
    }

    public function getSubCat(){
        return Sottocategoria::join('sottocategoria', 'sottocategoria.id', '=', 'prodotto.subCat')
                        ->where('prodotto.id','=', $this->id)
                        ->get('sottocategoria.nomeSubCat');
    }

    public function getMainCat(){
        return Categoria::join('sottocategoria', 'sottocategoria.id', '=', 'categoria.id')
                    ->join('prodotto', 'sottocategoria.id', '=', 'prodotto.subCat')
                    ->where('prodotto.nome','=', $this->nome)
                    ->get('categoria.nomeCat');
}

    // Realazione One-To-One con Categoria
    //Serve perchè dobbiamo recuperare prodotti sia se appartengono ad una macro-categoria, sia sotto-cat
    public function prodCat() {
        return $this->hasOne(Sottocategoria::class, 'id', 'id');
    }
    
}