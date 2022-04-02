@extends('layouts.admin')

@section('content')
    <div class="content-area">
        @include('includes.form-success')
        {{-- Dashbord Widgets Starts --}}
        <div class="row row-abbas">
            <div class="col-md-12 col-lg-6 col-xl-3">
                <div class="card card-abbas">
                    <div class="card-header p-3 pt-2">
                        <div class="icon icon-lg icon-shape text-center bg-d">
                            <i class="material-icons x2 opacity-10">weekend</i>
                        </div>
                        <div class="text-end pt-1">
                            <p class="text-sm mb-0 text-capitalize">{{ __('Auctions Opened') }}</p>
                            <h4 class="mb-0">{{ App\Models\Auction::where('status', '=', 1)->count() }}</h4>
                        </div>
                    </div>
                    <hr class="my-0">
                    <div class="card-footer p-3">
                        <p class="mb-0">
                            <a href="{{ route('admin-auction-index') }}" class="link">
                                <span class="text-sm font-weight-bolder">
                                    {{ __('View All') }}
                                </span>
                            </a>
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-md-12 col-lg-6 col-xl-3">
                <div class="card card-abbas">
                    <div class="card-header p-3 pt-2">
                        <div class="icon icon-lg icon-shape text-center bg-p">
                            <i class="material-icons x2 opacity-10">stopcircle</i>
                        </div>
                        <div class="text-end pt-1">
                            <p class="text-sm mb-0 text-capitalize">{{ __('Auctions Closed') }}</p>
                            <h4 class="mb-0">{{ App\Models\Auction::where('status', '=', 0)->count() }}</h4>
                        </div>
                    </div>
                    <hr class="my-0">
                    <div class="card-footer p-3">
                        <p class="mb-0">
                            <a href="{{ route('admin-auction-index') }}" class="link">
                                <span class="text-sm font-weight-bolder">
                                    {{ __('View All') }}
                                </span>
                            </a>
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-md-12 col-lg-6 col-xl-3">
                <div class="card card-abbas">
                    <div class="card-header p-3 pt-2">
                        <div class="icon icon-lg icon-shape text-center bg-s">
                            <i class="material-icons x2 opacity-10">pending</i>
                        </div>
                        <div class="text-end pt-1">
                            <p class="text-sm mb-0 text-capitalize">{{ __('Auctions Pending') }}</p>
                            <h4 class="mb-0">{{ App\Models\Auction::where('is_approve', '=', 0)->count() }}</h4>
                        </div>
                    </div>
                    <hr class="my-0">
                    <div class="card-footer p-3">
                        <p class="mb-0">
                            <a href="{{ route('admin-auction-pending') }}" class="link">
                                <span class="text-sm font-weight-bolder">
                                    {{ __('View All') }}
                                </span>
                            </a>
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-md-12 col-lg-6 col-xl-3">
                <div class="card card-abbas">
                    <div class="card-header p-3 pt-2">
                        <div class="icon icon-lg icon-shape text-center bg-i">
                            <i class="material-icons x2 opacity-10">people</i>
                        </div>
                        <div class="text-end pt-1">
                            <p class="text-sm mb-0 text-capitalize">{{ __('Total Customers') }}</p>
                            <h4 class="mb-0">{{ App\Models\User::count() }}
                            </h4>
                        </div>
                    </div>
                    <hr class="my-0">
                    <div class="card-footer p-3">
                        <p class="mb-0">
                            <a href="{{ route('admin-user-index') }}" class="link">
                                <span class="text-sm font-weight-bolder">
                                    {{ __('View All') }}
                                </span>
                            </a>
                        </p>
                    </div>
                </div>
            </div>

        </div>
        {{-- Dashbord Widgets Ends --}}

        {{-- Dashboard Alerts Starts --}}
        <div class="row row-abbas">
            <div class="col-lg-12">
                <div class="alert alert-dismissable bg-s fade show">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <div>
                        <h5 class="text-white d-flex align-items-center">
                            <i class="material-icons x2 opacity-10">check</i>
                            <span class="pl-3">{{ __('Alert!') }}</span>
                        </h5>
                        <p class="text-white">{{ __('Your message goes here.') }}</p>
                    </div>
                </div>
            </div>
        </div>
        {{-- Dashboard Alerts Ends --}}
    </div>
@endsection
