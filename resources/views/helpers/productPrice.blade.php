@can('show-discount')
    <p class="price"> {{ number_format($product->getPrezzo(), 2, ',', '.') }} € </p>
    @if ($product->percSconto>0)                                <!-- risale al prezzo non scontato -->
        <p class="discprice"> Valore <del>{{ number_format($product->getPrezzo()*100/(100-$product->percSconto), 2, ',', '.') }} €</del><br>
        Sconto {{ $product->percSconto }}%</p>
    @endif
@else
    <p class="price"> {{ number_format($product->getPrezzo(), 2, ',', '.') }} € </p>
@endcan