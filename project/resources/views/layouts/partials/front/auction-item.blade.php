<div class="auction-item-2">
    <div class="auction-thumb">
        @if ($auction->is_live)
            <span class="badge badge-danger badge-live p-2">
                <i class="fa fa-eye"></i> {{ __('Live') }}
            </span>
        @endif
        <a href="{{ route('front.details', $auction->slug) }}"><img
                src="{{ asset('assets/images/auction/' . $auction->photo) }}" alt="{{ $auction->title }}"></a>
        {{-- <a href="#0" class="rating"><i class="far fa-star"></i></a> --}}
        <a href="#0" class="bid"><i class="flaticon-auction"></i></a>
    </div>
    <div class="auction-content">
        <h6 class="title">
            <a href="{{ route('front.details', $auction->slug) }}">
                {{ $auction->title }}</a>
        </h6>
        <div class="bid-area">
            <div class="bid-amount">
                <div class="icon">
                    <i class="flaticon-auction"></i>
                </div>
                <div class="amount-content">
                    <div class="current">{{ __('Current Bid') }}</div>
                    <div class="amount">
                        @if ($gs->currency_format == 0)
                            {{ $gs->currency_sign }}{{ number_format($auction->lowBids(), 2, ',', '.') }}
                        @else
                            {{ number_format($auction->lowBids(), 2, ',', '.') }}{{ $gs->currency_sign }}
                        @endif
                    </div>
                </div>
            </div>
            <div class="bid-amount">
                <div class="icon">
                    <i class="flaticon-money"></i>
                </div>
                <div class="amount-content">
                    <div class="current">{{ __('Buy Now') }}</div>
                    <div class="amount">
                        @if ($gs->currency_format == 0)
                            {{ $auction->highBids() }}
                        @else
                            {{ $auction->highBids() }}
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <div class="countdown-area">
            <div class="countdown">
                {{-- <div id="bid_counter26"></div> --}}
                @if (Carbon\Carbon::now($gs->time_zone)->format('Y-m-d') < Carbon\Carbon::parse($auction->start_date)->format('Y-m-d'))
                    <div class="__coundown"
                        data-date="{{ Carbon\Carbon::parse($auction->start_date)->format('M d,Y H:i:s') }}">

                        <span>{{ __('To Start') }}</span>
                    </div>
                @else
                    <div class="__coundown"
                        data-date="{{ Carbon\Carbon::parse($auction->end_date)->format('M d,Y H:i:s') }}">

                        <span>{{ __('Left') }}</span>
                    </div>
                @endif
            </div>
            <span class="total-bids">{{ count($auction->bids) }}
                {{ __('Bids') }}</span>
        </div>
        <div class="text-center">
            <a href="{{ route('front.details', $auction->slug) }}"
                class="custom-button">{{ __('Submit a bid') }}</a>
        </div>
    </div>
</div>
