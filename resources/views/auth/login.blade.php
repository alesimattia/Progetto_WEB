@extends('layouts.public')

@section('title', 'Home')

@section('main')

    <!--================Login Box Area =================-->
    <section class="login_box_area section-margin">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="login_box_img">
                        <div class="hover">
                            <h4 >Nuovo cliente?</h4>
                            <a class="button button-account" href="{{ route('register') }}">Crea un account</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="login_form_inner">
                        <h3>Login</h3>
                        {{Form::open(array('route'=>'login', 'class'=>'row login_form'))}}
                            @csrf
                            <div class="col-md-12 form-group">
                                {{ Form::text('username', '', ['class' => 'form-control','id' => 'username','placeholder'=>'Username'] )}}                       <!--in caso di errori ripropone-->
                                    @if($errors->first('username'))
                                    <ul class="error">
                                        @foreach($errors->get('username') as $message)
                                        <li>{{ $message }}</li>
                                        @endforeach
                                    </ul>
                                    @endif
                                {{ Form::password('password', ['class' => 'form-control', 'id' => 'password','placeholder'=>'Password']) }}
                                    @if($errors->first('password'))
                                    <ul class="error">
                                        @foreach($errors->get('password') as $message)
                                        <li>{{ $message }}</li>
                                        @endforeach
                                    </ul>
                                    @endif
                                {{ Form::submit('ACCEDI', ['class' => 'submit button-register w-100 ' ,'style'=>'color:white']) }}
                            </div>
                        {{ Form::close() }}
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
