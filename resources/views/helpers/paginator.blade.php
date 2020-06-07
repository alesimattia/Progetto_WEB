<!--mostra la barra di navigazione solo se c'è più di una pagina da mostrare -->

@if ($paginator->lastPage() != 1)
<div class="paginator">
    <i class="card-blog__title">
        {{ $paginator->firstItem() }} - {{ $paginator->lastItem() }}&nbsp; su &nbsp;{{ $paginator->total() }} 
        <img src="{{ URL::asset('/img/icon/line.png') }}" style="width: 2em; margin: 0em 0.5em">    <!--inline perchè usato solo qui-->
    </i>

    <!-- Prima pagina -->
    @if (!$paginator->onFirstPage())
        <a href="{{ $paginator->url(1) }}" class="card-blog__title">Inizio</a> 
    @else
        <i class="card-blog__title">Inizio </i>
    @endif

    <!-- Precedente -->
    @if ($paginator->currentPage() != 1)
        <a href="{{ $paginator->previousPageUrl() }}">
            <img src="{{ URL::asset('/img/icon/left_arrow.png') }}" class="icona_paginator">
        </a> |
    @else
        <img src="{{ URL::asset('/img/icon/left_arrow.png') }}" class="icona_paginator">  <!--stessa immagine ma non cliccabile-->
    @endif

    <!-- Successiva -->
    @if ($paginator->hasMorePages())
        <a href="{{ $paginator->nextPageUrl() }}">
            <img src="{{ URL::asset('/img/icon/right_arrow.png') }}" class="icona_paginator">
        </a>
    @else
        <img src="{{ URL::asset('/img/icon/right_arrow.png') }}" class="icona_paginator">
    @endif

    <!-- Ultima pagina -->
    @if ($paginator->hasMorePages())
        <a href="{{ $paginator->url($paginator->lastPage()) }}" class="card-blog__title">Fine</a>
    @else
        <i class="card-blog__title">Fine</i>
    @endif
    
</div>
@endif
