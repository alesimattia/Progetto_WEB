@extends('layouts.admin')

@section('title', 'Utenti')

@section('main')

<div class="section-intro">
    <h2><span class="section-intro__style">Lista degli utenti registrati</span></h2>
    <h4 style="margin-top: 1em;">Fai click su un profilo per modificarlo</h4>
</div>

<div class="container cart_inner table-responsive">
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Username</th>
                <th scope="col">Ruolo</th>
                <th scope="col">Nome</th>
                <th scope="col">Cognome</th>
                <th scope="col">Data Nascita</th>
                <th scope="col">Residenza</th>
                <th scope="col">Occupazione</th>
                <th scope="col">Seleziona</th>
            </tr>
        </thead>
        
        @isset ($utenti)
        <tbody>
            {{ Form::open(array('route' => 'eliminaProfilo', 'id' => 'eliminaProfilo', 'class' => 'row login_form')) }}
            @csrf
            
            @foreach ($utenti as $utente)
            <tr>
                <td>
                    <div class="alert-info">
                        @if($utente->ruolo =='staff')
                            <a href="{{ route('modificaStaff/{username}', [$utente->username]) }}">
                        @endif
                            {{ $utente->username }}
                        @if($utente->ruolo =='user')
                            </a>
                        @endif
                    </div>
                </td>
                <td>
                    {{ $utente->ruolo }}
                </td>
                <td>
                    {{ $utente->nome }}
                </td>
                <td>
                    {{ $utente->cognome }}
                </td>
                <td>
                    {{ $utente->dataNascita }}
                </td>
                <td>
                    {{ $utente->residenza }}
                </td>
                <td>
                    {{ $utente->occupazione }}
                </td>
                <td>
                    {{ Form::checkbox('selezionati[]', $utente->username) }}
                </td>  
            </tr>
            @endforeach
        </tbody>
        @endisset
    </table>

    <div class="controls">
        <a class="button button--active mt-3 mt-xl-4" href="{{ route('addStaff') }}">Aggiungi Staff</a>
        {{ Form::submit('Elimina', ['class' => 'cupon_text button-register ']) }}
    </div>
</div>
@endsection
