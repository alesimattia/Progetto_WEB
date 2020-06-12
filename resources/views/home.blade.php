@extends('layouts.public') 

@section('title', 'Home') 

@section('scripts') 
    @parent						
    <script src="{{ asset('js/functions.js') }}"></script>
    <script>
        var slideIndex = 0;

        window.onload = function() {
            slideshowAuto();
        }

        function changeSlide(n) {
            showSlides((slideIndex += n));
        }

        function visualizzaSlide(n) {
            showSlides((slideIndex = n));
        }
    </script>
@endsection 


@section('main')   
<div class="slide slideshow-container">
    <div class="mySlides">
        <div class="card card-blog imgacq">
            <div class="card-blog__img">
                <img src="{{ asset('img/icon/pen.png') }}" />
            </div>
            <div class="card-body">
                <h4 class="card-blog__title">
                    <a href="{{ route('login') }}">Accedi al sito</a>
                </h4>
                <p>Accedi alla tua area personale o crea un nuovo account tramite la sezione registrati.</p>
                <a class="card-blog__link" href="{{ route('login') }}">Scopri di più 
                                    
                    <i class="ti-arrow-right"></i>
                </a>
            </div>
        </div>
    </div>
    <div class="mySlides">
        <div class="card card-blog imgacq">
            <div class="card-blog__img">
                <img src="{{ asset('img/icon/per.png') }}" />
            </div>
            <div class="card-body">
                <h4 class="card-blog__title">
                    <a href="{{ route('register') }}">Scopri fantastici sconti</a>
                </h4>
                <p>L'iscrizione ti permetterà di vedere sconti su moltissimi prodotti del nostro catalogo.</p>
                <a class="card-blog__link" href="{{ route('register') }}">Scopri di più 
                                    
                    <i class="ti-arrow-right"></i>
                </a>
            </div>
        </div>
    </div>

    <div class="mySlides">
        <div class="card card-blog imgacq">
            <div class="card-blog__img">
                <img src="{{ asset('img/icon/bas.png') }}" />
            </div>
            <div class="card-body">
                <h4 class="card-blog__title">
                    <a href="{{ route('catalogo') }}">Acquista in sicurezza</a>
                </h4>
                <p>Acquista tutti i prodotti che vuoi senza preoccupazioni.</p>
                <a class="card-blog__link" href="{{ route('catalogo') }}">Scopri di più 
                                    
                    <i class="ti-arrow-right"></i>
                </a>
            </div>
        </div>
    </div>

    <div class="mySlides">
        <div class="card card-blog imgacq">
            <div class="card-blog_img">
                <img src="{{ asset('img/icon/chi.png') }}" />
            </div>
            <h3 class="card-blog__title">Chi siamo</h3>
            <div class="mb-4">
                <h5>Alesi Mattia --- Incipini Marco</h5>
                <h5>Piccioni Lorenzo --- Ramovini Loris</h5>
            </div>
        </div>
    </div>

    <div class="mySlides">
        <div class="centra">
            <h4 class="card-blog__title" style="text-align: center;">Dove siamo</h4>
            <iframe width="100%" height="218px" frameborder="0" scrolling="no"
                    src="http://maps.google.it/maps?f=q&amp;source=s_q&amp;hl=it&amp;geocode=&amp;q=Via+Brecce+Bianche,+12,+Ancona&amp;aq=0&amp;sll=41.442726,12.392578&amp;sspn=23.377375,53.657227&amp;ie=UTF8&amp;hq=&amp;hnear=Via+Brecce+Bianche,+12,+60131+Ancona,+Marche&amp;z=14&amp;ll=43.581248,13.515684&amp;output=embed">
            </iframe>
        </div>
    </div>

    
    <a class="prev" onclick="changeSlide(-1)">&#10094;</a>
    <a class="next" onclick="changeSlide(1)">&#10095;</a>
</div>

<br />

<div style="text-align: center;">
    <span class="dot" onclick="visualizzaSlide(1)"></span>
    <span class="dot" onclick="visualizzaSlide(2)"></span>
    <span class="dot" onclick="visualizzaSlide(3)"></span>
    <span class="dot" onclick="visualizzaSlide(4)"></span>
    <span class="dot" onclick="visualizzaSlide(5)"></span>
</div>
<section class="subscribe-position">
    <div class="container">
        <div class="subscribe text-center">
            <h3 class="subscribe__title">Privacy policy</h3>
            <p>
                Noi e i nostri partner utilizziamo tecnologie, quali quelle dei cookie, ed elaboriamo i dati personali, quali gli indirizzi IP e gli identificatori dei cookie, per personalizzare gli annunci e i contenuti in base ai tuoi
                interessi, misurare le prestazioni di annunci e contenuti e ricavare informazioni sul pubblico che ha visualizzato gli annunci e i contenuti. Fai clic sotto per acconsentire all'utilizzo di questa tecnologia e al trattamento
                dei tuoi dati personali per queste finalità. Puoi cambiare idea e modificare le tue opzioni sul consenso in qualsiasi momento ritornando su questo sito.
            </p>
        </div>
    </div>
</section>

@endsection