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
                    <a href="{{ route('user-order-index') }}">{{ __('Payments') }}</a>
                </li>
                <li>
                    <span>{{ __('Payment Details') }}</span>
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
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="dash-pro-item mb-30 dashboard-widget">
                                <div class="dashboard-title mb-30">
                                    <h5 class="title">{{ __('Payment Details') }}</h5>
                                </div>
                                <div class="table-responsive show-table">
                                    <table class="table">
                                        <tr>
                                            <th style="border-top: 0;" width="50%">{{ __('Payment Number') }}</th>
                                            <td style="border-top: 0;">{{ $order->order_number }}</td>
                                        </tr>

                                        <tr>
                                            <th>{{ __('Auction') }}</th>
                                            <td>{{ $order->auction->title }}</td>
                                        </tr>

                                        <tr>
                                            <th>{{ __('Payment Method') }}</th>
                                            <td>{{ $order->method }}</td>
                                        </tr>

                                        @if ($order->bid_id != 0)
                                            <tr>
                                                <th>{{ __('Bid Price') }}</th>
                                                <td>{{ number_format($order->bid->bid_amount, 2, ',', '.') }}</td>
                                            </tr>
                                        @endif

                                        @if ($order->buyer_opening_fee != 0)
                                            <tr>
                                                <th>{{ __('Opening Fee') }}</th>
                                                <td>{{ number_format($order->buyer_opening_fee, 2, ',', '.') }}</td>
                                            </tr>
                                        @endif


                                        @if ($order->buyer_fee != 0)
                                            <tr>
                                                <th>{{ __('Fee') }} ({{ $gs->buyer_fee }}%)</th>
                                                <td>{{ number_format($order->buyer_fee, 2, ',', '.') }}</td>
                                            </tr>
                                        @endif


                                        @if ($order->buyer_payment_fee != 0)
                                            <tr>
                                                <th>{{ __('Payment Fee') }} ({{ $gs->buyer_payment_fee }}%)</th>
                                                <td>{{ number_format($order->buyer_payment_fee, 2, ',', '.') }}</td>
                                            </tr>
                                        @endif

                                        @if ($order->buyer_vat != 0)
                                            <tr>
                                                <th>{{ __('VAT') }} ({{ $gs->auction_vat }}%)</th>
                                                <td>{{ number_format($order->buyer_vat, 2, ',', '.') }}</td>
                                            </tr>
                                        @endif



                                        @if ($order->seller_opening_fee != 0)
                                            <tr>
                                                <th>{{ __('Opening Fee') }}</th>
                                                <td>{{ number_format($order->seller_opening_fee, 2, ',', '.') }}</td>
                                            </tr>
                                        @endif
                                        @if ($order->seller_feature_amount != 0)
                                            <tr>
                                                <th>{{ __('Feature Auction Amount') }}</th>
                                                <td>{{ number_format($order->seller_feature_amount, 2, ',', '.') }}</td>
                                            </tr>
                                        @endif
                                        @if ($order->seller_payment_fee != 0)
                                            <tr>
                                                <th>{{ __('Payment Fee') }} ({{ $gs->payment_fee }}%)</th>
                                                <td>{{ number_format($order->seller_payment_fee, 2, ',', '.') }}</td>
                                            </tr>
                                        @endif
                                        @if ($order->seller_vat != 0)
                                            <tr>
                                                <th>{{ __('VAT') }} ({{ $gs->auction_vat }}%)</th>
                                                <td>{{ number_format($order->seller_vat, 2, ',', '.') }}</td>
                                            </tr>
                                        @endif
                                        <tr>
                                            <th>{{ __('Total Cost') }}</th>
                                            <td>{{ number_format($order->pay_amount, 2, ',', '.') }}</td>
                                        </tr>
                                        <tr>
                                            <th>{{ __('Transaction ID') }}</th>
                                            <td>{{ $order->txnid }}</td>
                                        </tr>
                                        @if ($order->charge_id != null)
                                            <tr>
                                                <th>{{ __('Charge ID') }}</th>
                                                <td>{{ $order->charge_id }}</td>
                                            </tr>
                                        @endif
                                        <tr>
                                            <th>{{ __('Payment Status') }}</th>
                                            <td>{{ $order->payment_status }}</td>
                                        </tr>

                                        <tr>
                                            <th>{{ __('Customer Email') }}</th>
                                            <td>{{ $order->customer_email }}</td>
                                        </tr>

                                        <tr>
                                            <th>{{ __('Customer Name') }}</th>
                                            <td>{{ $order->customer_name }}</td>
                                        </tr>


                                        <tr>
                                            <th>{{ __('Customer Phone') }}</th>
                                            <td>{{ $order->customer_phone }}</td>
                                        </tr>

                                        <tr>
                                            <th>{{ __('Customer Address') }}</th>
                                            <td>{{ $order->customer_address }}</td>
                                        </tr>
                                        <tr>
                                            <th>{{ __('Customer City') }}</th>
                                            <td>{{ $order->customer_city }}</td>
                                        </tr>

                                        <tr>
                                            <th>{{ __('Customer Zip') }}</th>
                                            <td>{{ $order->customer_zip }}</td>
                                        </tr>


                                        <tr>
                                            <th>{{ __('Paid at') }}</th>
                                            <td>{{ date('d M. Y, H:i', strtotime($order->created_at)) }}</td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                            <a class="mybtn1 custom-button" target="_blank"
                                href="{{ route('user-order-print', $order->id) }}">
                                {{ __('Print') }}
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{-- ============ Dashboard Section Ends Here ============ --}}
@endsection
