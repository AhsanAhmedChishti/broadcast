@extends('layouts.front')

@section('content')
    {{-- ============ Hero Section Starts Here ============ --}}
    <div class="hero-section style-2">
        <div class="container">
            <ul class="breadcrumb">
                <li>
                    <a href="{{ route('front.index') }}">{{ __('Home') }}</a>
                </li>
                <li>
                    <a href="{{ route('seller.dashboard') }}">{{ __('Dashboard') }}</a>
                </li>
                <li>
                    <span>{{ __('My Bids') }}</span>
                </li>
            </ul>
        </div>
        <div class="bg_img hero-bg bottom_center"
            data-background="{{ asset('assets/front-new/images/banner/hero-bg.png') }}"></div>
    </div>
    {{-- ============ Hero Section Ends Here ============ --}}

    {{-- ============ Dashboard Section Starts Here ============ --}}
    <section class="dashboard-section padding-bottom mt--240 mt-lg--440 pos-rel">
        <div class="container">
            <div class="row justify-content-center">
                {{-- Sidebar Starts --}}
                @include('layouts.partials.seller.sidebar')
                {{-- Sidebar Ends --}}
                <div class="col-lg-8">
                    <div class="dash-bid-item dashboard-widget mb-40-60">
                        <div class="header">
                            <h4 class="title">{{ __('My Bids') }}</h4>
                            <a href="{{ route('user-notf-show', Auth::user()->id) }}">
                                <span class="notify"><i class="flaticon-alarm"></i>
                                    {{ __('Manage Notifications') }}</span>
                            </a>
                        </div>
                        <ul class="button-area nav nav-tabs">
                            <li>
                                <a href="#upcoming" data-toggle="tab" class="custom-button active">{{ __('Unpaid') }}</a>
                            </li>
                            <li>
                                <a href="#past" data-toggle="tab" class="custom-button">{{ __('Paid') }}</a>
                            </li>
                        </ul>
                    </div>
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="upcoming">
                            <div class="row mb-30-none justify-content-center">
                                @forelse ($activeBids as $activeBid)
                                    <div class="col-sm-10 col-md-6">
                                        <div class="auction-item-2">
                                            <div class="auction-thumb">
                                                <a href="{{ route('user-bid-show', $activeBid->id) }}"><img
                                                        src="{{ asset('assets/images/auction/' . $activeBid->auction->photo) }}"
                                                        alt="{{ $activeBid->title }}"></a>
                                                <a href="#0" class="rating"><i class="far fa-star"></i></a>
                                                <a href="#0" class="bid"><i class="flaticon-auction"></i></a>
                                            </div>
                                            <div class="auction-content">
                                                <h6 class="title">
                                                    <a href="{{ route('user-bid-show', $activeBid->id) }}">
                                                        {{ $activeBid->auction->title }}</a>
                                                </h6>
                                                <div class="row align-items-center mb-2 border-top">
                                                    @if ($activeBid->winner == 1)
                                                        <a class="col-lg-6" title="{{ __('You Won!') }}"><i
                                                                class="fas fa-trophy text-success"></i>
                                                            {{ __('Winner') }}</a>

                                                        @if ($activeBid->status != 1)
                                                            <a class="col-lg-6 custom-btn"
                                                                href="{{ route('user-bid-pay', $activeBid->id) }}"><i
                                                                    class="fas fa-dollar-sign"></i><strong>{{ __('Pay Now') }}</strong>
                                                            </a>
                                                        @endif

                                                    @else
                                                        <a class="col-lg-6"> {{ __('Not Won') }}</a>
                                                    @endif
                                                </div>
                                                <div class="bid-area">
                                                    <div class="bid-amount">
                                                        <div class="icon">
                                                            <i class="flaticon-auction"></i>
                                                        </div>
                                                        <div class="amount-content">
                                                            <div class="current">{{ __('Current Bid') }}</div>
                                                            <div class="amount">
                                                                @if ($gs->currency_format == 0)
                                                                    {{ $gs->currency_sign }}{{ number_format($activeBid->auction->lowBids(), 2, ',', '.') }}
                                                                @else
                                                                    {{ number_format($activeBid->auction->lowBids(), 2, ',', '.') }}{{ $gs->currency_sign }}
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
                                                                    {{ $activeBid->auction->highBids() }}
                                                                @else
                                                                    {{ $activeBid->auction->highBids() }}
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="countdown-area">
                                                    <div class="countdown">
                                                        {{-- <div id="bid_counter26"></div> --}}
                                                        @if (Carbon\Carbon::now($gs->time_zone)->format('Y-m-d') < Carbon\Carbon::parse($activeBid->auction->start_date)->format('Y-m-d'))
                                                            <div class="__coundown"
                                                                data-date="{{ Carbon\Carbon::parse($activeBid->auction->start_date)->format('M d,Y H:i:s') }}">

                                                                <span>{{ __('To Start') }}</span>
                                                            </div>
                                                        @else
                                                            <div class="__coundown"
                                                                data-date="{{ Carbon\Carbon::parse($activeBid->auction->end_date)->format('M d,Y H:i:s') }}">

                                                                <span>{{ __('Left') }}</span>
                                                            </div>
                                                        @endif
                                                    </div>
                                                    @php
                                                        $bidsCount = count($activeBid->auction->bids);
                                                    @endphp
                                                    <span class="total-bids">{{ $bidsCount }}
                                                        {{ $bidsCount > 1 ? __('Bids') : __('Bid') }}</span>
                                                </div>
                                                <div class="text-center">
                                                    <a href="{{ route('user-bid-show', $activeBid->id) }}"
                                                        class="custom-button">{{ __('View Details') }}</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @empty
                                    <p class="text-white-50">{{ __('You don\'t have any bids, ') }} <a
                                            href="{{ route('front.auctions') }}">{{ __('start bidding now.') }}</a>
                                    </p>
                                @endforelse
                            </div>
                            {{ $activeBids->withQueryString()->links('front.pagination') }}
                        </div>
                        <div class="tab-pane fade" id="past">
                            <div class="row justify-content-center mb-30-none">
                                @forelse ($pastBids as $pastBid)
                                    <div class="col-sm-10 col-md-6">
                                        <div class="auction-item-2">
                                            <div class="auction-thumb">
                                                <a href="{{ route('user-bid-show', $pastBid->id) }}"><img
                                                        src="{{ asset('assets/images/auction/' . $pastBid->auction->photo) }}"
                                                        alt="{{ $pastBid->title }}"></a>
                                                <a href="#0" class="rating"><i class="far fa-star"></i></a>
                                                <a href="#0" class="bid"><i class="flaticon-auction"></i></a>
                                            </div>
                                            <div class="auction-content">
                                                <h6 class="title">
                                                    <a href="{{ route('user-bid-show', $pastBid->id) }}">
                                                        {{ $pastBid->auction->title }}</a>
                                                </h6>
                                                <div class="row align-items-center mb-2 border-top">
                                                    @if ($pastBid->winner == 1)
                                                        <a class="col-lg-6" title="{{ __('You won!') }}"><i
                                                                class="fas fa-trophy text-success"></i>
                                                            {{ __('Winner') }}</a>

                                                        @if ($pastBid->status != 1)
                                                            <a class="col-lg-6 custom-btn"
                                                                href="{{ route('user-bid-pay', $pastBid->id) }}"><i
                                                                    class="fas fa-dollar-sign"></i><strong>{{ __('Pay Now') }}</strong>
                                                            </a>
                                                        @endif

                                                    @else
                                                        <a class="col-lg-6"> {{ __('Not Won') }}</a>
                                                    @endif
                                                </div>
                                                <div class="bid-area">
                                                    <div class="bid-amount">
                                                        <div class="icon">
                                                            <i class="flaticon-auction"></i>
                                                        </div>
                                                        <div class="amount-content">
                                                            <div class="current">{{ __('Current Bid') }}</div>
                                                            <div class="amount">
                                                                @if ($gs->currency_format == 0)
                                                                    {{ $gs->currency_sign }}{{ number_format($pastBid->auction->lowBids(), 2, ',', '.') }}
                                                                @else
                                                                    {{ number_format($pastBid->auction->lowBids(), 2, ',', '.') }}{{ $gs->currency_sign }}
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
                                                                    {{ $pastBid->auction->highBids() }}
                                                                @else
                                                                    {{ $pastBid->auction->highBids() }}
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="countdown-area">
                                                    <div class="countdown">
                                                        {{-- <div id="bid_counter26"></div> --}}
                                                        @if (Carbon\Carbon::now($gs->time_zone)->format('Y-m-d') < Carbon\Carbon::parse($pastBid->auction->start_date)->format('Y-m-d'))
                                                            <div class="__coundown"
                                                                data-date="{{ Carbon\Carbon::parse($pastBid->auction->start_date)->format('M d,Y H:i:s') }}">

                                                                <span>{{ __('To Start') }}</span>
                                                            </div>
                                                        @else
                                                            <div class="__coundown"
                                                                data-date="{{ Carbon\Carbon::parse($pastBid->auction->end_date)->format('M d,Y H:i:s') }}">

                                                                <span>{{ __('Left') }}</span>
                                                            </div>
                                                        @endif
                                                    </div>
                                                    @php
                                                        $bidsCount = count($pastBid->auction->bids);
                                                    @endphp
                                                    <span class="total-bids">{{ $bidsCount }}
                                                        {{ $bidsCount > 1 ? __('Bids') : __('Bid') }}</span>
                                                </div>
                                                <div class="text-center">
                                                    <a href="{{ route('user-bid-show', $pastBid->id) }}"
                                                        class="custom-button">{{ __('View Details') }}</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @empty
                                    <p class="text-white-50">{{ __('You haven\'t paid for any bid yet.') }}</p>
                                @endforelse

                            </div>
                            {{ $pastBids->withQueryString()->links('front.pagination') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{-- ============ Dashboard Section Ends Here ============ --}}
@endsection
