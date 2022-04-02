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
                    <a
                        href="{{ route('front.category', $auction->category->slug) }}">{{ __($auction->category->title) }}</a>
                </li>
                <li>
                    <span>{{ __($auction->title) }}</span>
                </li>
            </ul>
        </div>
        <div class="bg_img hero-bg bottom_center"
            data-background="{{ asset('assets/front-new/images/banner/hero-bg.png') }}"></div>
    </div>
    {{-- ============ Hero Section Ends Here ============ --}}


    {{-- ============ Product Details Section Starts Here ============ --}}
    <section class="product-details padding-bottom mt--240 mt-lg--440">
        <div class="container">
            <div class="product-details-slider-top-wrapper">
                <div class="product-details-slider owl-theme owl-carousel" id="sync1">
                    <div class="slide-inner">
                        @if ($auction->is_live)
                            <span class="badge badge-danger badge-live p-2">
                                <i class="fa fa-eye"></i> {{ __('Live') }}
                            </span>
                        @endif
                        <img src="{{ asset('assets/images/auction/' . $auction->photo) }}" alt="product">
                    </div>
                    @forelse ($auction->galleries as $item)
                        <div class="slide-top-item">
                            @if ($auction->is_live)
                                <span class="badge badge-danger badge-live p-2">
                                    <i class="fa fa-eye"></i> {{ __('Live') }}
                                </span>
                            @endif
                            <div class="slide-inner">
                                <img src="{{ asset('assets/images/galleries/' . $item->photo) }}" alt="product">
                            </div>
                        </div>
                    @empty
                        <div class="slide-inner">
                            @if ($auction->is_live)
                                <span class="badge badge-danger badge-live p-2">
                                    <i class="fa fa-eye"></i> {{ __('Live') }}
                                </span>
                            @endif
                            <img src="{{ asset('assets/images/auction/' . $auction->photo) }}" alt="product">
                        </div>
                    @endforelse
                </div>
            </div>
            <div class="product-details-slider-wrapper">
                <div class="product-bottom-slider owl-theme owl-carousel" id="sync2">
                    <div class="slide-bottom-item">
                        <div class="slide-inner">
                            <img src="{{ asset('assets/images/auction/' . $auction->photo) }}" alt="product">
                        </div>
                    </div>
                    @foreach ($auction->galleries as $item)
                        <div class="slide-bottom-item">
                            <div class="slide-inner">
                                <img src="{{ asset('assets/images/galleries/' . $item->photo) }}" alt="product">
                            </div>
                        </div>
                    @endforeach
                </div>
                <span class="det-prev det-nav">
                    <i class="fas fa-angle-left"></i>
                </span>
                <span class="det-next det-nav active">
                    <i class="fas fa-angle-right"></i>
                </span>
            </div>
            <div class="row mt-40-60-80">
                <div class="col-lg-8">
                    <div class="product-details-content">
                        <div class="product-details-header">
                            <h2 class="title">{{ __($auction->title) }}</h2>
                            <ul>
                                {{-- <li>Listing ID: 14076242</li> --}}
                                @php
                                    $slug = explode('-', $auction->slug);
                                @endphp
                                <li>Item #: {{ Str::upper(end($slug)) }}</li>
                            </ul>
                        </div>
                        <ul class="price-table mb-30">
                            <li class="header">
                                <h5 class="current">Current Price</h5>
                                <h3 class="price">
                                    @if ($gs->currency_format == 0)
                                        {{ $gs->currency_sign }}{{ number_format($auction->lowBids(), 2, ',', '.') }}
                                    @else
                                        {{ number_format($auction->lowBids(), 2, ',', '.') }}{{ $gs->currency_sign }}
                                    @endif
                                </h3>
                            </li>
                            {{-- <li>
                                <span class="details">Buyer's Premium</span>
                                <h5 class="info">10.00%</h5>
                            </li> --}}
                            {{-- <li>
                                <span class="details">Bid Increment (US)</span>
                                <h5 class="info">$50.00</h5>
                            </li> --}}
                        </ul>
                        @if (Carbon\Carbon::now($gs->time_zone)->format('Y-m-d') >= Carbon\Carbon::parse($auction->start_date)->format('Y-m-d') && Carbon\Carbon::now($gs->time_zone)->format('Y-m-d') <= Carbon\Carbon::parse($auction->end_date)->format('Y-m-d'))
                            <div class="product-bid-area">
                                @include('includes.form-success')

                                @if (Auth::check())
                                    @if ($auction->is_live)
                                        <form class="product-bid-form" id="bid-form-live"
                                            action="{{ route('bid.store') }}" method="POST">
                                            @csrf
                                            <div class="search-icon">
                                                <img src="{{ asset('assets/front-new/images/product/search-icon.png') }}"
                                                    alt="product">
                                            </div>
                                            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                                            <input type="hidden" name="auction_id" value="{{ $auction->id }}">
                                            <input type="text" min="{{ $auction->highBid() + $gs->bid_increase }}"
                                                value="{{ $auction->highBid() + $gs->bid_increase }}" name="bid_amount"
                                                placeholder="{{ __('Enter your bit amout') }}" required>
                                            <button type="submit"
                                                class="custom-button">{{ __('Place Bid Now') }}</button>
                                        </form>
                                        <div class="container my-2">
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="card card-bidders">
                                                        <div class="card-body">
                                                            <div class="mb-4">
                                                                @if (Carbon\Carbon::now($gs->time_zone)->format('Y-m-d') >= Carbon\Carbon::parse($auction->start_date)->format('Y-m-d'))
                                                                    <h5>{{ __('Ends in') }}:</h5>
                                                                    <div class="__coundown text-brand"
                                                                        data-date="{{ Carbon\Carbon::parse($auction->end_date)->format('M d,Y H:i:s') }}">
                                                                        <span>{{ __('Left') }}</span>
                                                                    </div>
                                                                @endif
                                                            </div>
                                                            <div id="bidders-container" class="bidders-wrapper"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @else
                                        <form class="product-bid-form" id="bid-form" action="{{ route('bid.store') }}"
                                            method="POST">
                                            @csrf
                                            <div class="search-icon">
                                                <img src="{{ asset('assets/front-new/images/product/search-icon.png') }}"
                                                    alt="product">
                                            </div>
                                            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                                            <input type="hidden" name="auction_id" value="{{ $auction->id }}">
                                            <input type="text" min="{{ $auction->highBid() + $gs->bid_increase }}"
                                                value="{{ $auction->highBid() + $gs->bid_increase }}" name="bid_amount"
                                                placeholder="{{ __('Enter your bit amout') }}" required>
                                            <button type="submit"
                                                class="custom-button">{{ __('Place Bid Now') }}</button>
                                        </form>
                                    @endif
                                @else
                                    <a href="{{ route('user.login') }}"
                                        class="custom-button">{{ __('Login to Bid') }}</a>
                                @endif
                            </div>
                        @endif
                        <div class="buy-now-area">
                            {{-- <a href="#0" class="custom-button">Buy Now: $4,200</a> --}}
                            {{-- <a href="#0" class="rating custom-button active border"><i class="fas fa-star"></i> Add
                                to Wishlist</a> --}}
                            <div class="share-area a2a_kit a2a_kit_size_32">
                                <span>{{ __('Share to') }}:</span>
                                <ul>
                                    <li>
                                        <a class="a2a_button_facebook"><i class="fab fa-facebook-f"></i></a>
                                    </li>
                                    <li>
                                        <a class="a2a_button_twitter"><i class="fab fa-twitter"></i></a>
                                    </li>
                                    <li>
                                        <a class="a2a_button_linkedin"><i class="fab fa-linkedin-in"></i></a>
                                    </li>
                                    <li>
                                        <a class="a2a_button_whatsapp"><i class="fab fa-whatsapp"></i></a>
                                    </li>
                                    <li class="d-none">
                                        <a class="a2a_dd" href="https://www.addtoany.com/share"></a>
                                    </li>
                                </ul>
                                <script async src="https://static.addtoany.com/menu/page.js"></script>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="product-sidebar-area">
                        <div class="product-single-sidebar mb-3">
                            <h6 class="title">This Auction Ends in:</h6>
                            <div class="countdown">
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
                            <div class="side-counter-area">
                                <div class="side-counter-item">
                                    <div class="thumb">
                                        <img src="{{ asset('assets/front-new/images/product/icon1.png') }}"
                                            alt="product">
                                    </div>
                                    <div class="content">
                                        <h3 class="count-title"><span
                                                class="counter counter-bids">{{ $auction->bids->count() }}</span>
                                        </h3>
                                        <p>{{ __('Active Bidders') }}</p>
                                    </div>
                                </div>
                                <div class="side-counter-item">
                                    <div class="thumb">
                                        <img src="{{ asset('assets/front-new/images/product/icon2.png') }}"
                                            alt="product">
                                    </div>
                                    <div class="content">
                                        <h3 class="count-title"><span id="couter-views"
                                                class="counter">{{ $auction->views }}</span></h3>
                                        <p>{{ __('Watching') }}</p>
                                    </div>
                                </div>
                                <div class="side-counter-item">
                                    <div class="thumb">
                                        <img src="{{ asset('assets/front-new/images/product/icon3.png') }}"
                                            alt="product">
                                    </div>
                                    <div class="content">
                                        <h3 class="count-title"><span id="counter-bids-total"
                                                class="counter">{{ '0' }}</span>
                                        </h3>
                                        <p>{{ __('Total Bids') }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- <a href="#0" class="cart-link">View Shipping, Payment & Auction Policies</a> --}}
                    </div>
                </div>
            </div>
        </div>
        <div class="product-tab-menu-area mb-40-60 mt-70-100">
            <div class="container">
                <ul class="product-tab-menu nav nav-tabs">
                    <li>
                        <a href="#details" class="active" data-toggle="tab">
                            <div class="thumb">
                                <img src="{{ asset('assets/front-new/images/product/tab1.png') }}" alt="product">
                            </div>
                            <div class="content">Description</div>
                        </a>
                    </li>
                    {{-- <li>
                        <a href="#delevery" data-toggle="tab">
                            <div class="thumb">
                                <img src="{{ asset('assets/front-new/images/product/tab2.png') }}" alt="product">
                            </div>
                            <div class="content">Delivery Options</div>
                        </a>
                    </li> --}}
                    <li>
                        <a href="#history" data-toggle="tab">
                            <div class="thumb">
                                <img src="{{ asset('assets/front-new/images/product/tab3.png') }}" alt="product">
                            </div>
                            <div class="content">Bid History ({{ count($auction->bids) }})</div>
                        </a>
                    </li>
                    {{-- <li>
                        <a href="#questions" data-toggle="tab">
                            <div class="thumb">
                                <img src="{{ asset('assets/front-new/images/product/tab4.png') }}" alt="product">
                            </div>
                            <div class="content">Questions </div>
                        </a>
                    </li> --}}
                </ul>
            </div>
        </div>
        <div class="container">
            <div class="tab-content">
                <div class="tab-pane fade show active" id="details">
                    <div class="tab-details-content">
                        <div class="header-area">
                            <h3 class="title">{{ __($auction->title) }}</h3>
                            <div class="item">
                                <table class="product-info-table">
                                    <tbody>
                                        <tr>
                                            <th>{{ __('Condition') }}</th>
                                            <td>{{ __($auction->conditions) }}</td>
                                        </tr>
                                        <tr>
                                            <th>{{ __('Highest Bid') }}</th>
                                            <td>
                                                @if ($gs->currency_format == 0)
                                                    {{ $auction->highBids() }}
                                                @else
                                                    {{ $auction->highBids() }}
                                                @endif
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="item">
                                {!! $auction->descriptions !!}
                            </div>
                        </div>
                    </div>
                </div>
                {{-- <div class="tab-pane fade show" id="delevery">
                    <div class="shipping-wrapper">
                        <div class="item">
                            <h5 class="title">shipping</h5>
                            <div class="table-wrapper">
                                <table class="shipping-table">
                                    <thead>
                                        <tr>
                                            <th>Available delivery methods </th>
                                            <th>Price</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Customer Pick-up (within 10 days)</td>
                                            <td>$0.00</td>
                                        </tr>
                                        <tr>
                                            <td>Standard Shipping (5-7 business days)</td>
                                            <td>Not Applicable</td>
                                        </tr>
                                        <tr>
                                            <td>Expedited Shipping (2-4 business days)</td>
                                            <td>Not Applicable</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="item">
                            <h5 class="title">Notes</h5>
                            <p>Please carefully review our shipping and returns policy before committing to a bid.
                                From time to time, and at its sole discretion, Sbidu may change the prevailing fee
                                structure for shipping and handling.</p>
                        </div>
                    </div>
                </div> --}}
                <div class="tab-pane fade show" id="history">
                    <div class="history-wrapper">
                        <div class="item">
                            <h5 class="title">Bid History</h5>
                            <div class="history-table-area">
                                <table class="history-table">
                                    <thead>
                                        <tr>
                                            <th>{{ __('Bidder') }}</th>
                                            <th>{{ __('Bid Amount') }}</th>
                                            <th>{{ __('Date') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($auction->bids()->orderBy('bid_amount', 'desc')->get() as $bid)
                                            <tr>
                                                <td>{{ Str::upper($bid->user->customer_number) }}</td>
                                                @if ($gs->currency_format == 0)
                                                    <td>{{ $gs->currency_sign }}{{ number_format($bid->bid_amount, 2, ',', '.') }}
                                                    </td>
                                                @else
                                                    <td>{{ number_format($bid->bid_amount, 2, ',', '.') }}{{ $gs->currency_sign }}
                                                    </td>
                                                @endif
                                                <td>{{ $bid->updated_at->diffForhumans() }}</td>
                                            </tr>
                                        @empty
                                            <p>
                                                {{ __('It looks like there are currently no bidders.') }}
                                                <strong>{{ __('Be the first to bid.') }}</strong>
                                            </p>
                                        @endforelse
                                    </tbody>
                                </table>
                                {{-- <div class="text-center mb-3 mt-4">
                                    <a href="#0" class="button-3">Load More</a>
                                </div> --}}
                            </div>
                        </div>
                    </div>
                </div>
                {{-- <div class="tab-pane fade show" id="questions">
                    <h5 class="faq-head-title">Frequently Asked Questions</h5>
                    <div class="faq-wrapper">
                        <div class="faq-item">
                            <div class="faq-title">
                                <img src="{{ asset('assets/front-new/ css/img/faq.png') }}" alt="css"><span
                                    class="title">How to start
                                    bidding?</span><span class="right-icon"></span>
                            </div>
                            <div class="faq-content">
                                <p>All successful bidders can confirm their winning bid by checking the “Sbidu”. In
                                    addition, all successful bidders will receive an email notifying them of their
                                    winning bid after the auction closes.</p>
                            </div>
                        </div>
                        <div class="faq-item">
                            <div class="faq-title">
                                <img src="{{ asset('assets/front-new/ css/img/faq.png') }}" alt="css"><span
                                    class="title">Security
                                    Deposit / Bidding Power </span><span class="right-icon"></span>
                            </div>
                            <div class="faq-content">
                                <p>All successful bidders can confirm their winning bid by checking the “Sbidu”. In
                                    addition, all successful bidders will receive an email notifying them of their
                                    winning bid after the auction closes.</p>
                            </div>
                        </div>
                        <div class="faq-item">
                            <div class="faq-title">
                                <img src="{{ asset('assets/front-new/ css/img/faq.png') }}" alt="css"><span
                                    class="title">Delivery time
                                    to the destination port </span><span class="right-icon"></span>
                            </div>
                            <div class="faq-content">
                                <p>All successful bidders can confirm their winning bid by checking the “Sbidu”. In
                                    addition, all successful bidders will receive an email notifying them of their
                                    winning bid after the auction closes.</p>
                            </div>
                        </div>
                        <div class="faq-item">
                            <div class="faq-title">
                                <img src="{{ asset('assets/front-new/ css/img/faq.png') }}" alt="css"><span
                                    class="title">How to
                                    register to bid in an auction?</span><span class="right-icon"></span>
                            </div>
                            <div class="faq-content">
                                <p>All successful bidders can confirm their winning bid by checking the “Sbidu”. In
                                    addition, all successful bidders will receive an email notifying them of their
                                    winning bid after the auction closes.</p>
                            </div>
                        </div>
                        <div class="faq-item open active">
                            <div class="faq-title">
                                <img src="{{ asset('assets/front-new/ css/img/faq.png') }}" alt="css"><span
                                    class="title">How will I
                                    know if my bid was successful?</span><span class="right-icon"></span>
                            </div>
                            <div class="faq-content">
                                <p>All successful bidders can confirm their winning bid by checking the “Sbidu”. In
                                    addition, all successful bidders will receive an email notifying them of their
                                    winning bid after the auction closes.</p>
                            </div>
                        </div>
                        <div class="faq-item">
                            <div class="faq-title">
                                <img src="{{ asset('assets/front-new/ css/img/faq.png') }}" alt="css"><span
                                    class="title">What happens
                                    if I bid on the wrong lot?</span><span class="right-icon"></span>
                            </div>
                            <div class="faq-content">
                                <p>All successful bidders can confirm their winning bid by checking the “Sbidu”. In
                                    addition, all successful bidders will receive an email notifying them of their
                                    winning bid after the auction closes.</p>
                            </div>
                        </div>
                    </div>
                </div> --}}
            </div>
        </div>
        </div>
    </section>
    {{-- ============ Product Details Section Ends Here ============ --}}

@endsection

@section('scripts')
    <script>
        if (document.getElementById('bidders-container')) {
            var ls = localStorage;

            setInterval(getBidders, 1000)

            function getBidders() {
                $.ajax({
                    method: "GET",
                    url: "{{ route('auction.bidders', $auction->id) }}",
                    dataType: 'json',
                    success: function(res) {

                        if (undefined === res.data || !res.data.length) {
                            ls.setItem('_xxqbidders', '');
                        }

                        if (undefined !== res.data && res.data.length) {
                            if (null === ls.getItem('_xxqbidders') || '' === ls.getItem('_xxqbidders')) {
                                ls.setItem('_xxqbidders', JSON.stringify(res.data));
                            }

                            if (null !== ls.getItem('_xxqbidders') || '' !== ls.getItem('_xxqbidders')) {

                                var lBidders = JSON.parse(ls.getItem('_xxqbidders'));

                                if (res.data[0].id !== lBidders[0].id) {
                                    ls.setItem('_xxqbidders', JSON.stringify(res.data));
                                }

                                lBidders = JSON.parse(ls.getItem('_xxqbidders'));

                                lBidders.sort(function(a, b) {
                                    return a.amount_unf - b.amount_unf;
                                })

                                lBidders.forEach(function(bidder, index) {
                                    var html =
                                        '<div id="' + bidder.uid +
                                        '" class="mx-auto bidder d-flex justify-content-between align-items-center">';
                                    html += '<span class="bidder-name"><b>' + bidder.name +
                                        '</b></span>';
                                    html +=
                                        ' <span class="bidder-amount badge badge-secondary">' +
                                        bidder
                                        .amount +
                                        '</span>';
                                    html += '</div>';

                                    if (document.getElementById(bidder.uid)) {
                                        // $('#bidders-container').find('#' + bidder.uid).find(
                                        //     '.bidder-amount').text(bidder
                                        //     .amount);
                                        $('#bidders-container').find('#' + bidder.uid).fadeOut(800);
                                        $('#bidders-container').find('#' + bidder.uid).remove();
                                    }

                                    if (!document.getElementById(bidder.uid)) {
                                        $('#bidders-container').prepend(html);
                                    }
                                });
                            }
                        }

                        $('#counter-bids-total').text(res.count)
                    }
                });
            }
        }
    </script>

    {{-- Views Counter Update Starts --}}
    <script>
        if (document.getElementById('couter-views')) {
            setInterval(getViewsCount, 1000)

            function getViewsCount() {
                $.ajax({
                    method: "GET",
                    url: "{{ route('auction.views.count', $auction->id) }}",
                    success: function(count) {
                        document.getElementById('couter-views').innerText = count;
                    }
                });
            }
        }
    </script>
    {{-- Views Counter Update Ends --}}

    {{-- Bids Counter Update Starts --}}
    <script>
        if (document.getElementsByClassName('counter-bids')) {
            setInterval(getBidsCount, 1000)

            function getBidsCount() {
                $.ajax({
                    method: "GET",
                    url: "{{ route('auction.bids.count', $auction->id) }}",
                    success: function(count) {
                        $('.counter-bids').each(function(i, el) {
                            $(el).text(count);
                        });
                    }
                });
            }
        }
    </script>
    {{-- Bids Counter Update Ends --}}

    <script>
        if (document.getElementById('bid-form-live')) {
            var bidFormLive = $('#bid-form-live');
            bidFormLive.on('submit', function(e) {
                e.preventDefault();
                var id = bidFormLive.find('input[name="user_id"]');
                var id2 = bidFormLive.find('input[name="auction_id"]');
                var amt = bidFormLive.find('input[name="bid_amount"]');
                $.ajax({
                    method: "POST",
                    url: "{{ route('bid.store.async') }}",
                    data: {
                        uid: bidFormLive.find('input[name="user_id"]').val(),
                        aid: bidFormLive.find('input[name="auction_id"]').val(),
                        amt: bidFormLive.find('input[name="bid_amount"]').val(),
                        _token: "{{ csrf_token() }}"
                    },
                    success: function(res) {
                        var options = {};
                        if ('failure' === res.status) {
                            toastr.error(res.message, '', options);
                        } else {
                            toastr.success(res.message, '', options);
                        }
                    }
                });
            });
        }
    </script>
@endsection
