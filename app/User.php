<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable {

    use Notifiable;

    protected $table = 'utente';
    protected $primaryKey = 'username';
    public $incrementing = false;
    public $timestamps = false;

    protected $guarded = [];
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'password', 'nome', 'cognome', 'residenza', 'dataNascita', 'occupazione', 'ruolo'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
    ];

    public function hasRole($ruolo) { //usato in app/providers/AuthServiceProvider
        $ruolo = (array)$ruolo;
        return in_array($this->ruolo, $ruolo);
    }

    public static function occupazione(){
        return array("studente"=>"studente","operaio"=>"operaio","impiegato"=>"impiegato","disoccupato"=>"disoccupato");
    }

}
