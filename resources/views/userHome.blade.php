@extends('layouts.user')

@section('title', 'Benvenuto')

@section('main')

<section class="blog" id="acquista">
    <div class="container">
    <div class="section-intro pb-60px">
        <h2><span class="section-intro__style">Benvenuto {{ Auth::user()->nome }} {{ Auth::user()->cognome }}</span></h2>
    </div>
    <h4>Ora puoi acquistare i prodotti</h4>
</section>
@endsection