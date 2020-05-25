@extends('layouts.public')

@section('title', 'Registrazione')

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
                        <fielset class="registra-box-campi">
                            <div class="col-md-12 form-group">
                                {{ Form::text('nome', '', ['class' => 'form-control', 'id' => 'name','placeholder'=>'Nome', 'onfocus'=>"this.placeholder=''",'onblur'=>"this.placeholder='Nome'"]) }}
                                @if($errors->first('name'))
                                <ul class="error">
                                    @foreach($errors->get('name') as $message)
                                    <li>{{ $message }}</li>
                                    @endforeach
                                </ul>
                                @endif
                            </div>
                            <div class="col-md-12 form-group">
                                {{ Form::text('cognome', '', ['class' => 'form-control', 'id' => 'Cognome','placeholder'=>'Cognome', 'onfocus'=>"this.placeholder=''",'onblur'=>"this.placeholder='Cognome'"]) }}
                                @if($errors->first('cognome'))
                                <ul class="error">
                                    @foreach($errors->get('cognome') as $message)
                                    <li>{{ $message }}</li>
                                    @endforeach
                                </ul>
                                @endif
                            </div>
                            <div class="col-md-12 form-group">
                                {{ Form::text('residenza', '', ['class' => 'form-control', 'id' => 'Luogo_residenza','placeholder'=>'Luogo di residenza', 'onfocus'=>"this.placeholder=''",'onblur'=>"this.placeholder='Luogo di residenza'"]) }}
                            </div>
                            <div class="col-md-12 form-group">
                                {{ Form::date('dataNascita', '', ['class' => 'form-control', 'id' => 'Data_di_nascita']) }}

                            </div>
                            <div class="col-md-12 form-group" >
                                {{ Form::label('occupazione', 'Scegli occupazione', ['class' => 'lista-opzioni']) }}
                                {{ Form::select('occupazione', array("studente","operaio","impiegato","disoccupato") , '', ['class' => '','id' => 'occupation']) }}
                            </div>
                        </fielset>

                        <fieldset class="registra-box-campi">
                            <legend>Dati di accesso</legend>
                            <div class="col-md-12 form-group">
                                {{ Form::text('username', '', ['class' => 'form-control','id' => 'username','placeholder'=>'Username', 'onfocus'=>"this.placeholder=''",'onblur'=>"this.placeholder='Username'"] )}}                       <!--in caso di errori ripropone-->
                                    @if($errors->first('username'))
                                    <ul class="error">
                                        @foreach($errors->get('username') as $message)
                                        <li>{{ $message }}</li>
                                        @endforeach
                                    </ul>
                                    @endif
                            </div>
                            <div class="col-md-12 form-group">
                                {{ Form::password('password', ['class' => 'form-control','id' => 'password','placeholder'=>'Password', 'onfocus'=>"this.placeholder=''",'onblur'=>"this.placeholder='Password'"] )}}                       <!--in caso di errori ripropone-->
                                    @if($errors->first('password'))
                                    <ul class="error">
                                        @foreach($errors->get('password') as $message)
                                        <li>{{ $message }}</li>
                                        @endforeach
                                    </ul>
                                    @endif

                            </div>
                            <div  class="col-md-12 form-group">
                                {{ Form::password('password_confirmation', ['class' => 'form-control', 'id' => 'password-confirm','placeholder'=>'Conferma password', 'onfocus'=>"this.placeholder=''",'onblur'=>"this.placeholder='Conferma password'"]) }}
                            </div>
                        </fieldset>

                        <div class="col-md-12 form-group">
                            {{ Form::submit('REGISTRATI', ['class' => 'submit button-register w-100 ' ,'style'=>'color:white']) }}
                        </div>

                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
