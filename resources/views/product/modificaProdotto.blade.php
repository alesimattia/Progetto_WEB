@extends('layouts.staff')

@section('title', 'Area Staff')

@section('scripts')
    @parent
    <script src="{{ asset('js/functions.js') }}" ></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
    $(function () {

        var actionUrl = $('form').eq(1).attr('action')
        var formId = $('form').eq(1).attr('id');   

        $(":input").on('blur', function (event) {
            var formElementId = $(this).attr('id'); 
            validaCampo(formElementId, actionUrl, formId);
        });

        $("#"+formId).on('submit', function (event) {
            event.preventDefault();  
            validaForm(actionUrl, formId);
        });
    });
    </script>
@endsection


@section('main')

<div class="col-12">
    <div class="login_form_inner register_form_inner">
    <h3>Modifica Prodotto</h3>
    <p>Utilizza questa form per modificare un prodotto nel Catalogo</p>

    <fieldset class="registra-box-campi">
                
            {{ Form::open(array('route' => 'updateProdotto', 'id' => 'addproduct', 'files' => true, 'class' => 'row login_form')) }}

            <div class="col-md-12 form-group">
                {{ Form::text('nome', $prodotto->nome , ['class' => 'form-control','id' => 'nomeprodotto','placeholder'=>'Nome prodotto'])  }}
                
                {{ Form::label('subCat', 'Categoria', ['class' => 'lista-opzioni']) }}
                {{ Form::select('subCat', $subCats, '', ['class' => '','id' => 'subCat']) }}<br>
                
                {{ Form::label('foto', 'Immagine', ['class' => 'label-input']) }}<br>
                {{ Form::file('foto', ['class' => 'input', 'id' => 'image']) }}
                
                {{ Form::text('descBreve', $prodotto->descBreve, ['class' => 'form-control','id' => 'descBreve','placeholder'=>'Descrizione breve'])  }}               

                {{ Form::text('prezzo', $prodotto->prezzo, ['class' => 'form-control','id' => 'prezzo','placeholder'=>'Prezzo'])  }}              

                {{ Form::text('percSconto', $prodotto->percSconto, ['class' => 'form-control','id' => 'percSconto','placeholder'=>'Sconto (%)'])  }}
               
                {{ Form::label('descEstesa', 'Descrizione Estesa', ['class' => 'label-input']) }}
                {{ Form::textarea('descEstesa', $prodotto->descEstesa, ['class' => 'input', 'id' => 'descLong', 'rows' => 3]) }}

                {{ Form::hidden('id', $prodotto->id) }} <!--necessario alla query, per individuare il prodotto da modificare-->
             
                {{ Form::submit('Conferma modifica', ['class' => 'submit button-register w-100 ' ,'style'=>'color:white']) }}
            </div>
            
            {{ Form::close() }}
        
    </fieldset>
    </div>
</div>
@endsection


