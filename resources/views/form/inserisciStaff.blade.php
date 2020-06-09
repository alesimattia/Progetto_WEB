@extends('layouts.admin')

@section('title', 'Aggiungi Staff')

@section('scripts')
    @parent
    <script src="{{ asset('js/functions.js') }}" ></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

    <script>
    $(function () {

        var actionUrl = "{{ route('addStaff.store') }}";
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
    <div class="login_form_inner register_form_inner" id="edit_form">
            @isset($confirm)
                <h4 class="messaggio" > {{ $confirm }}</h4>
            @endisset

            <h3>Crea account Staff</h3>
            
            {{ Form::open(['route' => 'addStaff.store', 'class' => 'row login_form', 'id'=>'inserisciStaff']) }}
                <fieldset class="registra-box-campi">
                    <div class="col-md-12 form-group">

                        {{ Form::text('nome', '', ['class' => 'form-control', 'id' => 'nome','placeholder'=>'Nome']) }}
                       
                        {{ Form::text('cognome', '', ['class' => 'form-control', 'id' => 'cognome','placeholder'=>'Cognome']) }}
                       
                        <legend>Dati di accesso</legend>
                    
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
