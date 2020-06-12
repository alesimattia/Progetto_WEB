@extends('layouts.staff')

@section('title', 'Aggiungi categoria')

@section('scripts')
    @parent
    <script src="{{ asset('js/functions.js') }}" ></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
    $(function () {

        /** ------------------ form aggiungi CATEGORIA ------------------------*/
        var actionUrl_1 = $('form').eq(1).attr('action');
        var formId_1 = $('form').eq(1).attr('id'); 
        
        $(":input").on('blur', function (event) {
            var formElementId = $(this).attr('id');     //memorizza l'id dell'elemento di cui si è perso il focus
            validaCampo(formElementId, actionUrl_1, formId_1);
        });

        $("#"+formId_1).on('submit', function (event) {
            event.preventDefault();     //interrompe il processo predefinito di submit
            validaForm(actionUrl_1, formId_1);    //gestisce il processo di submit 
        });

        /** ---------------- form aggiungi SOTTO-CATEGORIA ----------------------*/
        var actionUrl_2 = $('form').eq(2).attr('action');
        var formId_2 = $('form').eq(2).attr('id');

        $(":input").on('blur', function (event) {
            var formElementId = $(this).attr('id');  
            validaCampo(formElementId, actionUrl_2, formId_2);
        });

        $("#"+formId_2).on('submit', function (event) {
            event.preventDefault();     
            validaForm(actionUrl_2, formId_2);    
        });
    });
    </script>
@endsection


@section('main')

<h2 class="mb-5"><span class="section-intro__style">Aggiungi&nbsp; Categoria / Sottocategoria </span></h2>  

@isset($confirm)
    <h4 class="messaggio" > {{ $confirm }}</h4>
@endisset

<div class="container">
    <div class="row container">
        
        <div class="col-lg-6">
            <div class="login_form_inner register_form_inner add_prodotto">   
                
                <h4>Nuova categoria per i prodotti</h4>
                    <fieldset class="registra-box-campi">
                        {{ Form::open(array('route' => 'aggiungiCategoria.store', 'id' => 'addcat', 'class' => 'row login_form')) }}
                        @csrf
                        <div class="col-md-12 form-group mt-5">
                            {{ Form::text('nomeCat', '', ['class' => 'form-control','id' => 'nomeCat','placeholder'=>'Nome'])  }}
                            
                            {{ Form::submit('Aggiungi Categoria', ['class' => 'submit button-register w-100 ' ,'style'=>'color:white']) }}
                        </div>

                        {{ Form::close() }}
                    </fieldset> 
            </div>
        </div>
    <!------------------------------------------------------------------------------------------------------------------>
        <div class="col-lg-6">
            <div class="login_form_inner register_form_inner add_prodotto">

                <h4>Nuova sottocategoria per i prodotti</h4>    

                    <fieldset class="registra-box-campi">
                        {{ Form::open(array('route' => 'aggiungiSub.store', 'id' => 'addsubcat', 'class' => 'row login_form')) }}
                        @csrf
                        <div class="col-md-12 form-group">
                            {{ Form::text('nomeSubCat', '', ['class' => 'form-control','id' => 'nomeSubCat','placeholder'=>'Nome'])  }}
                            
                            {{ Form::label('mainCat', 'Categoria', ['class' => 'lista-opzioni']) }}
                            {{ Form::select('mainCat' , $cats, '', ['class' => 'select','id' => 'mainCat']) }}
        
                            {{ Form::submit('Aggiungi Sottocategoria', ['class' => 'submit button-register w-100 ' ,'style'=>'color:white']) }}
                        </div>

                        {{ Form::close() }}
                    </fieldset>
            </div>
        </div>
    </div>
</div>   
@endsection
