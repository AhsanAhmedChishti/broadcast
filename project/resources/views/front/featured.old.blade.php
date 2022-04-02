@extends('layouts.front')

@section('content')

    <!-- Breadcrumb Area Start -->
    <div class="breadcrumb-area"
        style="background: url({{ $gs->breadcumb_banner ? asset('assets/images/' . $gs->breadcumb_banner) : asset('assets/images/noimage.png') }});">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="pagetitle">
                        {{ __('Featured Auctions') }}
                    </h1>

                    <ul class="pages">

                        <li>
                            <a href="{{ route('front.index') }}">
                                {{ __('Home') }}
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('front.featured') }}">
                                {{ __('Featured Auctions') }}
                            </a>
                        </li>

                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Area End -->

    <!-- Categori Area Start -->
    <section class="categori-page">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-8">
                    <div class="left-area">
                        <div class="filter-result-area">
                            <div class="header-area">
                                <h4 class="title">
                                    {{ __('Filter Results By') }}
                                </h4>
                            </div>
                            <div class="body-area">
                                <form action="" method="GET">
                                    <div class="price-range-block">
                                        <div id="slider-range" class="price-filter-range" name="rangeInput"></div>
                                        <div class="livecount">
                                            <input type="number" name="min" min=0 max="9900"
                                                oninput="validity.valid||(value='0');" id="min_price"
                                                class="price-range-field" />
                                            <span>{{ __('To') }}</span>
                                            <input type="number" name="max" min=0 max="10000"
                                                oninput="validity.valid||(value='10000');" id="max_price"
                                                class="price-range-field" />
                                        </div>
                                    </div>

                                    <button class="filter-btn" type="submit">{{ __('Search') }}</button>
                                </form>
                            </div>
                        </div>
                        <div class="all-categories-area">
                            <div class="header-area">
                                <h4 class="title">
                                    {{ __('All Categories') }}
                                </h4>
                            </div>
                            <div class="body-area">
                                <div class="accordion" id="accordionExample">
                                    @foreach (DB::table('categories')->get() as $category)
                                        <div class="card">
                                            <a href="{{ route('front.category', $category->slug) }}">
                                                <div class="card-header" id="headingOne">
                                                    <h4 class="button collapsed" data-toggle="collapse"
                                                        data-target="#collapseOne" aria-expanded="true"
                                                        aria-controls="collapseOne">
                                                        <i class="icofont-thin-double-right"></i>{{ $category->title }}
                                                    </h4>
                                                </div>
                                            </a>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="latest_auction_area">
                            <div class="header-area">
                                <h4 class="title">
                                    {{ __('Latest Auction') }}
                                </h4>
                            </div>
                            <div class="body-area">
                                <ul class="filter-list">

                                    @foreach (App\Models\Auction::where('status', '=', 1)->latest()->take(3)->get()
        as $latestAuction)
                                        <li>
                                            <a href="{{ route('front.details', $latestAuction->slug) }}">
                                                <div class="content">
                                                    <div class="left mr-1">
                                                        <img src="{{ asset('assets/images/auction/' . $latestAuction->photo) }}"
                                                            alt="">
                                                    </div>
                                                    <div class="right">
                                                        @if ($gs->currency_format == 0)
                                                            <p class="price">
                                                                {{ $gs->currency_sign }}{{ number_format($latestAuction->start_bid, 2, ',', '.') }}
                                                            </p>
                                                        @else
                                                            <p class="price">
                                                                {{ number_format($latestAuction->start_bid, 2, ',', '.') }}{{ $gs->currency_sign }}
                                                            </p>
                                                        @endif
                                                        <p class="title">{{ $latestAuction->title }}</p>
                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                    @endforeach

                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9 order-first order-lg-last">
                    @if (count($auctions) > 0)
                        <div class="row">
                            @foreach ($auctions as $auction)
                                @if (Carbon\Carbon::parse(Carbon\Carbon::now($gs->time_zone)->format('Y-m-d H:i:s'))->lt(Carbon\Carbon::parse($auction->end_date)))
                                    <div class="col-lg-6 col-md-6">
                                        <a href="{{ route('front.details', $auction->slug) }}" class="single-auction">
                                            <div class="img">
                                                <img src="{{ asset('assets/images/auction/' . $auction->photo) }}" alt="">
                                            </div>
                                            <div class="content">

                                                <div class="price-area">
                                                    <span class="number left">
                                                        @if ($gs->currency_format == 0)
                                                            {{ $gs->currency_sign }}{{ number_format($auction->lowBids(), 2, ',', '.') }}
                                                        @else
                                                            {{ number_format($auction->lowBids(), 2, ',', '.') }}{{ $gs->currency_sign }}
                                                        @endif
                                                        <small class="label">{{ __('lowest') }} :</small>
                                                    </span>
                                                    <span class="number right">
                                                        @if ($gs->currency_format == 0)
                                                            {{ $auction->highBids() }}
                                                        @else
                                                            {{ $auction->highBids() }}
                                                        @endif
                                                        <small class="label">{{ __('Highest') }} :</small>
                                                    </span>
                                                </div>
                                                <h5 class="title">
                                                    {{ $auction->title }}
                                                </h5>
                                                <ul class="bids-info">
                                                    <li>
                                                        <h6>{{ count($auction->bids) }}</h6>
                                                        <p>{{ __('Bids') }}</p>
                                                    </li>
                                                    <li>
                                                        <h6>{{ $auction->conditions }}</h6>
                                                        <p>{{ __('Conditions') }}</p>
                                                    </li>
                                                    @if (Carbon\Carbon::now($gs->time_zone)->format('Y-m-d') < Carbon\Carbon::parse($auction->start_date)->format('Y-m-d'))
                                                        <li>
                                                            <h6 class="countdown"
                                                                data-date="{{ Carbon\Carbon::parse($auction->start_date)->format('M d,Y H:i:s') }}">
                                                            </h6>
                                                            <p>{{ __('To Start') }}</p>
                                                        </li>
                                                    @else
                                                        <li>
                                                            <h6 class="countdown"
                                                                data-date="{{ Carbon\Carbon::parse($auction->end_date)->format('M d,Y H:i:s') }}">
                                                            </h6>
                                                            <p>{{ __('Left') }}</p>
                                                        </li>
                                                    @endif
                                                </ul>
                                            </div>
                                        </a>
                                @endif
                        </div>

                    @endforeach
                    <div class="page-center">
                        @if (isset($min) || isset($max))
                            {!! $auctions->appends(['min' => $min, 'max' => $max])->links() !!}
                        @else
                            {!! $auctions->links() !!}
                        @endif
                    </div>

                </div>
            @else
                <div class="row justify-content-center">
                    <h3>{{ __('No Auctions Found') }}</h3>
                </div>
                @endif
            </div>
        </div>
        </div>
    </section>
    <!--  Categori Area End -->

@endsection


@section('scripts')


    <script type="text/javascript">
        $(function() {
            $("#slider-range").slider({
                range: true,
                orientation: "horizontal",
                min: 0,
                max: 10000,
                values: [{{ isset($_GET['min']) ? $_GET['min'] : '0' }},
                    {{ isset($_GET['max']) ? $_GET['max'] : '10000' }}
                ],
                step: 100,

                slide: function(event, ui) {
                    if (ui.values[0] == ui.values[1]) {
                        return false;
                    }

                    $("#min_price").val(ui.values[0]);
                    $("#max_price").val(ui.values[1]);
                }
            });

            $("#min_price").val($("#slider-range").slider("values", 0));
            $("#max_price").val($("#slider-range").slider("values", 1));

        });
    </script>


@endsection
