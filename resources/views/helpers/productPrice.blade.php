@can('showDiscount')
    @if($prodotto->percSconto>0)
        <p class="mt-n2">Sconto &nbsp;{{ $prodotto->percSconto }}%</p>
        <p class="scontato">Valore: {{ $prodotto->prezzo }}€</p>
    @endif
@endcan