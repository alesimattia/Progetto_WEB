@can('show-discount')
    <p class="price"> {{ number_format($prodotto->getPrezzo(), 2, ',', '.') }} € </p>
    @if ($prodotto->percSconto >0)
        <p class="discprice"> Valore <del>{{ number_format($prodotto->getPrezzo(), 2, ',', '.') }} €</del><br>
        Sconto {{ $prodotto->percSconto }}%</p>
    @endif
@else
    <p class="price"> {{ number_format($prodotto->getPrezzo(false), 2, ',', '.') }} € </p>
@endcan