@extends('layouts.user')

@section('content')
    <div class="content-area">
        @include('includes.form-success')
        @if (Auth::user()->bids()->where('winner', 1)->where('status', 0)->count() > 0)
            @foreach (Auth::user()->bids()->where('winner', 1)->where('status', 0)->get()
        as $wauction)
                <div class="alert alert-success alert-dismissible text-center">
                    {{ __('Congratulations! You\'re the winner of the ') . $wauction->auction->title . '.' }}<a
                        href="{{ route('user-bid-index') }}">{{ __('Pay Now.') }}</a>
                </div>
            @endforeach
        @endif
        <div class="row row-cards-one">
            <div class="col-md-12 col-lg-6 col-xl-4">
                <div class="mycard bg1">
                    <div class="left">
                        <h5 class="title">{{ __('Total Income') }}!</h5>
                        <span class="number">{{ $gs->currency_sign }}{{ Auth::user()->income }}</span>
                        <a href="{{ route('user-wt-create') }}" class="link">{{ __('Withdraw') }}</a>
                    </div>
                    <div class="right d-flex align-self-center">
                        <div class="icon">
                            <i class="icofont-dollar"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12 col-lg-6 col-xl-4">
                <div class="mycard bg2">
                    <div class="left">
                        <h5 class="title">{{ __('Auctions Opened') }}!</h5>
                        <span class="number">{{ $opened }}</span>
                        <a href="{{ route('user-auction-index') }}" class="link">{{ __('View All') }}</a>
                    </div>
                    <div class="right d-flex align-self-center">
                        <div class="icon">
                            <i class="icofont-truck-alt"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12 col-lg-6 col-xl-4">
                <div class="mycard bg3">
                    <div class="left">
                        <h5 class="title">{{ __('Auctions Closed') }}!</h5>
                        <span class="number">{{ $closed }}</span>
                        <a href="{{ route('user-auction-index') }}" class="link">{{ __('View All') }}</a>
                    </div>
                    <div class="right d-flex align-self-center">
                        <div class="icon">
                            <i class="icofont-check-circled"></i>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>

@endsection

@section('scripts')


@endsection
