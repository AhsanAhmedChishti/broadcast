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
                    <span>{{ __('Pending Auctions') }}</span>
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
                            <div class="dash-pro-item mb-30 dashboard-widget">
                                <div class="dashboard-title mb-30">
                                    <h5 class="title">{{ __('Pending Auctions') }}</h5>
                                </div>
                                <div class="mr-table allproduct">

                                    @include('includes.admin.form-success')

                                    <div class="table-responsive">
                                        <table id="abbasTable" class="table table-hover" cellspacing="0"
                                            style="width:100%;">
                                            <thead>
                                                <tr>
                                                    <th width="20%">{{ __('Name') }}</th>
                                                    <th>{{ __('Duration') }}</th>
                                                    <th>{{ __('Buy Price') }}</th>
                                                    <th>{{ __('Type') }}</th>
                                                    <th>{{ __('Total Bids') }}</th>
                                                    <th>{{ __('Status') }}</th>
                                                    <th>{{ __('Actions') }}</th>
                                                </tr>
                                            </thead>
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

    {{-- ADD / EDIT MODAL --}}
    <div class="modal fade" id="modal1" tabindex="-1" role="dialog" aria-labelledby="modal1" aria-hidden="true">

        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="submit-loader">
                    <img src="{{ asset('assets/images/' . $gs->admin_loader) }}" alt="">
                </div>
                <div class="modal-header">
                    <h5 class="modal-title"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('Close') }}</button>
                </div>
            </div>
        </div>
    </div>
    {{-- ADD / EDIT MODAL ENDS --}}

    {{-- DELETE MODAL --}}
    <div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="modal1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header d-block text-center">
                    <h4 class="modal-title d-inline-block">{{ __('Confirm Delete') }}</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <p class="text-center">{{ __('You are about to delete this Auction') }}.</p>
                    <p class="text-center">{{ __('Are you sure you want to proceed') }}?</p>
                </div>

                <!-- Modal footer -->
                <div class="modal-footer justify-content-center">
                    <button type="button" class="btn btn-default" data-dismiss="modal">{{ __('Cancel') }}</button>
                    <a class="btn btn-danger btn-ok">{{ __('Delete') }}</a>
                </div>

            </div>
        </div>
    </div>
    {{-- DELETE MODAL ENDS --}}
@endsection

@section('scripts')
    {{-- DATA TABLE --}}
    <script type="text/javascript">
        var table = $('#abbasTable').DataTable({
            ordering: false,
            processing: true,
            serverSide: true,
            ajax: '{{ route('user-auction-pending-datatables') }}',
            columns: [{
                    data: 'title',
                    name: 'title'
                },
                {
                    data: 'duration',
                    name: 'duration'
                },
                {
                    data: 'buy_price',
                    name: 'buy_price'
                },
                {
                    data: 'type',
                    name: 'type'
                },
                {
                    data: 'bids',
                    name: 'bids'
                },
                {
                    data: 'status',
                    name: 'Status'
                },
                {
                    data: 'action',
                    searchable: false,
                    orderable: false,
                    class: 'actions-wrapper'
                }

            ],
            language: {
                processing: '<img src="{{ asset('assets/images/' . $gs->admin_loader) }}">'
            },
            drawCallback: function(settings) {
                $('.select').niceSelect();
            }
        });
    </script>
    {{-- DATA TABLE ENDS --}}
@endsection
