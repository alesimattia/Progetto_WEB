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
                        <form class="row login_form" enctype="text/plain" action="{{ route('login') }}" method="post" id="loginForm">
                            @csrf
                            <div class="col-md-12 form-group">                        <!--in caso di errori ripropone-->
                                <input type="text" class="form-control" id="username" name="username" placeholder="Username" value="{{ old('username') }}" >     
                                    @if($errors->first('username'))
                                    <ul class="error">
                                        @foreach($errors->get('username') as $message)
                                        <li>{{ $message }}</li>
                                        @endforeach
                                    </ul>
                                    @endif
                                <input type="password" class="form-control" id="password" name="username" placeholder="Password" value="{{ old('username') }}" >
                                    @if($errors->first('password'))
                                    <ul class="error">
                                        @foreach($errors->get('password') as $message)
                                        <li>{{ $message }}</li>
                                        @endforeach
                                    </ul>
                                    @endif
                                <button type="submit" value="submit" class="button button-register w-100">Accedi</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection