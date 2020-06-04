@extends('layouts.staff')

@section('title', 'Area Staff')

@section('main')
<div class="col-12">
    <h3>Elimina prodotto</h3>
    <p>Seleziona il prodotto da eliminare</p>

    <div>
        {{ Form::open(array('route' => 'eliminaProdotto.store', 'id' => 'eliminaProdotto', 'class' => 'row login_form')) }}
        <table>            
            <tr><th>Id</th><th>Nome</th><th>Sotto Categoria</th><th>Prezzo</th><th>Percentuale Sconto</th><th>Descrizione Breve</th></tr>
            @foreach ($prodotto as $pippo)
                <tr><td>{{ Form::radio('id', $pippo->id , ['class' => 'form-control','id' => 'id'])  }}</td>
                    <td>{{$pippo->nome}}</td>
                    <td>{{$pippo->subCat}}</td>
                    <td>{{$pippo->prezzo}}</td>
                    <td>{{$pippo->percSconto}}</td>
                    <td>{{$pippo->descBreve}}</td>
                </tr>
            @endforeach 
        </table>
        {{ Form::submit('ELIMINA', ['class' => 'submit button-register w-100 ' ,'style'=>'color:white']) }}
        {{ Form::close() }}
    </div>

</div>
@endsection