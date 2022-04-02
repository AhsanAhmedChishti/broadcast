<a class="clear">{{ __('New Notification') }}(s).</a>
@if (count($datas) > 0)
    <a id="user-notf-clear" data-href="{{ route('user-notf-clear', Auth::user()->id) }}" class="clear"
        href="javascript:;">
        Clear All
    </a>
    <ul>
        @foreach ($datas as $data)
            @if ($data->bid_id != null)
                <li>
                    <a href="{{ route('front.details', $data->bid->auction->slug) }}"> <i class="fas fa-gavel"></i>
                        {{ __('Someone Bids Higher Than You') }}.</a>
                </li>
            @endif

            @if ($data->auction_id != null)
                <li>
                    <a href="{{ route('user-auction-show', $data->auction_id) }}"> <i class="fas fa-newspaper"></i>
                        {{ __('You Have a new Bid') }}.</a>
                </li>
            @endif

        @endforeach

    </ul>

@else

    <a class="clear" href="javascript:;">
        {{ __('No New Notification') }}(s).
    </a>

@endif
