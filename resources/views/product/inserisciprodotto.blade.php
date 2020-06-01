@extends('layouts.staff')

@section('title', 'Area Staff')

@section('scripts')

@parent
<script src="{{ asset('js/functions.js') }}" ></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script>
$(function () {
    var actionUrl = "{{ route('nuovoProdotto.store') }}";
    var formId = 'addproduct';
    $(":input").on('blur', function (event) {
        var formElementId = $(this).attr('id');
        doElemValidation(formElementId, actionUrl, formId);
    });
    $("#addproduct").on('submit', function (event) {
        event.preventDefault();
        doFormValidation(actionUrl, formId);
    });
});
</script>

@endsection

@section('main')

<div class="col-12">
    <div class="login_form_inner register_form_inner">
    <h3>Aggiungi Prodotto</h3>
    <p>Utilizza questa form per inserire un nuovo prodotto nel Catalogo</p>

    <fielset class="registra-box-campi">

            {{ Form::open(array('route' => 'nuovoProdotto.store', 'id' => 'addproduct', 'files' => true, 'class' => 'row login_form')) }}
            <div class="col-md-12 form-group">
                {{ Form::text('nome', '', ['class' => 'form-control','id' => 'nomeprodotto','placeholder'=>'Nome prodotto'])  }}

                {{ Form::label('subCat', 'Sottocategoria', ['class' => 'lista-opzioni']) }}
                {{ Form::select('subCat', $subCats, '', ['class' => 'select','id' => 'subCat']) }}

                <!--{{ Form::file('foto', ['class' => 'form-control','id' => 'fotoprodotto','placeholder'=>'Immagine'])  }}-->
                <br>
                {{ Form::label('foto', 'Immagine', ['class' => 'label-input']) }}
                <br>
                {{ Form::file('foto', ['class' => 'form-control', 'id' => 'image']) }}

                {{ Form::text('descBreve', '', ['class' => 'form-control','id' => 'descBreve','placeholder'=>'Descrizione breve'])  }}

                {{ Form::text('prezzo', '', ['class' => 'form-control','id' => 'prezzo','placeholder'=>'Prezzo'])  }}

                {{ Form::text('percSconto', '', ['class' => 'form-control','id' => 'percSconto','placeholder'=>'Sconto (%)'])  }}


                {{ Form::label('descEstesa', 'Descrizione Estesa', ['class' => 'label-input']) }}
                {{ Form::textarea('descEstesa', '', ['class' => 'input', 'id' => 'descLong', 'rows' => 2]) }}


            </div>

            <div class="col-md-12 form-group">
                {{ Form::submit('Aggiungi Prodotto', ['class' => 'submit button-register w-100 ' ,'style'=>'color:white']) }}
            </div>

            {{ Form::close() }}

    </fielset>
    </div>
</div>
@endsection
