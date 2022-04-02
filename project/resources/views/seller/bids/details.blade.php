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
                    <a href="{{ route('user-bid-index') }}">{{ __('My Bids') }}</a>
                </li>
                <li>
                    <span>{{ __('Bid Details') }}</span>
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
                                    <h5 class="title">{{ __('Bid Details') }}</h5>
                                </div>
                                @include('includes.form-success')
                                <div class="product-description">
                                    <div class="body-area">

                                        <div class="table-responsive">
                                            <table class="table">
                                                <tbody>
                                                    <tr>
                                                        <th class="auction-details-heading" style="border-top: 0;">
                                                            {{ __('Name') }}:
                                                        </th>
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
                                                    <tr class="fimg">
                                                        <th class="auction-details-heading">
                                                            {{ __('Feature Image') }}:</th>
                                                        <td><img
                                                                src="{{ $data->photo ? asset('assets/images/auction/' . $data->photo) : asset('assets/images/noimage.png') }}">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th class="auction-details-heading">
                                                            {{ __('Description') }}:</th>
                                                        <td>{!! $data->descriptions !!}</td>
                                                    </tr>
                                                    <tr>
                                                        <th class="auction-details-heading">
                                                            {{ __('Start Date') }}:</th>
                                                        <td>{{ $data->start_date }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th class="auction-details-heading">
                                                            {{ __('End Date') }}:</th>
                                                        <td>{{ $data->end_date }}</td>
                                                    </tr>
                                                    @if ($data->buy_now != null)
                                                        <tr>
                                                            <th class="auction-details-heading">
                                                                {{ __('Buy Now Price') }}:</th>
                                                            @if ($gs->currency_format == 0)
                                                                <td>{{ $gs->currency_sign }}{{ number_format($data->buy_now, 2, ',', '.') }}
                                                                </td>
                                                            @else
                                                                <td>{{ number_format($data->buy_now, 2, ',', '.') }}{{ $gs->currency_sign }}
                                                                </td>
                                                            @endif
                                                        </tr>
                                                    @endif

                                                    <tr>
                                                        <th class="auction-details-heading">
                                                            {{ __('Start Bid Amount') }}:</th>
                                                        @if ($gs->currency_format == 0)
                                                            <td>{{ $gs->currency_sign }}{{ number_format($data->start_bid, 2, ',', '.') }}
                                                            </td>
                                                        @else
                                                            <td>{{ number_format($data->start_bid, 2, ',', '.') }}{{ $gs->currency_sign }}
                                                            </td>
                                                        @endif
                                                    </tr>


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
        </div>
    </section>
    {{-- ============ Dashboard Section Ends Here ============ --}}
@endsection
