@extends('layouts.user')

@section('content')

    <div class="content-area">
        <div class="mr-breadcrumb">
            <div class="row">
                <div class="col-lg-12">
                    <h4 class="heading">{{ __('Bid Details') }} <a class="add-btn"
                            href="{{ route('user-bid-index') }}"><i class="fas fa-arrow-left"></i> {{ __('Back') }}</a>
                    </h4>
                    <ul class="links">
                        <li>
                            <a href="{{ route('user.dashboard') }}">{{ __('Dashboard') }} </a>
                        </li>
                        <li>
                            <a href="javascript:;">{{ __('My Bids') }}</a>
                        </li>
                        <li>
                            <a href="javascript:;">{{ __('Bid Details') }}</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="add-product-content">
            <div class="row">
                <div class="col-lg-12">
                    <div class="product-description">
                        <div class="body-area">
                            <div class="gocover"
                                style="background: url({{ asset('assets/images/' . $gs->admin_loader) }}) no-repeat scroll center center rgba(45, 45, 45, 0.5);">
                            </div>

                            @include('includes.form-success')

                            <div class="row add_lan_tab justify-content-center">
                                <div class="col-lg-10">

                                    {{-- FRONTEND STARTS --}}

                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="product-description">
                                                <div class="body-area">

                                                    <div class="table-responsive">
                                                        <table class="table">
                                                            <tbody>
                                                                <tr>
                                                                    <th class="auction-details-heading">{{ __('Name') }}:
                                                                    </th>
                                                                    <td>{{ $data->title }}</td>
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
                </div>
            </div>
        </div>
    </div>



@endsection
