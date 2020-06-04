@extends('layouts.staff')

@section('title', 'Area Staff')

@section('main')
<div class="col-12">
    <div class="login_form_inner register_form_inner">
    <h3>Modifica prodotto</h3>
    <p>Utilizza questa form per modificare un prodotto nel Catalogo</p>

    <div>
        {{ Form::open(array('route' => 'prodottoSelezionato', 'id' => 'selezionaProdotto', 'class' => 'row login_form')) }}
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
        {{ Form::submit('MODIFICA', ['class' => 'submit button-register w-100 ' ,'style'=>'color:white']) }}
        {{ Form::close() }}
    </div>
    </div>
</div>
@endsection

