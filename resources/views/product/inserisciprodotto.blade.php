@extends('layouts.staff')

@section('title', 'Aggiungi Prodotto')

@section('scripts')
    @parent
    <script src="{{ asset('js/functions.js') }}" ></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

    <script>
    $(function () {

        var actionUrl = "{{ route('nuovoProdotto.store') }}";
        var formId = $('form.login_form').attr('id');   
        
        $(":input").on('blur', function (event) {
            var formElementId = $(this).attr('id');     //memorizza l'id dell'elemento di cui si è perso il focus
            validaCampo(formElementId, actionUrl, formId);
        });

        $("#"+formId).on('submit', function (event) {
            event.preventDefault();     //interrompe il processo predefinito di submit
            validaForm(actionUrl, formId);    //gestisce il processo di submit 
        });
    });
    </script>
@endsection


@section('main')

<div class="col-12">
    <div class="login_form_inner register_form_inner add_prodotto">

    @isset($conferma)
        <h4 style="color:#c54040 " > {{ $conferma }}</h4>
    @endisset

        <h3>Aggiungi Prodotto</h3>
        <p>Inserisci un nuovo elemento nel catalogo</p>

        <fieldset class="registra-box-campi">
            {{ Form::open(['route' => 'nuovoProdotto.store', 'id' => 'addproduct', 'files' => true, 'class' => 'row login_form' ] ) }}

            <div class="col-md-12 form-group">
                {{ Form::text('nome', '', ['class' => 'form-control','id' => 'nome','placeholder'=>'Nome prodotto'])  }}

                {{ Form::label('subCat', 'Sottocategoria', ['class' => 'lista-opzioni']) }}
                {{ Form::select('subCat', $subCats, '', ['class' => 'select','id' => 'subCat']) }}

                {{ Form::label('foto', 'Immagine', ['class' => 'label-input']) }}

                {{ Form::file('foto', ['class' => 'form-control', 'id' => 'image']) }}

                {{ Form::text('descBreve', '', ['class' => 'form-control','id' => 'descBreve','placeholder'=>'Descrizione breve'])  }}

                {{ Form::text('prezzo', '', ['class' => 'form-control','id' => 'prezzo','placeholder'=>'Prezzo'])  }}

                {{ Form::text('percSconto', '', ['class' => 'form-control','id' => 'percSconto','placeholder'=>'Sconto (%)'])  }}

                {{ Form::label('descEstesa', 'Descrizione Estesa', ['class' => 'label-input']) }}
                {{ Form::textarea('descEstesa', '', ['class' => 'input', 'id' => 'descLong', 'rows' => 2]) }}

                {{ Form::submit('Aggiungi Prodotto', ['class' => 'submit button-register w-100 ' ,'style'=>'color:white']) }}
            </div>

            {{ Form::close() }}
        </fieldset>
    </div>
</div>
@endsection
