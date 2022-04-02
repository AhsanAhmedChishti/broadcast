@extends('layouts.front')

@section('styles')
    <link rel="stylesheet" href="{{ asset('assets/admin/css/datetimepicker.css') }}">
@endsection

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
                    <a href="{{ route('user-auction-index') }}">{{ __('Auctions') }}</a>
                </li>
                <li>
                    <span>{{ __('Payment') }}</span>
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
                    @include('layouts.partials.seller.alert-message')
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="dash-pro-item mb-30 dashboard-widget">
                                <div class="dashboard-title mb-30">
                                    <h5 class="title">{{ __('Payment') }}</h5>
                                </div>
                                <div class="product-description">
                                    <div class="body-area">
                                        <form action="" id="payment-form" method="POST">

                                            {{ csrf_field() }}
                                            <div class="table-responsive" id="payment-table">
                                                <table class="table table-condensed">
                                                    <tbody>
                                                        <tr>
                                                            <th class="auction-details-heading" style="border-top: 0;">
                                                                {{ __('Name') }}:</th>
                                                            <td style="border-top: 0;">{{ $data->title }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th class="auction-details-heading">
                                                                {{ __('Category') }}:</th>
                                                            <td>{{ $data->category->title }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th class="auction-details-heading">
                                                                {{ __('Type') }}:</th>
                                                            <td>{!! $data->is_featured == 1 ? '<span class="badge badge-primary">Featured</span>' : '<span class="badge badge-secondary">Basic</span>' !!}</td>
                                                        </tr>
                                                        <tr>
                                                            <th class="auction-details-heading">
                                                                {{ __('Condition') }}:</th>
                                                            <td>{{ $data->conditions }}</td>
                                                        </tr>

                                                        <tr>
                                                            <th class="auction-details-heading">
                                                                {{ __('Amount') }}:</th>
                                                            @php
                                                                $feature = 0;
                                                                if ($data->is_featured == 1) {
                                                                    $feature = $gs->feature_price;
                                                                }
                                                                $main_price = $gs->auction_pay;
                                                                if (Auth::user()->is_featured == 1) {
                                                                    $dis = $main_price * ($gs->feature_discount / 100);
                                                                    $main_price = $main_price - $dis;
                                                                }
                                                                if (Auth::user()->is_featured == 1) {
                                                                    $dis = $main_price * ($gs->feature_discount / 100);
                                                                    $main_price = $main_price - $dis;
                                                                }

                                                                $fee = ($main_price + $feature) * ($gs->payment_fee / 100);
                                                                $vat = ($main_price + $feature + $fee) * ($gs->auction_vat / 100);
                                                                $amount = $main_price + $feature + $fee + $vat;

                                                                if (Auth::user()->is_charity == 1) {
                                                                    $dis = $amount * ($gs->charity_discount / 100);
                                                                    $amount = $amount - $dis;
                                                                }

                                                            @endphp

                                                            <td>{{ $gs->currency_format == 0? $gs->currency_sign . number_format($amount, 2, ',', '.'): number_format($amount, 2, ',', '.') . $gs->currency_sign }}
                                                            </td>
                                                        </tr>


                                                        <tr>
                                                            <th class="auction-details-heading">
                                                                {{ __('Payment Method') }}:</th>
                                                            <td>
                                                                <div class="col-lg-11 mt-3">
                                                                    <div class="form-group">
                                                                        <select class="form-control" id="method"
                                                                            name="method" required="">
                                                                            <option value="">
                                                                                {{ __('Select a payment method') }}
                                                                            </option>
                                                                            <option value="Paypal">
                                                                                {{ __('Paypal') }}</option>
                                                                            <option value="Stripe">
                                                                                {{ __('Stripe') }}</option>
                                                                            <option value="Coinbase">
                                                                                {{ __('Crypto') }}</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <th class="auction-details-heading"></th>
                                                            <td>


                                                                <div id="card-view" class="col-lg-11  d-none">

                                                                    <div class="form-group mt-3">
                                                                        <label
                                                                            class="control-label">{{ __('Enter Credit Card Details') }}</label>
                                                                    </div>

                                                                    <div class="row">

                                                                        <input type="hidden" name="cmd" value="_xclick">
                                                                        <input type="hidden" name="no_note" value="1">
                                                                        <input type="hidden" name="lc" value="UK">
                                                                        <input type="hidden" name="currency_code"
                                                                            value="{{ $gs->currency_code }}">
                                                                        <input type="hidden" name="bn"
                                                                            value="PP-BuyNowBF:btn_buynow_LG.gif:NonHostedGuest">

                                                                        <div class="col-lg-6 mb-3">
                                                                            <input type="text"
                                                                                class="form-control card-elements"
                                                                                placeholder="{{ __('Card Number') }}"
                                                                                name="card">
                                                                        </div>
                                                                        <div class="col-lg-6 mb-3">
                                                                            <input type="text"
                                                                                class="form-control card-elements"
                                                                                placeholder="{{ __('Cvv') }}"
                                                                                name="cvv">
                                                                        </div>
                                                                        <div class="col-lg-6 mb-3">
                                                                            <input type="text"
                                                                                class="form-control card-elements"
                                                                                placeholder="{{ __('Month') }}"
                                                                                name="month">
                                                                        </div>
                                                                        <div class="col-lg-6 mb-3">
                                                                            <input type="text"
                                                                                class="form-control card-elements"
                                                                                placeholder="{{ __('Year') }}"
                                                                                name="year">
                                                                        </div>
                                                                        <input type="hidden" name="currency_sign"
                                                                            value="{{ $gs->currency_sign }}">
                                                                        <input type="hidden" name="total"
                                                                            value="{{ $amount }}">
                                                                        <input type="hidden" name="auction_id"
                                                                            value="{{ $data->id }}">
                                                                        <input type="hidden" name="bid_id" value="0">

                                                                        <input type="hidden" name="user_id"
                                                                            value="{{ Auth::user()->id }}">
                                                                        <input type="hidden" name="customer_name"
                                                                            value="{{ Auth::user()->first_name . ' ' . Auth::user()->last_name }}">
                                                                        <input type="hidden" name="customer_email"
                                                                            value="{{ Auth::user()->email }}">
                                                                        <input type="hidden" name="customer_phone"
                                                                            value="{{ Auth::user()->phone }}">
                                                                        <input type="hidden" name="customer_address"
                                                                            value="{{ Auth::user()->address }}">
                                                                        <input type="hidden" name="customer_city"
                                                                            value="{{ Auth::user()->city }}">
                                                                        <input type="hidden" name="customer_zip"
                                                                            value="{{ Auth::user()->zip }}">


                                                                        <input type="hidden" name="seller_opening_fee"
                                                                            value="{{ $gs->auction_pay }}">
                                                                        <input type="hidden" name="seller_feature_amount"
                                                                            value="{{ $feature }}">
                                                                        <input type="hidden" name="seller_payment_fee"
                                                                            value="{{ $fee }}">
                                                                        <input type="hidden" name="seller_vat"
                                                                            value="{{ $vat }}">

                                                                    </div>

                                                                </div>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <th style="border-top: 0;"></th>
                                                            <td style="border-top: 0;">
                                                                <div class="form-group">
                                                                    <button type="submit"
                                                                        class="addProductSubmit-btn custom-button">{{ __('Submit') }}</button>
                                                                </div>
                                                            </td>
                                                        </tr>

                                                    </tbody>
                                                </table>
                                            </div>

                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{-- ============ Dashboard Section Ends Here ============ --}}

@endsection


@section('scripts')
    <script type="text/javascript">
        $('#method').on('change', function() {
            var val = $(this).val();
            if (val == 'Stripe') {
                $('#payment-form').prop('action', '{{ route('auction.stripe.submit') }}');
                $('#card-view').removeClass('d-none');
                $('.card-elements').prop('required', true);
            } else if (val == 'Paypal') {
                $('#payment-form').prop('action', '{{ route('auction.paypal.submit') }}');
                $('#card-view').addClass('d-none');
                $('.card-elements').prop('required', false);
            } else if (val == 'Coinbase') {
                $('#payment-form').prop('action', '{{ route('auction.coinbase.submit') }}');
                $('#card-view').addClass('d-none');
                $('.card-elements').prop('required', false);
            }
        });
    </script>
@endsection
