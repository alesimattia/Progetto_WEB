<?php

namespace App\Models\Resources;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model {

    protected $table = 'categoria';
    protected $primaryKey = 'id';
    public $timestamps = false;     //disattiva l'aggiornamento del timestamp quando si modifica un dato
}