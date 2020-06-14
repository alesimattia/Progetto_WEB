@extends('layouts.admin')

@section('title', 'Utenti')

@section('main')

<div class="section-intro">
    @if($ruolo == 'user')
        <h2><span class="section-intro__style">Lista degli utenti registrati</span></h2>
    @else
        <h2><span class="section-intro__style">Lista dello Staff</span></h2>
    @endif
    <h4 style="margin-top: 1em;">Puoi cancellare più di un profilo alla volta</h4>
</div>

<div class="container cart_inner table-responsive">
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Username</th>
                <th scope="col">Nome</th>
                <th scope="col">Cognome</th>
                @if($ruolo == 'user')
                <th scope="col">Data Nascita</th>
                <th scope="col">Residenza</th>
                <th scope="col">Occupazione</th>
                @else
                <th>Modifica</th>
                @endif
                <th scope="col">Seleziona</th>
            </tr>
        </thead>

        @isset ($utenti)
        <tbody>
            {{ Form::open(array('route' => array('eliminaProfilo/{ruolo}' , $ruolo), 'id' => 'eliminaProfilo', 'class' => 'row login_form')) }}
            @csrf

            @foreach ($utenti as $utente)
            <tr>
                <td>
                    <div class="alert-info">
                        {{ $utente->username }}
                    </div>
                </td>
                <td>
                    {{ $utente->nome }}
                </td>
                <td>
                    {{ $utente->cognome }}
                </td>
                @if($utente->ruolo =='user')
                <td>
                    {{ $utente->dataNascita }}
                </td>
                <td>
                    {{ $utente->residenza }}
                </td>
                <td>
                    {{ $utente->occupazione }}
                </td>
                @else
                <td>
                    <a href="{{ route('modificaStaff/{username}', [$utente->username]) }}">
                        <img src="{{ asset('/img/icon/pencil.png') }}" class="icona_paginator">
                    </a>    
                </td>
                @endif
                <td>
                    {{ Form::checkbox('selezionati[]', $utente->username) }}
                </td>  
            </tr>
            @endforeach
        </tbody>
        @endisset
    </table>

    <div class="controls">
        @if($ruolo == 'staff')
        <a class="button button--active mt-3 mt-xl-4" href="{{ route('addStaff') }}">Aggiungi Staff</a>   
        @endif
        {{ Form::submit('Elimina', ['class' => 'cupon_text button-register ']) }}
    </div>
</div>
@endsection
