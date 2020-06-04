@extends('layouts.public')

@section('title', 'Registrazione')

@section('scripts')

@parent
<script src="{{ asset('js/functions.js') }}" ></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script>
$(function () {
    var actionUrl = "{{ route('register') }}";
    var formId = 'register_form';
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

<section class="login_box_area section-margin" >
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="login_box_img ">
                    <div class="hover">
                        <h4 style="margin-bottom: 10%;">Hai già un account?</h4>
                        <a class="button button-account" href="{{ route('login') }}">Accedi</a>
                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="login_form_inner register_form_inner">
                    <h3>Crea il tuo account</h3>
                    {{ Form::open(array('route' => 'register', 'class' => 'row login_form', 'id'=>'register_form')) }}
                    @csrf
                        <div class="col-md-12 form-group">
                            <fieldset class="registra-box-campi">
                            
                                {{ Form::text('nome', '', ['class' => 'form-control', 'id' => 'nome','placeholder'=>'Nome']) }}

                                {{ Form::text('cognome', '', ['class' => 'form-control', 'id' => 'cognome','placeholder'=>'Cognome']) }}

                                {{ Form::text('residenza', '', ['class' => 'form-control', 'id' => 'Luogo_residenza','placeholder'=>'Luogo di residenza']) }}

                                {{ Form::date('dataNascita', '', ['class' => 'form-control', 'id' => 'Data_di_nascita']) }}

                                {{ Form::label('occupazione', 'Scegli occupazione', ['class' => 'lista-opzioni']) }}

                                {{ Form::select('occupazione', $lista_occupaz , '', ['class' => 'select_box','id' => 'occupation']) }}
                            </fieldset>

                                <legend>Dati di accesso</legend>
                                {{ Form::text('username', '', ['class' => 'form-control','id' => 'username','placeholder'=>'Username'] )}}                       

                                {{ Form::password('password', ['class' => 'form-control','id' => 'password','placeholder'=>'Password'] )}}                       
                                {{ Form::password('password_confirmation', ['class' => 'form-control', 'id' => 'password-confirm','placeholder'=>'Conferma password']) }}

                                {{ Form::submit('REGISTRATI', ['class' => 'submit button-register w-100 ' ,'style'=>'color:white']) }}
                        </div>
                    {{ Form::close() }}
                </div>
            </div>
            
        </div>
    </div>
</section>
@endsection
