<!--mostra la barra di navigazione solo se c'è più di una pagina da mostrare -->

@if ($paginator->lastPage() != 1)
<div id="pagination">
    {{ $paginator->firstItem() }} - {{ $paginator->lastItem() }} su {{ $paginator->total() }} ---

    <!-- Prima pagina -->
    @if (!$paginator->onFirstPage())
        <a href="{{ $paginator->url(1) }}">Inizio</a> |
    @else
        Inizio |
    @endif

    <!-- Precedente -->
    @if ($paginator->currentPage() != 1)
        <a href="{{ $paginator->previousPageUrl() }}">
            <img src="./img/icon/left_arrow.png" class="icon_paginator">
        </a> |
    @else
        <img src="./img/icon/left_arrow.png" class="icon_paginator">  <!--stessa immagine ma non cliccabile-->
    @endif

    <!-- Successiva -->
    @if ($paginator->hasMorePages())
        <a href="{{ $paginator->nextPageUrl() }}">
            <img src="./img/icon/right_arrow.png" class="icon_paginator">
        </a>
    @else
        <img src="./img/icon/right_arrow.png" class="icon_paginator">
    @endif

    <!-- Ultima pagina -->
    @if ($paginator->hasMorePages())
        <a href="{{ $paginator->url($paginator->lastPage()) }}">Fine</a>
    @else
        Fine
    @endif
    
</div>
@endif
