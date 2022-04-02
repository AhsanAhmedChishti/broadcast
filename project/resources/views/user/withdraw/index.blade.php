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
                    <span>{{ __('Withdrawals') }}</span>
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
                                    <h5 class="title">{{ __('Withdrawals') }}</h5>
                                </div>
                                <div class="mr-table allproduct">
                                    @include('includes.admin.form-success')
                                    <div class="table-responsive">
                                        <table id="abbasTable" class="table table-hover" cellspacing="0"
                                            style="width:100%;">
                                            <thead>
                                                <tr>
                                                    <th>{{ __('Withdraw Date') }}</th>
                                                    <th>{{ __('Method') }}</th>
                                                    <th>{{ __('Account') }}</th>
                                                    <th>{{ __('Amount') }}</th>
                                                    <th>{{ __('Status') }}</th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                                @foreach ($withdraws as $withdraw)
                                                    <tr>
                                                        <td>{{ date('d-M-Y', strtotime($withdraw->created_at)) }}</td>
                                                        <td>{{ $withdraw->method }}</td>
                                                        @if ($withdraw->method != 'Bank')
                                                            <td>{{ $withdraw->acc_email }}</td>
                                                        @else
                                                            <td>{{ $withdraw->iban }}</td>
                                                        @endif
                                                        <td>{{ $gs->currency_sign }}{{ round($withdraw->amount, 2) }}
                                                        </td>
                                                        <td>{{ ucfirst($withdraw->status) }}</td>
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
    </section>
    {{-- ============ Dashboard Section Ends Here ============ --}}
@endsection

@section('scripts')
    {{-- DATA TABLE --}}
    <script type="text/javascript">
        var table = $('#abbasTable').DataTable();

        $(function() {
            $(".btn-area").append('<div class="col-sm-4 text-right">' +
                '<a class="add-btn" href="{{ route('user-wt-create') }}">' +
                '<i class="fas fa-plus"></i> Withdraw Now' +
                '</a>' +
                '</div>');
        });
    </script>
    {{-- DATA TABLE --}}
@endsection
