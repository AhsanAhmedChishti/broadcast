@extends('layouts.front')

@section('content')

    <!-- Breadcrumb Area Start -->
    <div class="breadcrumb-area"
        style="background: url({{ $gs->breadcumb_banner ? asset('assets/images/' . $gs->breadcumb_banner) : asset('assets/images/noimage.png') }});">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="pagetitle">
                        {{ $auction->title }}
                    </h1>

                    <ul class="pages">

                        <li>
                            <a href="{{ route('front.index') }}">
                                {{ __('Home') }}
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('front.details', $auction->slug) }}">
                                {{ $auction->title }}
                            </a>
                        </li>

                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Area End -->

    <!-- Categori Area Start -->
    <section class="details-page">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    @include('includes.form-success')
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="one-item-slider">

                                <div class="item">
                                    <img src="{{ asset('assets/images/auction/' . $auction->photo) }}" alt="">
                                </div>
                                @foreach ($auction->galleries as $item)
                                    <div class="item">
                                        <img src="{{ asset('assets/images/galleries/' . $item->photo) }}" alt="">
                                    </div>
                                @endforeach
                            </div>
                            <ul class="all-item-slider">
                                <li><img src="{{ asset('assets/images/auction/' . $auction->photo) }}" alt=""></li>
                                @foreach ($auction->galleries as $item)
                                    <li><img src="{{ asset('assets/images/galleries/' . $item->photo) }}" alt=""></li>
                                @endforeach
                            </ul>
                        </div>

                        <div class="col-lg-12">
                            <div class="details-tab">
                                <ul class="nav nav-tabs" id="myTab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="description-tab" data-toggle="tab"
                                            href="#description" role="tab" aria-controls="description" aria-selected="true">
                                            {{ __('Description') }} </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="bidhistory-tab" data-toggle="tab" href="#bidhistory"
                                            role="tab" aria-controls="bidhistory"
                                            aria-selected="false">{{ __('Bid History') }}</a>
                                    </li>
                                </ul>
                                <div class="tab-content" id="myTabContent">
                                    <div class="tab-pane fade show active" id="description" role="tabpanel"
                                        aria-labelledby="description-tab">
                                        <div class="main-content">
                                            <p>
                                                {!! $auction->descriptions !!}
                                            </p>

                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="bidhistory" role="tabpanel"
                                        aria-labelledby="bidhistory-tab">
                                        <div class="main-content">

                                            <div class="table-responsive">
                                                <table id="bid-table" class="table table-hover" cellspacing="0"
                                                    style="width:100%;">
                                                    <thead>
                                                        <tr>
                                                            <th>{{ __('Bidder') }}</th>
                                                            <th>{{ __('Bid Amount') }}</th>
                                                            <th>{{ __('Date') }}</th>
                                                        </tr>
                                                    <tbody id="single-auction">
                                                        @foreach ($auction->bids()->orderBy('bid_amount', 'desc')->get()
        as $bid)
                                                            <tr>
                                                                <td>{{ $bid->user->customer_number }}</td>
                                                                @if ($gs->currency_format == 0)
                                                                    <td>{{ $gs->currency_sign }}{{ number_format($bid->bid_amount, 2, ',', '.') }}
                                                                    </td>
                                                                @else
                                                                    <td>{{ number_format($bid->bid_amount, 2, ',', '.') }}{{ $gs->currency_sign }}
                                                                    </td>
                                                                @endif
                                                                <td>{{ $bid->updated_at->diffForhumans() }}</td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-lg-4">
                    @if ($auction->status != 0)
                        <div class="bid-details-info">
                            <ul class="info-list">
                                <li>
                                    <p>
                                        <strong>
                                            {{ __('Case#') }}:
                                        </strong>
                                    </p>
                                    <p>
                                        {{ $auction->id }}
                                    </p>
                                </li>
                                <li>
                                    <p>
                                        <strong>
                                            {{ __('Created By') }}:
                                        </strong>
                                    </p>
                                    <p>
                                        @if ($auction->user_id != 0)
                                            {{ $auction->user->customer_number }}
                                        @else
                                            {{ __('Admin') }}
                                        @endif

                                    </p>
                                </li>
                                @if ($auction->user_id != 0)
                                    <li>
                                        <p>
                                            <strong>
                                                {{ __('Postcode') }}:
                                            </strong>
                                        </p>
                                        <p>
                                            {{ $auction->user->zip }}
                                        </p>
                                    </li>
                                    <li>
                                        <p>
                                            <strong>
                                                {{ __('City') }}:
                                            </strong>
                                        </p>
                                        <p>
                                            {{ $auction->user->city }}
                                        </p>
                                    </li>
                                @endif
                                <li>
                                    <p>
                                        <strong>
                                            {{ __('Condition') }}:
                                        </strong>
                                    </p>
                                    <p>
                                        {{ $auction->conditions }}
                                    </p>
                                </li>
                                <li>
                                    <p>
                                        <strong>
                                            {{ __('Highest BID') }}:
                                        </strong>
                                    </p>
                                    <p id="highest">
                                        @if ($gs->currency_format == 0)
                                            {{ $auction->highBids() }}
                                        @else
                                            {{ $auction->highBids() }}
                                        @endif
                                    </p>
                                </li>
                                @if ($auction->buy_now != null)
                                    @if ($auction->buy_now > $auction->highBid())
                                        <li>
                                            <p>
                                                <strong>
                                                    {{ __('Buy Now') }}:
                                                </strong>
                                            </p>
                                            <p>
                                                @if ($gs->currency_format == 0)
                                                    {{ $gs->currency_sign }}{{ number_format($auction->buy_now, 2, ',', '.') }}
                                                @else
                                                    {{ number_format($auction->buy_now, 2, ',', '.') }}{{ $gs->currency_sign }}
                                                @endif
                                            </p>
                                        </li>
                                    @endif
                                @endif
                            </ul>
                            <div class="bids-time">
                                <div class="exist option">
                                    <img src="#" alt="">
                                    <div class="number">
                                        <span>{{ count($auction->bids) }}</span>
                                        <p>
                                            {{ __('Bids') }}
                                        </p>
                                    </div>
                                </div>
                                <div class="time option">
                                    <div class="number">
                                        @if (Carbon\Carbon::now($gs->time_zone)->format('Y-m-d') < Carbon\Carbon::parse($auction->start_date)->format('Y-m-d'))
                                            <span class="countdown"
                                                data-date="{{ Carbon\Carbon::parse($auction->start_date)->format('M d,Y H:i:s') }}"></span>
                                            <p>{{ __('To Start') }}</p>
                                        @else
                                            <span class="countdown"
                                                data-date="{{ Carbon\Carbon::parse($auction->end_date)->format('M d,Y H:i:s') }}">{{ Carbon\Carbon::now($gs->time_zone)->diffInDays($auction->end_date) }}</span>
                                            <p>
                                                {{ __('Left') }}
                                            </p>
                                        @endif

                                    </div>
                                </div>
                            </div>

                            <div class="place-bid-area">
                                @if (Carbon\Carbon::now($gs->time_zone)->format('Y-m-d') >= Carbon\Carbon::parse($auction->start_date)->format('Y-m-d') && Carbon\Carbon::now($gs->time_zone)->format('Y-m-d') <= Carbon\Carbon::parse($auction->end_date)->format('Y-m-d'))
                                    @if (Auth::check())

                                        <h4 class="title">
                                            {{ __('Amount') }}({{ $gs->currency_code }}):
                                        </h4>

                                        <form id="bid-form" action="{{ route('bid.store') }}" method="POST">
                                            {{ csrf_field() }}
                                            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                                            <input type="hidden" name="auction_id" value="{{ $auction->id }}">
                                            <input type="number" min="{{ $auction->highBid() + $gs->bid_increase }}"
                                                value="{{ $auction->highBid() + $gs->bid_increase }}" name="bid_amount"
                                                placeholder="{{ __('Enter Your Amount') }}" required="">
                                            <button type="submit">{{ __('Place Bid Now') }}</button>

                                        </form>

                                    @else
                                        <button type="button" class="login-button" href="javascript:;" data-toggle="modal"
                                            data-target="#log-reg">{{ __('Login To Bid') }}</button>

                                    @endif

                                @endif

                            </div>

                            <div class="social-area">
                                <h4 class="title">
                                    {{ __('Share') }}:
                                </h4>
                                <div class="social-sharing a2a_kit a2a_kit_size_32">
                                    <ul class="social-list">
                                        <li>
                                            <a class="facebook a2a_button_facebook" href="">
                                                <i class="fab fa-facebook-f"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a class="twitter a2a_button_twitter" href="">
                                                <i class="fab fa-twitter"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a class="linkedin a2a_button_linkedin" href="">
                                                <i class="fab fa-linkedin-in"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a class="pinterest a2a_button_pinterest" href="">
                                                <i class="fab fa-pinterest-p"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a class="a2a_dd plus" href="https://www.addtoany.com/share">
                                                <i class="fas fa-plus"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <script async src="https://static.addtoany.com/menu/page.js"></script>
                            </div>
                        </div>
                    @endif
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
                                                <div class="left">
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
            <div class="row">

                <div class="col-lg-12">
                    <div class="latest-auction">
                        <div class="header-area">
                            <h4 class="title">
                                {{ __('Related Auctions') }}
                            </h4>
                        </div>
                        <div class="row">

                            @if ($auction->category->auctions()->where('id', '!=', $auction->id)->count() > 0)

                                @foreach ($auction->category->auctions()->where('status', '=', 1)->where('id', '!=', $auction->id)->take(3)->get()
        as $item)
                                    @if (Carbon\Carbon::parse(Carbon\Carbon::now($gs->time_zone)->format('Y-m-d H:i:s'))->lt(Carbon\Carbon::parse($auction->end_date)))
                                        <div class="col-lg-4 col-md-4">
                                            <a href="{{ route('front.details', $item->slug) }}" class="single-auction">
                                                <div class="img">
                                                    <img src="{{ asset('assets/images/auction/' . $item->photo) }}"
                                                        alt="">
                                                </div>
                                                <div class="content">

                                                    <div class="price-area">
                                                        <span class="number left">
                                                            @if ($gs->currency_format == 0)
                                                                {{ $gs->currency_sign }}{{ number_format($item->lowBids(), 2, ',', '.') }}
                                                            @else
                                                                {{ number_format($item->lowBids(), 2, ',', '.') }}{{ $gs->currency_sign }}
                                                            @endif

                                                            <small class="label">{{ __('lowest') }} :</small>
                                                        </span>
                                                        <span class="number right">
                                                            <div>
                                                                @if ($gs->currency_format == 0)
                                                                    {{ $item->highBids() }}
                                                                @else
                                                                    {{ $item->highBids() }}
                                                                @endif
                                                            </div>

                                                            <small class="label">{{ __('Highest') }} :</small>
                                                        </span>
                                                    </div>
                                                    <h5 class="title">
                                                        {{ $item->title }}
                                                    </h5>
                                                    <ul class="bids-info">
                                                        <li>
                                                            <h6>{{ count($item->bids) }}</h6>
                                                            <p>{{ __('Bids') }}</p>
                                                        </li>
                                                        <li>
                                                            <h6>{{ $item->conditions }}</h6>
                                                            <p>{{ __('Condition') }}</p>
                                                        </li>
                                                        @if (Carbon\Carbon::now($gs->time_zone)->format('Y-m-d') < Carbon\Carbon::parse($item->start_date)->format('Y-m-d'))
                                                            <li>
                                                                <h6 class="countdown"
                                                                    data-date="{{ Carbon\Carbon::parse($item->start_date)->format('M d,Y H:i:s') }}">
                                                                </h6>
                                                                <p>{{ __('To Start') }}</p>
                                                            </li>
                                                        @else
                                                            <li>
                                                                <h6 class="countdown"
                                                                    data-date="{{ Carbon\Carbon::parse($item->end_date)->format('M d,Y H:i:s') }}">
                                                                </h6>
                                                                <p>{{ __('Left') }}</p>
                                                            </li>
                                                        @endif
                                                    </ul>
                                                </div>
                                            </a>
                                        </div>
                                    @endif
                                @endforeach

                            @else
                                <P>{{ __('Currently related auction not available.') }}</P>
                            @endif

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!--  Categori Area End -->



    @if (Auth::check())

        <!-- Buy Now Modal Start -->

        <div class="modal fade" id="payment-ck" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <button type="button" class="modal-close" data-dismiss="modal" aria-label="Close">
                        <i class="fas fa-times"></i>
                    </button>
                    <div class="modal-body">

                        <div class="dropdown-overlay"></div>


                        <div class="login-area">
                            <div class="header-area">
                                <h4 class="title">{{ __('Buy Now') }}</h4>
                                <h6>{{ $auction->title }}</h6>


                                @php

                                    $fee = ($auction->buy_now + $gs->buyer_pay_fee) * ($gs->buyer_fee / 100);
                                    $payment_fee = ($auction->buy_now + $gs->buyer_pay_fee + $fee) * ($gs->buyer_payment_fee / 100);
                                    $vat = ($auction->buy_now + $gs->buyer_pay_fee + $fee + $payment_fee) * ($gs->auction_vat / 100);
                                    $amount = $auction->buy_now + $gs->buyer_pay_fee + $fee + $payment_fee + $vat;

                                @endphp

                                <h6><b>{{ __('Amount') }}</b>:
                                    {{ $gs->currency_format == 0? $gs->currency_sign . number_format($amount, 2, ',', '.'): number_format($amount, 2, ',', '.') . $gs->currency_sign }}
                                </h6>
                            </div>


                            <div class="login-form signin-form">
                                <form action="{{ route('front.stripe.submit') }}" id="payment-form" method="POST">
                                    {{ csrf_field() }}

                                    <div class="row">

                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <input type="text" class="form-control "
                                                    placeholder="{{ __('Shipping Address') }}" name="shipping_address">
                                            </div>
                                        </div>

                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <input type="text" class="form-control "
                                                    placeholder="{{ __('City') }}" name="shipping_city">
                                            </div>
                                        </div>


                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <input type="text" class="form-control "
                                                    placeholder="{{ __('Postal Address') }}" name="shipping_zip">
                                            </div>
                                        </div>



                                    </div>




                                    <div id="card-view" class="row">

                                        <input type="hidden" name="cmd" value="_xclick">
                                        <input type="hidden" name="no_note" value="1">
                                        <input type="hidden" name="lc" value="UK">
                                        <input type="hidden" name="currency_code" value="{{ $gs->currency_code }}">
                                        <input type="hidden" name="bn" value="PP-BuyNowBF:btn_buynow_LG.gif:NonHostedGuest">





                                        <div class="col-lg-12">

                                            <div class="form-group">

                                                <input type="text" class="form-control card-elements"
                                                    placeholder="Card Number" name="card">

                                            </div>

                                        </div>

                                        <div class="col-lg-12">

                                            <div class="form-group">

                                                <input type="text" class="form-control card-elements" placeholder="Cvv"
                                                    name="cvv">

                                            </div>

                                        </div>

                                        <div class="col-lg-12">

                                            <div class="form-group">

                                                <input type="text" class="form-control card-elements" placeholder="Month"
                                                    name="month">

                                            </div>

                                        </div>

                                        <div class="col-lg-12">

                                            <div class="form-group">

                                                <input type="text" class="form-control card-elements" placeholder="Year"
                                                    name="year">

                                            </div>

                                        </div>

                                        <input type="hidden" name="currency_sign" value="{{ $gs->currency_sign }}">
                                        <input type="hidden" name="total" value="{{ $amount }}">
                                        <input type="hidden" name="auction_id" value="{{ $auction->id }}">
                                        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                                        <input type="hidden" name="customer_name"
                                            value="{{ Auth::user()->first_name . ' ' . Auth::user()->last_name }}">
                                        <input type="hidden" name="customer_email" value="{{ Auth::user()->email }}">
                                        <input type="hidden" name="customer_phone" value="{{ Auth::user()->phone }}">
                                        <input type="hidden" name="customer_address"
                                            value="{{ Auth::user()->address }}">
                                        <input type="hidden" name="customer_city" value="{{ Auth::user()->city }}">
                                        <input type="hidden" name="customer_zip" value="{{ Auth::user()->zip }}">


                                    </div>





                                    <button type="submit" class="submit-btn">{{ __('SUBMIT') }}</button>
                                </form>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>


        <!-- Buy Now Modal End -->

    @endif

@endsection

@section('scripts')

    <script type="text/javascript">
        $('.login-button').on('click', function() {
            $('#modal-hidden').val(1);
        });


        $(document).ready(function() {
            setInterval(function() {
                $('#single-auction').load('{{ route('front.single.details', $auction->id) }}');
            }, 5000);
        });
    </script>


@endsection
