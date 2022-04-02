<div class="auction-item-2">
    <div class="auction-thumb">
        @if ($featuredAuction->is_live)
            <span class="badge badge-danger badge-live p-2">
                <i class="fa fa-eye"></i> {{ __('Live') }}
            </span>
        @endif
        <a href="{{ route('front.details', $featuredAuction->slug) }}"><img
                src="{{ asset('assets/images/auction/' . $featuredAuction->photo) }}"
                alt="{{ $featuredAuction->title }}"></a>
        {{-- <a href="#0" class="rating"><i class="far fa-star"></i></a> --}}
        <a href="#0" class="bid"><i class="flaticon-auction"></i></a>
    </div>
    <div class="auction-content">
        <h6 class="title">
            <a href="{{ route('front.details', $featuredAuction->slug) }}">
                {{ $featuredAuction->title }}</a>
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
                            {{ $gs->currency_sign }}{{ number_format($featuredAuction->lowBids(), 2, ',', '.') }}
                        @else
                            {{ number_format($featuredAuction->lowBids(), 2, ',', '.') }}{{ $gs->currency_sign }}
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
                            {{ $featuredAuction->highBids() }}
                        @else
                            {{ $featuredAuction->highBids() }}
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <div class="countdown-area">
            <div class="countdown">
                {{-- <div id="bid_counter26"></div> --}}
                @if (Carbon\Carbon::now($gs->time_zone)->format('Y-m-d') < Carbon\Carbon::parse($featuredAuction->start_date)->format('Y-m-d'))
                    <div class="__coundown"
                        data-date="{{ Carbon\Carbon::parse($featuredAuction->start_date)->format('M d,Y H:i:s') }}">

                        <span>{{ __('To Start') }}</span>
                    </div>
                @else
                    <div class="__coundown"
                        data-date="{{ Carbon\Carbon::parse($featuredAuction->end_date)->format('M d,Y H:i:s') }}">

                        <span>{{ __('Left') }}</span>
                    </div>
                @endif
            </div>
            <span class="total-bids">{{ count($featuredAuction->bids) }}
                {{ __('Bids') }}</span>
        </div>
        <div class="text-center">
            <a href="{{ route('front.details', $featuredAuction->slug) }}"
                class="custom-button">{{ __('Submit a bid') }}</a>
        </div>
    </div>
</div>
