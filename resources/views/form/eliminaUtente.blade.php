@extends('layouts.admin')

@section('title', 'Area Admin')

@section('main')
<div class="col-12">
    <h3>Elimina utente</h3>
    <p>Seleziona l'utente da eliminare</p>

    <div>
        {{ Form::open(array('route' => 'eliminaUtente.store', 'id' => 'eliminaUtente', 'class' => 'row login_form')) }}
        <table>            
            <tr><th></th><th>Username</th><th>Nome</th><th>Cognome</th><th>Residenza</th><th>DataNascita</th><th>Occupazione</th></tr>
            @foreach ($utente as $pippo)
                <tr><td>{{ Form::radio('username', $pippo->username , ['class' => 'form-control','id' => 'username'])  }}</td>
                    <td>{{$pippo->username}}</td>
                    <td>{{$pippo->nome}}</td>
                    <td>{{$pippo->cognome}}</td>
                    <td>{{$pippo->residenza}}</td>
                    <td>{{$pippo->dataNascita}}</td>
                    <td>{{$pippo->occupazione}}</td>
                </tr>
            @endforeach 
        </table>
        {{ Form::submit('ELIMINA', ['class' => 'submit button-register w-100 ' ,'style'=>'color:white']) }}
        {{ Form::close() }}
    </div>

</div>
@endsection
