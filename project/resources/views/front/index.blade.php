@extends('layouts.front')

@section('content')

    {{-- ============ Banner Section Starts Here ============ --}}
    @if (1 == $sliders->count())
        @foreach ($sliders as $item)
            <section class="banner-section bg_img"
                data-background="{{ asset('assets/front-new/images/banner/banner-bg-1.png') }}">
                <div class="container">
                    <div class="row align-items-center justify-content-between">
                        <div class="col-lg-6 col-xl-6">
                            <div class="banner-content cl-white">
                                {{-- <h5 class="cate">Next Generation Auction</h5> --}}
                                <h5 class="cate">{{ __($item->subtitle_text) }}</h5>
                                {{-- <h1 class="title"><span class="d-xl-block">Find Your</span> Next Deal!</h1> --}}
                                {!! $item->title_text !!}
                                {{-- <p>
                                    Online Auction is where everyone goes to shop, sell,and give, while discovering variety
                                    and
                                    affordability.
                                </p> --}}
                                <p>{{ __($item->details_text) }}</p>
                                <a href="{{ route('user.login') }}"
                                    class="custom-button yellow btn-large">{{ __('Get Started') }}</a>
                            </div>
                        </div>
                        <div class="d-none d-lg-block col-lg-6">
                            <div class="banner-thumb-2">
                                <img src="{{ asset('assets/front-new/images/banner/banner-1.png') }}" alt="banner">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="banner-shape d-none d-lg-block">
                    <img src="{{ asset('assets/front-new/css/img/banner-shape.png') }}" alt="css">
                </div>
            </section>
        @endforeach
    @endif
    {{-- ============ Banner Section Ends Here ============ --}}


    <div class="browse-section ash-bg">
        {{-- ============ Hightlight Slider Section Starts Here ============ --}}
        @if (isset($categories) && $categories->count())
            <div id="auction-categories" class="browse-slider-section mt--140">
                <div class="container">
                    <div class="section-header-2 cl-white mb-4">
                        <div class="left">
                            <h6 class="title pl-0 w-100">{{ __($category_section_title_text->category_section_title) }}
                            </h6>
                        </div>
                        <div class="slider-nav">
                            <a href="#0" class="bro-prev"><i class="flaticon-left-arrow"></i></a>
                            <a href="#0" class="bro-next active"><i class="flaticon-right-arrow"></i></a>
                        </div>
                    </div>
                    <div class="m--15">
                        <div class="browse-slider owl-theme owl-carousel">

                            @foreach ($categories as $category)
                                @php
                                    $slug = Str::lower($category->slug);
                                @endphp
                                <a href="#{{ 'electronics' === $slug || 'art' === $slug ? 'elect-art' : $slug }}"
                                    class="browse-item">
                                    <img src="{{ asset('assets/images/category/' . $category->image) }}"
                                        alt="{{ $category->title }}">
                                    <span class="info">{{ $category->title }}</span>
                                </a>
                            @endforeach

                        </div>
                    </div>
                </div>
            </div>
        @endif
        {{-- ============ Hightlight Slider Section Ends Here ============ --}}

        {{-- ============ Car Auction Section Starts Here ============ --}}
        @if (isset($auctions) && $auctions->count())

            <section id="car" class="car-auction-section padding-bottom padding-top pos-rel oh">

                <div class="car-bg"><img src="{{ asset('assets/front-new/images/auction/car/car-bg.png') }}"
                        alt="car"></div>
                <div class="container">
                    <div class="section-header-3">
                        <div class="left">
                            <div class="thumb">
                                <img src="{{ asset('assets/front-new/images/header-icons/car-1.png') }}"
                                    alt="header-icons">
                            </div>
                            <div class="title-area">
                                <h2 class="title">{{ __($auction_title_description->title) }}</h2>
                                <p>{{ __($auction_title_description->description) }}</p>
                            </div>
                        </div>
                        <a href="{{ route('front.featured') }}" class="normal-button">View All</a>
                    </div>
                    <div class="row justify-content-center mb-30-none">

                        @foreach ($auctions as $auction)
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
                                                    <div class="current">Current Bid</div>
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
                                                    <div class="current">Buy Now</div>
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
                                                class="custom-button">Submit a bid</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
            </section>

        @endif
        {{-- ============ Car Auction Section Ends Here ============ --}}
    </div>


    {{-- ============ Jewelry Auction Section Starts Here ============ --}}
    @if (isset($jewelries) && $jewelries->count())
        <section id="jewelry" class="jewelry-auction-section padding-bottom padding-top pos-rel">
            <div class="jewelry-bg d-none d-xl-block"><img
                    src="{{ asset('assets/front-new/images/auction/jewelry/jwelry-bg.png') }}" alt="jewelry">
            </div>
            <div class="container">
                <div class="section-header-3">
                    <div class="left">
                        <div class="thumb">
                            <img src="{{ asset('assets/front-new/images/header-icons/coin-1.png') }}" alt="header-icons">
                        </div>
                        <div class="title-area">
                            <h2 class="title">Jewelry</h2>
                            <p>Online jewelry auctions where you can bid now and save money</p>
                        </div>
                    </div>
                    <a href="{{ route('front.category', 'jewelry') }}" class="normal-button">View All</a>
                </div>
                <div class="row justify-content-center mb-30-none">
                    @foreach ($jewelries as $jewelry)
                        <div class="col-sm-10 col-md-6 col-lg-4">
                            <div class="auction-item-2">
                                <div class="auction-thumb">
                                    <a href="{{ route('front.details', $jewelry->slug) }}"><img
                                            src="{{ asset('assets/images/auction/' . $jewelry->photo) }}"
                                            alt="{{ __($jewelry->title) }}"></a>
                                    <a href="#0" class="rating"><i class="far fa-star"></i></a>
                                    <a href="#0" class="bid"><i class="flaticon-auction"></i></a>
                                </div>
                                <div class="auction-content">
                                    <h6 class="title">
                                        <a
                                            href="{{ route('front.details', $jewelry->slug) }}">{{ __($jewelry->title) }}</a>
                                    </h6>
                                    <div class="bid-area">
                                        <div class="bid-amount">
                                            <div class="icon">
                                                <i class="flaticon-auction"></i>
                                            </div>
                                            <div class="amount-content">
                                                <div class="current">Current Bid</div>
                                                <div class="amount">
                                                    @if ($gs->currency_format == 0)
                                                        {{ $gs->currency_sign }}{{ number_format($jewelry->lowBids(), 2, ',', '.') }}
                                                    @else
                                                        {{ number_format($jewelry->lowBids(), 2, ',', '.') }}{{ $gs->currency_sign }}
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="bid-amount">
                                            <div class="icon">
                                                <i class="flaticon-money"></i>
                                            </div>
                                            <div class="amount-content">
                                                <div class="current">Buy Now</div>
                                                <div class="amount">
                                                    @if ($gs->currency_format == 0)
                                                        {{ $jewelry->highBids() }}
                                                    @else
                                                        {{ $jewelry->highBids() }}
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="countdown-area">
                                        <div class="countdown">
                                            {{-- <div id="bid_counter26"></div> --}}
                                            @if (Carbon\Carbon::now($gs->time_zone)->format('Y-m-d') < Carbon\Carbon::parse($jewelry->start_date)->format('Y-m-d'))
                                                <div class="__coundown"
                                                    data-date="{{ Carbon\Carbon::parse($jewelry->start_date)->format('M d,Y H:i:s') }}">

                                                    <span>{{ __('To Start') }}</span>
                                                </div>
                                            @else
                                                <div class="__coundown"
                                                    data-date="{{ Carbon\Carbon::parse($jewelry->end_date)->format('M d,Y H:i:s') }}">

                                                    <span>{{ __('Left') }}</span>
                                                </div>
                                            @endif
                                        </div>
                                        <span class="total-bids">{{ count($jewelry->bids) }}
                                            {{ __('Bids') }}</span>
                                    </div>
                                    <div class="text-center">
                                        <a href="{{ route('front.details', $jewelry->slug) }}"
                                            class="custom-button">Submit a bid</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif
    {{-- ============ Jewelry Auction Section Ends Here ============ --}}

    {{-- Call-in Section Starts --}}
    @include('layouts.partials.front.callin')
    {{-- Call-in Section Ends --}}

    {{-- ============ Watches Auction Section Starts Here ============ --}}
    @if (isset($watches) && $watches->count())
        <section id="watches" class="watches-auction-section padding-bottom padding-top">
            <div class="container">
                <div class="section-header-3">
                    <div class="left">
                        <div class="thumb">
                            <img src="{{ asset('assets/front-new/images/header-icons/coin-1.png') }}" alt="header-icons">
                        </div>
                        <div class="title-area">
                            <h2 class="title">Watches</h2>
                            <p>Shop for men & women designer brand watches</p>
                        </div>
                    </div>
                    <a href="{{ route('front.category', 'watches') }}" class="normal-button">View All</a>
                </div>
                <div class="row justify-content-center mb-30-none">
                    @foreach ($watches as $watch)
                        <div class="col-sm-10 col-md-6 col-lg-4">
                            <div class="auction-item-2">
                                <div class="auction-thumb">
                                    <a href="{{ route('front.details', $watch->slug) }}"><img
                                            src="{{ asset('assets/images/auction/' . $watch->photo) }}"
                                            alt="{{ __($watch->title) }}"></a>
                                    <a href="#0" class="rating"><i class="far fa-star"></i></a>
                                    <a href="#0" class="bid"><i class="flaticon-auction"></i></a>
                                </div>
                                <div class="auction-content">
                                    <h6 class="title">
                                        <a
                                            href="{{ route('front.details', $watch->slug) }}">{{ __($watch->title) }}</a>
                                    </h6>
                                    <div class="bid-area">
                                        <div class="bid-amount">
                                            <div class="icon">
                                                <i class="flaticon-auction"></i>
                                            </div>
                                            <div class="amount-content">
                                                <div class="current">Current Bid</div>
                                                <div class="amount">
                                                    @if ($gs->currency_format == 0)
                                                        {{ $gs->currency_sign }}{{ number_format($watch->lowBids(), 2, ',', '.') }}
                                                    @else
                                                        {{ number_format($watch->lowBids(), 2, ',', '.') }}{{ $gs->currency_sign }}
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="bid-amount">
                                            <div class="icon">
                                                <i class="flaticon-money"></i>
                                            </div>
                                            <div class="amount-content">
                                                <div class="current">Buy Now</div>
                                                <div class="amount">
                                                    @if ($gs->currency_format == 0)
                                                        {{ $watch->highBids() }}
                                                    @else
                                                        {{ $watch->highBids() }}
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="countdown-area">
                                        <div class="countdown">
                                            {{-- <div id="bid_counter26"></div> --}}
                                            @if (Carbon\Carbon::now($gs->time_zone)->format('Y-m-d') < Carbon\Carbon::parse($watch->start_date)->format('Y-m-d'))
                                                <div class="__coundown"
                                                    data-date="{{ Carbon\Carbon::parse($watch->start_date)->format('M d,Y H:i:s') }}">

                                                    <span>{{ __('To Start') }}</span>
                                                </div>
                                            @else
                                                <div class="__coundown"
                                                    data-date="{{ Carbon\Carbon::parse($watch->end_date)->format('M d,Y H:i:s') }}">

                                                    <span>{{ __('Left') }}</span>
                                                </div>
                                            @endif
                                        </div>
                                        <span class="total-bids">{{ count($watch->bids) }}
                                            {{ __('Bids') }}</span>
                                    </div>
                                    <div class="text-center">
                                        <a href="{{ route('front.details', $watch->slug) }}"
                                            class="custom-button">Submit a bid</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </section>
    @endif
    {{-- ============ Watches Auction Section Ends Here ============ --}}


    {{-- ============ Popular Auction Section Starts Here ============ --}}
    @if (isset($popular) && $popular->count())
        <section class="popular-auction padding-top pos-rel">
            <div class="popular-bg bg_img"
                data-background="{{ asset('assets/front-new/images/auction/popular/popular-bg.png') }}"></div>
            <div class="container">
                <div class="section-header cl-white">
                    <span class="cate">Closing Within 24 Hours</span>
                    <h2 class="title">Popular Auctions</h2>
                    <p>Bid and win great deals,Our auction process is simple, efficient, and transparent.</p>
                </div>
                <div class="popular-auction-wrapper">
                    <div class="row justify-content-center mb-30-none">
                        @foreach ($popular as $item)
                            <div class="col-lg-6">
                                <div class="auction-item-3">
                                    <div class="auction-thumb">
                                        <a href="{{ route('front.details', $item->slug) }}"><img
                                                src="{{ asset('assets/images/auction/' . $item->photo) }}"
                                                alt="popular"></a>
                                        <a href="#0" class="bid"><i class="flaticon-auction"></i></a>
                                    </div>
                                    <div class="auction-content">
                                        <h6 class="title">
                                            <a
                                                href="{{ route('front.details', $item->slug) }}">{{ __($item->title) }}</a>
                                        </h6>
                                        <div class="bid-amount">
                                            <div class="icon">
                                                <i class="flaticon-auction"></i>
                                            </div>
                                            <div class="amount-content">
                                                <div class="current">Current Bid</div>
                                                <div class="amount">
                                                    @if ($gs->currency_format == 0)
                                                        {{ $gs->currency_sign }}{{ number_format($item->lowBids(), 2, ',', '.') }}
                                                    @else
                                                        {{ number_format($item->lowBids(), 2, ',', '.') }}{{ $gs->currency_sign }}
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="bids-area">
                                            Total Bids : <span class="total-bids">{{ count($item->bids) }}
                                                {{ __('Bids') }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
    @endif
    {{-- ============ Popular Auction Section Ends Here ============ --}}


    {{-- ============ Coins and Bullion Auction Section Starts Here ============ --}}
    @if (isset($coins_bullions) && $coins_bullions->count())
        <section id="coins-bullions"
            class="coins-and-bullion-auction-section padding-bottom padding-top pos-rel pb-max-xl-0">
            <div class="jewelry-bg d-none d-xl-block"><img
                    src="{{ asset('assets/front-new/images/auction/coins/coin-bg.png') }}" alt="coin">
            </div>
            <div class="container">
                <div class="section-header-3">
                    <div class="left">
                        <div class="thumb">
                            <img src="{{ asset('assets/front-new/images/header-icons/coin-1.png') }}" alt="header-icons">
                        </div>
                        <div class="title-area">
                            <h2 class="title">Coins & Bullion</h2>
                            <p>Discover rare, foreign, & ancient coins that are worth collecting</p>
                        </div>
                    </div>
                    <a href="{{ route('front.category', 'coins-bullions') }}" class="normal-button">View All</a>
                </div>
                <div class="row justify-content-center mb-30-none">
                    @foreach ($coins_bullions as $coin_bullion)
                        <div class="col-sm-10 col-md-6 col-lg-4">
                            <div class="auction-item-2">
                                <div class="auction-thumb">
                                    <a href="{{ route('front.details', $coin_bullion->slug) }}"><img
                                            src="{{ asset('assets/images/auction/' . $coin_bullion->photo) }}"
                                            alt="{{ __($coin_bullion->title) }}"></a>
                                    <a href="#0" class="rating"><i class="far fa-star"></i></a>
                                    <a href="#0" class="bid"><i class="flaticon-auction"></i></a>
                                </div>
                                <div class="auction-content">
                                    <h6 class="title">
                                        <a
                                            href="{{ route('front.details', $coin_bullion->slug) }}">{{ __($coin_bullion->title) }}</a>
                                    </h6>
                                    <div class="bid-area">
                                        <div class="bid-amount">
                                            <div class="icon">
                                                <i class="flaticon-auction"></i>
                                            </div>
                                            <div class="amount-content">
                                                <div class="current">Current Bid</div>
                                                <div class="amount">
                                                    @if ($gs->currency_format == 0)
                                                        {{ $gs->currency_sign }}{{ number_format($coin_bullion->lowBids(), 2, ',', '.') }}
                                                    @else
                                                        {{ number_format($coin_bullion->lowBids(), 2, ',', '.') }}{{ $gs->currency_sign }}
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="bid-amount">
                                            <div class="icon">
                                                <i class="flaticon-money"></i>
                                            </div>
                                            <div class="amount-content">
                                                <div class="current">Buy Now</div>
                                                <div class="amount">
                                                    @if ($gs->currency_format == 0)
                                                        {{ $coin_bullion->highBids() }}
                                                    @else
                                                        {{ $coin_bullion->highBids() }}
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="countdown-area">
                                        <div class="countdown">
                                            {{-- <div id="bid_counter26"></div> --}}
                                            @if (Carbon\Carbon::now($gs->time_zone)->format('Y-m-d') < Carbon\Carbon::parse($coin_bullion->start_date)->format('Y-m-d'))
                                                <div class="__coundown"
                                                    data-date="{{ Carbon\Carbon::parse($coin_bullion->start_date)->format('M d,Y H:i:s') }}">

                                                    <span>{{ __('To Start') }}</span>
                                                </div>
                                            @else
                                                <div class="__coundown"
                                                    data-date="{{ Carbon\Carbon::parse($coin_bullion->end_date)->format('M d,Y H:i:s') }}">

                                                    <span>{{ __('Left') }}</span>
                                                </div>
                                            @endif
                                        </div>
                                        <span class="total-bids">{{ count($coin_bullion->bids) }}
                                            {{ __('Bids') }}</span>
                                    </div>
                                    <div class="text-center">
                                        <a href="{{ route('front.details', $coin_bullion->slug) }}"
                                            class="custom-button">Submit a bid</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif
    {{-- ============ Coins and Bullion Auction Section Ends Here ============ --}}


    {{-- ============ Real Estate Section Starts Here ============ --}}
    @if (isset($real_estate) && $real_estate->count())
        <section id="real-estate" class="real-estate-auction padding-top padding-bottom pos-rel oh">
            <div class="car-bg"><img src="{{ asset('assets/front-new/images/auction/realstate/real-bg.png') }}"
                    alt="realstate">
            </div>
            <div class="container">
                <div class="section-header-3">
                    <div class="left">
                        <div class="thumb">
                            <img src="{{ asset('assets/front-new/images/header-icons/coin-1.png') }}"
                                alt="header-icons">
                        </div>
                        <div class="title-area">
                            <h2 class="title">Real Estate</h2>
                            <p>Find auctions for Homes, Condos, Residential & Commercial Properties.</p>
                        </div>
                    </div>
                    <a href="{{ route('front.category', 'real-estate') }}" class="normal-button">View All</a>
                </div>
                <div class="auction-slider-4 owl-theme owl-carousel">
                    @foreach ($real_estate as $item)
                        <div class="auction-item-4">
                            <div class="auction-thumb">
                                <a href="{{ route('front.details', $item->slug) }}"><img
                                        src="{{ asset('assets/images/auction/' . $item->photo) }}"
                                        alt="{{ __($item->title) }}"></a>
                                <a href="#0" class="bid"><i class="flaticon-auction"></i></a>
                            </div>
                            <div class="auction-content">
                                <h4 class="title">
                                    <a href="{{ route('front.details', $item->slug) }}">{{ __($item->title) }}</a>
                                </h4>
                                <div class="bid-area">
                                    <div class="bid-amount">
                                        <div class="icon">
                                            <i class="flaticon-auction"></i>
                                        </div>
                                        <div class="amount-content">
                                            <div class="current">Current Bid</div>
                                            <div class="amount">
                                                @if ($gs->currency_format == 0)
                                                    {{ $gs->currency_sign }}{{ number_format($item->lowBids(), 2, ',', '.') }}
                                                @else
                                                    {{ number_format($item->lowBids(), 2, ',', '.') }}{{ $gs->currency_sign }}
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="bid-amount">
                                        <div class="icon">
                                            <i class="flaticon-money"></i>
                                        </div>
                                        <div class="amount-content">
                                            <div class="current">Buy Now</div>
                                            <div class="amount">$5,00.00</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="countdown-area">
                                    <div class="countdown">
                                        {{-- <div id="bid_counter26"></div> --}}
                                        @if (Carbon\Carbon::now($gs->time_zone)->format('Y-m-d') < Carbon\Carbon::parse($item->start_date)->format('Y-m-d'))
                                            <div class="__coundown"
                                                data-date="{{ Carbon\Carbon::parse($item->start_date)->format('M d,Y H:i:s') }}">

                                                <span>{{ __('To Start') }}</span>
                                            </div>
                                        @else
                                            <div class="__coundown"
                                                data-date="{{ Carbon\Carbon::parse($item->end_date)->format('M d,Y H:i:s') }}">

                                                <span>{{ __('Left') }}</span>
                                            </div>
                                        @endif
                                    </div>
                                    <span class="total-bids">{{ count($item->bids) }}
                                        {{ __('Bids') }}</span>
                                </div>
                                <div class="text-center">
                                    <a href="{{ route('front.details', $item->slug) }}" class="custom-button">Submit a
                                        bid</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="slider-nav real-style ml-auto">
                    <a href="#0" class="real-prev"><i class="flaticon-left-arrow"></i></a>
                    <div class="pagination"></div>
                    <a href="#0" class="real-next active"><i class="flaticon-right-arrow"></i></a>
                </div>
            </div>
        </section>
    @endif
    {{-- ============ Real Estate Section Starts Here ============ --}}


    {{-- ============ Art Auction Section Starts Here ============ --}}
    @if (isset($electronics) || isset($arts))
        <section id="elect-art" class="art-and-electronics-auction-section padding-top">
            <div class="container">
                <div class="row justify-content-center mb--50">

                    @if ($electronics->count())
                        <div class="col-xl-6 col-lg-8 mb-50">
                            <div class="section-header-2">
                                <div class="left">
                                    <div class="thumb">
                                        <img src="{{ asset('assets/front-new/images/header-icons/camera-1.png') }}"
                                            alt="header-icons">
                                    </div>
                                    <h2 class="title">Electronics</h2>
                                </div>
                                <div class="slider-nav">
                                    <a href="#0" class="electro-prev"><i class="flaticon-left-arrow"></i></a>
                                    <a href="#0" class="electro-next active"><i class="flaticon-right-arrow"></i></a>
                                </div>
                            </div>
                            <div class="auction-slider-1 owl-carousel owl-theme  mb-30-none">
                                <div class="slide-item">
                                    @foreach ($electronics as $item)
                                        <div class="auction-item-1">
                                            <div class="auction-thumb">
                                                <a href="{{ route('front.details', $item->slug) }}"><img
                                                        src="{{ asset('assets/images/auction/' . $item->photo) }}"
                                                        alt="{{ __($item->title) }}"></a>
                                                <a href="#0" class="rating"><i class="far fa-star"></i></a>
                                                <a href="#0" class="bid"><i class="flaticon-auction"></i></a>
                                            </div>
                                            <div class="auction-content">
                                                <h6 class="title">
                                                    <a
                                                        href="{{ route('front.details', $item->slug) }}">{{ __($item->title) }}</a>
                                                </h6>
                                                <div class="bid-amount">
                                                    <div class="icon">
                                                        <i class="flaticon-auction"></i>
                                                    </div>
                                                    <div class="amount-content">
                                                        <div class="current">Current Bid</div>
                                                        <div class="amount">
                                                            @if ($gs->currency_format == 0)
                                                                {{ $gs->currency_sign }}{{ number_format($item->lowBids(), 2, ',', '.') }}
                                                            @else
                                                                {{ number_format($item->lowBids(), 2, ',', '.') }}{{ $gs->currency_sign }}
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="countdown-area">
                                                    <div class="countdown">
                                                        {{-- <div id="bid_counter26"></div> --}}
                                                        @if (Carbon\Carbon::now($gs->time_zone)->format('Y-m-d') < Carbon\Carbon::parse($item->start_date)->format('Y-m-d'))
                                                            <div class="__coundown"
                                                                data-date="{{ Carbon\Carbon::parse($item->start_date)->format('M d,Y H:i:s') }}">

                                                                <span>{{ __('To Start') }}</span>
                                                            </div>
                                                        @else
                                                            <div class="__coundown"
                                                                data-date="{{ Carbon\Carbon::parse($item->end_date)->format('M d,Y H:i:s') }}">

                                                                <span>{{ __('Left') }}</span>
                                                            </div>
                                                        @endif
                                                    </div>
                                                    <span class="total-bids">{{ count($item->bids) }}
                                                        {{ __('Bids') }}</span>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    @endif

                    <div class="col-xl-6 col-lg-8 mb-50">
                        <div class="section-header-2">
                            <div class="left">
                                <div class="thumb">
                                    <img src="{{ asset('assets/front-new/images/header-icons/art-1.png') }}"
                                        alt="header-icons">
                                </div>
                                <h2 class="title">Art</h2>
                            </div>
                            <div class="slider-nav">
                                <a href="#0" class="art-prev"><i class="flaticon-left-arrow"></i></a>
                                <a href="#0" class="art-next active"><i class="flaticon-right-arrow"></i></a>
                            </div>
                        </div>
                        <div class="auction-slider-2 owl-carousel owl-theme mb-30-none">
                            <div class="slide-item">
                                @foreach ($arts as $item)
                                    <div class="auction-item-1">
                                        <div class="auction-thumb">
                                            <a href="{{ route('front.details', $item->slug) }}"><img
                                                    src="{{ asset('assets/images/auction/' . $item->photo) }}"
                                                    alt="{{ __($item->title) }}"></a>
                                            <a href="#0" class="rating"><i class="far fa-star"></i></a>
                                            <a href="#0" class="bid"><i class="flaticon-auction"></i></a>
                                        </div>
                                        <div class="auction-content">
                                            <h6 class="title">
                                                <a
                                                    href="{{ route('front.details', $item->slug) }}">{{ __($item->title) }}</a>
                                            </h6>
                                            <div class="bid-amount">
                                                <div class="icon">
                                                    <i class="flaticon-auction"></i>
                                                </div>
                                                <div class="amount-content">
                                                    <div class="current">Current Bid</div>
                                                    <div class="amount">
                                                        @if ($gs->currency_format == 0)
                                                            {{ $gs->currency_sign }}{{ number_format($item->lowBids(), 2, ',', '.') }}
                                                        @else
                                                            {{ number_format($item->lowBids(), 2, ',', '.') }}{{ $gs->currency_sign }}
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="countdown-area">
                                                <div class="countdown">
                                                    {{-- <div id="bid_counter26"></div> --}}
                                                    @if (Carbon\Carbon::now($gs->time_zone)->format('Y-m-d') < Carbon\Carbon::parse($item->start_date)->format('Y-m-d'))
                                                        <div class="__coundown"
                                                            data-date="{{ Carbon\Carbon::parse($item->start_date)->format('M d,Y H:i:s') }}">

                                                            <span>{{ __('To Start') }}</span>
                                                        </div>
                                                    @else
                                                        <div class="__coundown"
                                                            data-date="{{ Carbon\Carbon::parse($item->end_date)->format('M d,Y H:i:s') }}">

                                                            <span>{{ __('Left') }}</span>
                                                        </div>
                                                    @endif
                                                </div>
                                                <span class="total-bids">{{ count($item->bids) }}
                                                    {{ __('Bids') }}</span>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif
    {{-- ============ Art Auction Section Ends Here ============ --}}


    {{-- ============ How Section Starts Here ============ --}}
    <section class="how-section padding-top">
        <div class="container">
            <div class="how-wrapper section-bg">
                <div class="section-header text-lg-left">
                    <h2 class="title">How it works</h2>
                    <p>Easy 3 steps to win</p>
                </div>
                <div class="row justify-content-center mb--40">
                    <div class="col-md-6 col-lg-4">
                        <div class="how-item">
                            <div class="how-thumb">
                                <img src="{{ asset('assets/front-new/images/how/how1.png') }}" alt="how">
                            </div>
                            <div class="how-content">
                                <h4 class="title">Sign Up</h4>
                                <p>No Credit Card Required</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4">
                        <div class="how-item">
                            <div class="how-thumb">
                                <img src="{{ asset('assets/front-new/images/how/how2.png') }}" alt="how">
                            </div>
                            <div class="how-content">
                                <h4 class="title">Bid</h4>
                                <p>Bidding is free Only pay if you win</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4">
                        <div class="how-item">
                            <div class="how-thumb">
                                <img src="{{ asset('assets/front-new/images/how/how3.png') }}" alt="how">
                            </div>
                            <div class="how-content">
                                <h4 class="title">Win</h4>
                                <p>Fun - Excitement - Great deals</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{-- ============ How Section Ends Here ============ --}}

    {{-- Clients Section Starts --}}
    @include('layouts.partials.front.clients')
    {{-- Clients Section Ends --}}

@endsection
