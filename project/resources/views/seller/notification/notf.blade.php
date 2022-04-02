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
                    <span>{{ __('My Alerts') }}</span>
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
                            <div class="dashboard-widget">
                                <div class="dashboard-title mb-30">
                                    <h5 class="title">{{ __('My Alerts') }}</h5>
                                </div>
                                @if (count($datas) > 0)
                                    <div class="alert-widget tab-pane show fade" id="newsletters">
                                        <ul>
                                            @foreach ($datas as $data)
                                                @if ($data->bid_id != null)
                                                    <li>
                                                        <h6 class="title">
                                                            {{ __('Someone Bids Higher Than You') }}
                                                        </h6>
                                                        <p> <a
                                                                href="{{ route('front.details', $data->bid->auction->slug) }}">
                                                                {{-- <i class="fas fa-gavel"></i> --}}
                                                                {{ __('Someone Bids Higher Than You') }}.</a>
                                                    </li>
                                                    </p>
                                                @endif

                                                @if ($data->auction_id != null)
                                                    <li>
                                                        {{-- <input type="checkbox" id="check1" checked=""> --}}
                                                        <label for="check1">
                                                            <h6 class="title">
                                                                {{ __('You Have a new Bid') }}
                                                            </h6>
                                                            <p><a
                                                                    href="{{ route('user-auction-show', $data->auction_id) }}">
                                                                    {{-- <i class="fas fa-newspaper"></i> --}}
                                                                    {{ __('You Have a new Bid') }}</a>
                                                            </p>
                                                        </label>
                                                    </li>
                                                @endif

                                            @endforeach
                                        </ul>
                                    </div>
                                @else
                                    <a class="clear" href="javascript:;">
                                        {{ __('No New Notification') }}(s).
                                    </a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{-- ============ Dashboard Section Ends Here ============ --}}
@endsection
