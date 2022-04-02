@extends('layouts.front')

@section('content')

    {{-- ============ Hero Section Starts Here ============ --}}
    <div class="hero-section style-2">
        <div class="container">
            <ul class="breadcrumb">
                <li>
                    <a href="{{ route('front.index') }}"> {{ __('Home') }}</a>
                </li>
                <li>
                    <a href="{{ route('front.index') }}#auction-categories">{{ __('Categories') }}</a>
                </li>
                <li>
                    <span>{{ __($cat->title) }}</span>
                </li>
            </ul>
        </div>
        <div class="bg_img hero-bg bottom_center"
            data-background="{{ asset('assets/front-new/images/banner/hero-bg.png') }}"></div>
    </div>
    {{-- ============ Hero Section Ends Here ============ --}}


    {{-- ============ Featured Auction Section Starts Here ============ --}}
    @if (isset($featuredAuctions) && $featuredAuctions->count())
        <section class="featured-auction-section padding-bottom mt--240 mt-lg--440 pos-rel">
            <div class="container">
                <div class="section-header cl-white mw-100 left-style">
                    <h3 class="title">{{ __($auction_title_description->title) }}</h3>
                </div>
                <div class="row justify-content-center mb-30-none">
                    @foreach ($featuredAuctions as $featuredAuction)
                        <div class="col-sm-10 col-md-6 col-lg-4">
                            <div class="auction-item-2">
                                <div class="auction-thumb">
                                    <a href="{{ route('front.details', $featuredAuction->slug) }}"><img
                                            src="{{ asset('assets/images/auction/' . $featuredAuction->photo) }}"
                                            alt="{{ $featuredAuction->title }}"></a>
                                    <a href="#0" class="rating"><i class="far fa-star"></i></a>
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
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif
    {{-- ============ Featured Auction Section Ends Here ============ --}}


    {{-- ============ Product Auction Section Starts Here ============ --}}
    <div
        class="product-auction padding-bottom {{ !$featuredAuctions->count() ? 'featured-auction-section padding-bottom mt--240 mt-lg--440 pos-rel' : '' }}">
        <div class="container">
            {{-- Product Header Satrts --}}
            @include('layouts.partials.front.product-header')
            {{-- Product Header Ends --}}
            <div class="row mb-30-none justify-content-center">
                @forelse ($auctions as $auction)
                    <div class="col-sm-10 col-md-6 col-lg-4">
                        <div class="auction-item-2">
                            <div class="auction-thumb">
                                <a href="{{ route('front.details', $auction->slug) }}"><img
                                        src="{{ asset('assets/images/auction/' . $auction->photo) }}"
                                        alt="{{ $auction->title }}"></a>
                                <a href="#0" class="rating"><i class="far fa-star"></i></a>
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
                    </div>

                @empty
                    @include('layouts.partials.front.not-found')
                @endforelse
            </div>
            {{ $auctions->withQueryString()->links('front.pagination') }}
        </div>
    </div>
    {{-- ============ Product Auction Section Ends Here ============ --}}

@endsection
