@extends('layouts.public')

@section('title', 'Home')

@section('main')

<section class="blog" id="acquista">
    <div class="container">
    <div class="section-intro pb-60px">
        <h2><span class="section-intro__style">Come acquistare i nostri prodotti</span></h2>
    </div>

    <div class="row">
        <div class="col-md-6 col-lg-4 mb-4 mb-lg-0">
        <div class="card card-blog imgacq">
            <div class="card-blog__img">
            <img src="img/icon/pen.png">
            </div>
            <div class="card-body">

                <h4 class="card-blog__title"><a href="single-blog.html">Iscriviti al sito</a></h4>
                <p>Accedi alla tua area personale o crea un nuovo account tramite la sezione registrati.</p>
                <a class="card-blog__link" href="#">Scopri di più <i class="ti-arrow-right"></i></a>
            </div>
        </div>
        </div>

        <div class="col-md-6 col-lg-4 mb-4 mb-lg-0">
        <div class="card card-blog imgacq">
            <div class="card-blog__img">
            <img src="img/icon/per.png">
            </div>
            <div class="card-body">

            <h4 class="card-blog__title"><a href="single-blog.html">Scopri fantastici sconti</a></h4>
            <p>L'iscrizione ti permetterà di vedere sconti su moltissimi prodotti del nostro catalogo.</p>
            <a class="card-blog__link" href="#">Scopri di più <i class="ti-arrow-right"></i></a>
            </div>
        </div>
        </div>

        <div class="col-md-6 col-lg-4 mb-4 mb-lg-0">
        <div class="card card-blog imgacq">
            <div class="card-blog__img">
            <img src="img/icon/bas.png">
            </div>
            <div class="card-body">

                <h4 class="card-blog__title"><a href="single-blog.html">Acquista in sicurezza</a></h4>
                <p>Acquista tutti i prodotti che vuoi senza preoccupazioni.</p>
                <a class="card-blog__link" href="#">Scopri di più <i class="ti-arrow-right"></i></a>
            </div>
        </div>
        </div>

    </div>
    </div>
</section>

<section class="blog" id="acquista">
    <div class="container">
    <div class="section-intro pb-60px mt-4">
        <h2><span class="section-intro__style">Dove trovarci</span></h2>
    </div>

    <div class="row">
        <div class="centra">
            <iframe width="500px" height="300px" frameborder="0" scrolling="no" src="http://maps.google.it/maps?f=q&amp;source=s_q&amp;hl=it&amp;geocode=&amp;q=Via+Brecce+Bianche,+12,+Ancona&amp;aq=0&amp;sll=41.442726,12.392578&amp;sspn=23.377375,53.657227&amp;ie=UTF8&amp;hq=&amp;hnear=Via+Brecce+Bianche,+12,+60131+Ancona,+Marche&amp;z=14&amp;ll=43.581248,13.515684&amp;output=embed"></iframe>
        </div>
        <div class="col-md-6 col-lg-4 mb-4 mb-lg-0 centra">
        <div class="card card-blog imgacq">
            <div class="card-blog__img">
            <img src="img/icon/chi.png">
            </div>
            <div class="card-body">

                <h4 class="card-blog__title"><a href="single-blog.html">Chi siamo</a></h4>
                <p>Mattia Alesi --- Marco Incipini </p>
                <p>Lorenzo Piccioni --- Loris Ramovini </p>
            </div>
        </div>
        </div>
    </div>
    </div>
</section>

<section class="subscribe-position">
    <div class="container">
    <div class="subscribe text-center">
        <h3 class="subscribe__title">Privacy policy</h3>
        <p>Noi e i nostri partner utilizziamo tecnologie, quali quelle dei cookie, ed elaboriamo i dati personali,
        quali gli indirizzi IP e gli identificatori dei cookie, per personalizzare gli annunci e i contenuti in base
        ai tuoi interessi, misurare le prestazioni di annunci e contenuti e ricavare informazioni sul pubblico che ha
        visualizzato gli annunci e i contenuti. Fai clic sotto per acconsentire all'utilizzo di questa tecnologia e al
        trattamento dei tuoi dati personali per queste finalità. Puoi cambiare idea e modificare le tue opzioni sul
        consenso in qualsiasi momento ritornando su questo sito.</p>
    </div>
    </div>
</section>
@endsection
