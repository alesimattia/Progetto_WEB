@extends('layouts.public')

@section('title', 'Registrazione')

@section('scripts')
    @parent
    <script src="{{ asset('js/functions.js') }}" ></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(function () {
            $(":input").on('keyup', function (event) {
                validaData();
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
                                @if($errors->first('nome'))
                                <ul class="errore">
                                    @foreach($errors->get('nome') as $message)
                                    <li>{{ $message }}</li>
                                    @endforeach
                                </ul>
                                @endif
                                {{ Form::text('cognome', '', ['class' => 'form-control', 'id' => 'cognome','placeholder'=>'Cognome']) }}
                                @if($errors->first('cognome'))
                                <ul class="errore">
                                    @foreach($errors->get('cognome') as $message)
                                    <li>{{ $message }}</li>
                                    @endforeach
                                </ul>
                                @endif
                                {{ Form::text('residenza', '', ['class' => 'form-control', 'id' => 'Luogo_residenza','placeholder'=>'Luogo di residenza']) }}
                                @if($errors->first('residenza'))
                                <ul class="errore">
                                    @foreach($errors->get('residenza') as $message)
                                    <li>{{ $message }}</li>
                                    @endforeach
                                </ul>
                                @endif
                                {{ Form::date('dataNascita', '', ['class' => 'form-control', 'id' => 'dataNascita']) }}
                                @if($errors->first('dataNascita'))
                                <ul class="errore">
                                    @foreach($errors->get('dataNascita') as $message)
                                    <li>{{ $message }}</li>
                                    @endforeach
                                </ul>
                                @endif

                                {{ Form::label('occupazione', 'Scegli occupazione', ['class' => 'lista-opzioni']) }}
                                {{ Form::select('occupazione', $lista_occupaz , '', ['class' => 'select_box','id' => 'occupation']) }}

                            </fieldset>

                                <legend>Dati di accesso</legend>
                                {{ Form::text('username', '', ['class' => 'form-control','id' => 'username','placeholder'=>'Username'] )}}                       
                                    @if($errors->first('username'))
                                    <ul class="errore">
                                        @foreach($errors->get('username') as $message)
                                        <li>{{ $message }}</li>
                                        @endforeach
                                    </ul>
                                    @endif
                                {{ Form::password('password', ['class' => 'form-control','id' => 'password','placeholder'=>'Password'] )}}                       
                                {{ Form::password('password_confirmation', ['class' => 'form-control', 'id' => 'password-confirm','placeholder'=>'Conferma password']) }}
                                    @if($errors->first('password'))
                                    <ul class="errore">
                                        @foreach($errors->get('password') as $message)
                                        <li>{{ $message }}</li>
                                        @endforeach
                                    </ul>
                                    @endif
                                {{ Form::submit('REGISTRATI', ['class' => 'submit button-register w-100 ' ,'style'=>'color:white']) }}
                        </div>
                    {{ Form::close() }}
                </div>
            </div>
            
        </div>
    </div>
</section>
@endsection
