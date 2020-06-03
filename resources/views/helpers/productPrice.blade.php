@can('showDiscount')
    @if($prodotto->percSconto>0)
        <p>Sconto &nbsp;{{ $prodotto->percSconto }}%</p>
        <p class="scontato">Valore: {{ $prodotto->prezzo }}€</p>
    @endif
@endcan