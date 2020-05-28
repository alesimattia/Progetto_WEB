@extends('layouts.admin')

@section('title', 'Area Admin')

@section('main')

<div class="col-12">
    <div class="login_form_inner register_form_inner" id="edit_form">
                    <h3>Crea account Staff</h3>
                    {{ Form::open(array('route' => 'register', 'class' => 'row login_form', 'id'=>'register_form')) }}
                    @csrf
                        <fielset class="registra-box-campi">
                            <div class="col-md-12 form-group">
                                {{ Form::text('nome', '', ['class' => 'form-control', 'id' => 'nome','placeholder'=>'Nome']) }}
                                @if($errors->first('nome'))
                                <ul class="error">
                                    @foreach($errors->get('nome') as $message)
                                    <li>{{ $message }}</li>
                                    @endforeach
                                </ul>
                                @endif
                            </div>
                            <div class="col-md-12 form-group">
                                {{ Form::text('cognome', '', ['class' => 'form-control', 'id' => 'cognome','placeholder'=>'Cognome']) }}
                                @if($errors->first('cognome'))
                                <ul class="error">
                                    @foreach($errors->get('cognome') as $message)
                                    <li>{{ $message }}</li>
                                    @endforeach
                                </ul>
                                @endif
                            </div>
                            <div class="col-md-12 form-group">
                                {{ Form::text('residenza', '', ['class' => 'form-control', 'id' => 'Luogo_residenza','placeholder'=>'Luogo di residenza']) }}
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
                                {{ Form::text('username', '', ['class' => 'form-control','id' => 'username','placeholder'=>'Username'] )}}                       <!--in caso di errori ripropone-->
                                    @if($errors->first('username'))
                                    <ul class="error">
                                        @foreach($errors->get('username') as $message)
                                        <li>{{ $message }}</li>
                                        @endforeach
                                    </ul>
                                    @endif
                            </div>
                            <div class="col-md-12 form-group">
                                {{ Form::password('password', ['class' => 'form-control','id' => 'password','placeholder'=>'Password'] )}}                       <!--in caso di errori ripropone-->
                                    @if($errors->first('password'))
                                    <ul class="error">
                                        @foreach($errors->get('password') as $message)
                                        <li>{{ $message }}</li>
                                        @endforeach
                                    </ul>
                                    @endif

                            </div>
                            <div  class="col-md-12 form-group">
                                {{ Form::password('password_confirmation', ['class' => 'form-control', 'id' => 'password-confirm','placeholder'=>'Conferma password']) }}
                            </div>
                        </fieldset>

                        <div class="col-md-12 form-group">
                            {{ Form::submit('CREA', ['class' => 'submit button-register w-100 ' ,'style'=>'color:white']) }}
                        </div>

                    {{ Form::close() }}
                </div>
            </div>
@endsection
