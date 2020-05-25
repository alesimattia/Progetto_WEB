<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable {

    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'password', 'nome', 'cognonme', 'residenza', 'dataNascita', 'occupazione', 'ruolo'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'username', 'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    /*protected $casts = [
        'email_verified_at' => 'datetime',
    ];*/

    public function hasRole($ruolo) { //usato in app/providers/AuthServiceProvider
        $ruolo = (array)$ruolo;
        return in_array($this->ruolo, $ruolo);
    }
    public function ruoli(){
        return array("user","staff");
    }
    public function occupazione(){
        return array("studente","operaio","impiegato","disoccupato");
    ];
    }
}
