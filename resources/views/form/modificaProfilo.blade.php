@extends('layouts.user')

@section('title', 'Profilo')

<!-- Questa vista è parametrizzata in modo da adattarsi al tipo di utente da modificare -->

@section('scripts')
    @parent
    <script src="{{ asset('js/functions.js') }}" ></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
    $(function () {

        /** Recupero il form senza conoscerne l'id, dato che l'azione varia 
            in funzione dell'utente da modificare (e quindi del controller che ha chiamato la vista) */
        var actionUrl = $('form').eq(1).attr('action');
        var formId = $('form').eq(1).attr('id');   

        $(":input").on('keyup', function (event) {
            var formElementId = $(this).attr('id'); 
            validaCampo(formElementId, actionUrl, formId);
        });

        $("#"+formId).on('submit', function (event) {
            event.preventDefault();  
            validaForm(actionUrl, formId);    //gestisce il processo di submit 
        });
    });
    </script>
@endsection


@section('main')

<div class="col-12">
    <div class="login_form_inner register_form_inner" id="edit_form">
        <h3>Modifica informazioni profilo</h3>

        @if($utente->ruolo == 'user')
            {{ Form::open(['route' => 'editProfilo.store', 'class' => 'row login_form', 'id'=>'modificaProfilo']) }}
        @else
            {{ Form::open(['route' => 'modificaStaff.store', 'class' => 'row login_form', 'id'=>'modificaStaff']) }}
        @endif

        @csrf
            <fieldset class="registra-box-campi">
                <div class="col-md-12 form-group">

                    @if($utente->ruolo == 'staff')
                        {{ Form::text('username', $utente->username, ['class' => 'form-control', 'id' => 'username','placeholder'=>'Username']) }}
                        <!--per richiesta ajax di validazione (solo)username --> 
                        {{ Form::hidden('rottaValidaUsername', route('getAllUsers') ) }}
                        <!--per ritrovare la tupla in fase di *update Staff*, se si modifica lo username-->
                        {{ Form::hidden('oldUsername', $utente->username) }}
                    @endif

                    {{ Form::password('password', ['class' => 'form-control', 'id' => 'password','placeholder'=>'Password']) }}
                    {{ Form::password('password_confirmation', ['class' => 'form-control', 'id' => 'password-confirm','placeholder'=>'Conferma password']) }}

                    {{ Form::text('nome', $utente->nome, ['class' => 'form-control', 'id' => 'nome','placeholder'=>'Nome']) }}

                    {{ Form::text('cognome', $utente->cognome, ['class' => 'form-control', 'id' => 'cognome','placeholder'=>'Cognome']) }}
                    
                    @if($utente->ruolo =='user')
                        {{ Form::text('residenza', $utente->residenza, ['class' => 'form-control', 'id' => 'residenza','placeholder'=>'Luogo di residenza']) }}
                
                        {{ Form::date('dataNascita', $utente->dataNascita, ['class' => 'form-control', 'id' => 'dataNascita']) }}

                        {{ Form::label('occupazione', 'Scegli occupazione', ['class' => 'lista-opzioni']) }}
                        {{ Form::select('occupazione', $lista_occupaz , $utente->occupazione, ['class' => 'select_box','id' => 'occupazione']) }}
                    @endif
                </div>
            </fieldset>

            <div class="col-md-12 form-group">
                {{ Form::submit('MODIFICA', ['class' => 'submit button-register w-100 ']) }}
            </div>

        {{ Form::close() }}        
    </div>
</div>
@endsection
