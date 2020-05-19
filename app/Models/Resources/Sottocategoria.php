<?php

namespace App\Models\Resources;

use Illuminate\Database\Eloquent\Model;

class Sottocategoria extends Model {

    protected $table = 'sottocategoria';
    protected $primaryKey = 'id';
    public $timestamps = false;     //disattiva l'aggiornamento del timestamp quando si modifica un dato
}