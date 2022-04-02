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
                    <a href="{{ route('user.dashboard') }}">{{ __('Dashboard') }}</a>
                </li>
                <li>
                    <a href="{{ route('user-auction-index') }}">{{ __('Auctions') }}</a>
                </li>
                <li>
                    <span>{{ __('Auction Details') }}</span>
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
                @include('layouts.partials.user.sidebar')
                {{-- Sidebar Ends --}}
                <div class="col-lg-8">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="dashboard-widget">
                                <div class="dashboard-title mb-30">
                                    <h5 class="title">{{ __('Auction Details') }}</h5>
                                </div>
                                <div class="dashboard-purchasing-tabs">
                                    <ul class="nav-tabs nav">
                                        <li>
                                            <a href="#auction-details" class="active"
                                                data-toggle="tab">{{ __('Details') }}</a>
                                        </li>
                                        <li>
                                            <a href="#bid-info" data-toggle="tab"
                                                class="">{{ __('Bid Information') }}</a>
                                        </li>
                                    </ul>
                                    <div class="tab-content">
                                        <div class="tab-pane fade active show" id="auction-details">
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="product-description">
                                                        <div class="body-area">
                                                            <div class="table-responsive">
                                                                <table class="table">
                                                                    <tbody>
                                                                        <tr>
                                                                            <th class="auction-details-heading">
                                                                                {{ __('Name') }}:</th>
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
                                        <div class="tab-pane fade" id="bid-info">

                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="left-area">
                                                        <h5>{{ __('Total Bids') }}:</h5>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <h5>{{ count($data->bids) }}</h5>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="left-area">
                                                        <h5>{{ __('Highest Bid') }}:</h5>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <h5>{{ $data->highBids() }}</h5>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="mr-table allproduct">

                                                        @include('includes.admin.form-success')

                                                        <div class="table-responsive">
                                                            <table id="bid-table" class="table table-hover" cellspacing="0"
                                                                style="width:100%;">
                                                                <thead>
                                                                    <tr>
                                                                        <th>{{ __('Bidder') }}</th>
                                                                        <th>{{ __('Bid Amount') }}</th>
                                                                        <th>{{ __('Time') }}</th>
                                                                        <th>{{ __('Contact') }}</th>
                                                                        <th>{{ __('Actions') }}</th>
                                                                    </tr>
                                                                <tbody>
                                                                    @foreach ($data->bids()->orderBy('bid_amount', 'desc')->get()
        as $bid)
                                                                        <tr>
                                                                            <td>{{ $bid->user->first_name }}
                                                                                {{ $bid->user->last_name }}</td>
                                                                            @if ($gs->currency_format == 0)
                                                                                <td>{{ $gs->currency_sign }}{{ number_format($bid->bid_amount, 2, ',', '.') }}
                                                                                </td>
                                                                            @else
                                                                                <td>{{ number_format($bid->bid_amount, 2, ',', '.') }}{{ $gs->currency_sign }}
                                                                                </td>
                                                                            @endif

                                                                            <td>{{ $bid->created_at->diffForHumans() }}
                                                                            </td>
                                                                            <td>
                                                                                <div class="action-list"><a
                                                                                        href="javascript:;"
                                                                                        class="send"
                                                                                        data-email="{{ $bid->user->email }}"
                                                                                        data-toggle="modal"
                                                                                        data-target="#vendorform"><i
                                                                                            class="fas fa-envelope"></i>
                                                                                        {{ __('Send Email') }}</a></div>
                                                                            </td>
                                                                            @if ($data->bid_id != 0)

                                                                                @if ($bid->auction->bid_id == $bid->id)
                                                                                    <td>
                                                                                        <div class="action-list"><a><i
                                                                                                    class="fas fa-trophy"></i>
                                                                                                {{ __('Winner') }}</a>
                                                                                            @if ($bid->status != 1)
                                                                                                <a
                                                                                                    href="{{ route('user-auction-remove-winner', $bid->id) }}"><i
                                                                                                        class="fas fa-times-circle"></i>
                                                                                                    {{ __('Remove Winner') }}
                                                                                                </a>
                                                                                        </div>
                                                                                @endif
                                                                                </td>
                                                                            @else
                                                                                <td>
                                                                                    <div class="action-list"><a>
                                                                                            {{ __('Not Won') }} </a>
                                                                                    </div>
                                                                                </td>
                                                                            @endif

                                                                        @else
                                                                            <td>
                                                                                <div class="action-list"><a
                                                                                        href="{{ route('user-auction-winner', $bid->id) }}"><i
                                                                                            class="fas fa-trophy"></i>
                                                                                        {{ __('Make Winner') }}</a></div>
                                                                            </td>
                                                                    @endif
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{-- ============ Dashboard Section Ends Here ============ --}}


    {{-- MESSAGE MODAL --}}
    <div class="sub-categori">
        <div class="modal" id="vendorform" tabindex="-1" role="dialog" aria-labelledby="vendorformLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="vendorformLabel">{{ __('Send Email') }}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="container-fluid p-0">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="contact-form">
                                        <form id="emailreply">
                                            {{ csrf_field() }}
                                            <ul>
                                                <li>
                                                    <input type="email" class="input-field eml-val" id="eml" name="to"
                                                        placeholder="{{ __('Email') }} *" value="" required=""
                                                        readonly="">
                                                </li>
                                                <li>
                                                    <input type="text" class="input-field" id="subj" name="subject"
                                                        placeholder="{{ __('Subject') }} *" required="">
                                                </li>
                                                <li>
                                                    <textarea class="input-field textarea" name="message" id="msg"
                                                        placeholder="{__{('Your Message')}} *" required=""></textarea>
                                                </li>
                                            </ul>
                                            <button class="submit-btn" id="emlsub"
                                                type="submit">{{ __('Send Email') }}</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- MESSAGE MODAL ENDS --}}
@endsection

@section('scripts')
    <script>
        $('#bid-table').DataTable({
            ordering: false
        });
    </script>
@endsection
