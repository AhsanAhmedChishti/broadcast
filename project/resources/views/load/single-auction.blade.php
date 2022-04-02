@foreach($auction->bids()->orderBy('bid_amount','desc')->get() as $bid)
<tr>
    <td>{{ $bid->user->customer_number }}</td>

   @if($gs->currency_format == 0)
    <td>{{ $gs->currency_sign }}{{ number_format($bid->bid_amount, 2, ',', '.') }}</td>
    @else 
    <td>{{ number_format($bid->bid_amount, 2, ',', '.') }}{{ $gs->currency_sign }}</td>
    @endif

    <td>{{ $bid->updated_at->diffForhumans() }}</td>

</tr>
@endforeach

<script>

$('#highest').html('{{ $auction->highBids() }}');

</script>