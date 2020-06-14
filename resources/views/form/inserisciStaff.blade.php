@extends('layouts.admin')

@section('title', 'Aggiungi Staff')

@section('scripts')
    @parent
    <script src="{{ asset('js/functions.js') }}" ></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
    $(function () {

        var actionUrl = $('form').eq(1).attr('action')  /** eq(0) è sempre il primo form con il bottone di logout */
        var formId = $('form').eq(1).attr('id');   

        $(":input").on('keyup', function (event) {
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
    <div class="login_form_inner register_form_inner" id="edit_form">

            <h3>Crea account Staff</h3>
            
            {{ Form::open(['route' => 'addStaff.store', 'class' => 'row login_form', 'id'=>'inserisciStaff']) }}

            <!--per richiesta ajax di validazione (solo)username --> 
            <meta id="rottaValidaUsername" value="{{ route('getAllUsers') }}" />

            <fieldset class="registra-box-campi">
                <div class="col-md-12 form-group">
                        {{ Form::text('nome', '', ['class' => 'form-control', 'id' => 'nome','placeholder'=>'Nome']) }}
                       
                        {{ Form::text('cognome', '', ['class' => 'form-control', 'id' => 'cognome','placeholder'=>'Cognome']) }}
                    
                        {{ Form::text('username', '', ['class' => 'form-control','id' => 'username','placeholder'=>'Username'] )}}                       <!--in caso di errori ripropone-->
                           
                        {{ Form::password('password', ['class' => 'form-control','id' => 'password','placeholder'=>'Password'] )}}                       <!--in caso di errori ripropone-->
                        
                        {{ Form::password('password_confirmation', ['class' => 'form-control', 'id' => 'password-confirm','placeholder'=>'Conferma password']) }}
                        
                        {{ Form::submit('CREA', ['class' => 'submit button-register w-100 ' ,'style'=>'color:white']) }}
                </div>
            </fieldset>
            {{ Form::close() }}
            
    </div>
</div>
@endsection
