@extends('layouts.admin')

@section('title', 'Area Admin')

@section('main')
<div class="col-12">
    <h3>Elimina staff</h3>
    <p>Seleziona l'utente staff da eliminare</p>

    <div>
        {{ Form::open(array('route' => 'eliminaStaff.store', 'id' => 'eliminaStaff', 'class' => 'row login_form')) }}
        <table>            
            <tr><th></th><th>Username</th><th>Nome</th><th>Cognome</th></tr>
            @foreach ($staff as $pippo)
                <tr><td>{{ Form::radio('username', $pippo->username , ['class' => 'form-control','id' => 'username'])  }}</td>
                    <td>{{$pippo->username}}</td>
                    <td>{{$pippo->nome}}</td>
                    <td>{{$pippo->cognome}}</td>
                </tr>
            @endforeach 
        </table>
        {{ Form::submit('ELIMINA', ['class' => 'submit button-register w-100 ' ,'style'=>'color:white']) }}
        {{ Form::close() }}
    </div>

</div>
@endsection

