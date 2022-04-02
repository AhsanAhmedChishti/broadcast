@extends('layouts.user')

@section('content')
    <div class="content-area">
        <div class="mr-breadcrumb">
            <div class="row">
                <div class="col-lg-12">
                    <h4 class="heading">
                        {{ __('Payments') }}
                    </h4>
                    <ul class="links">
                        <li>
                            <a href="{{ route('user.dashboard') }}">{{ __('Dashboard') }} </a>
                        </li>
                        <li>
                            <a href="{{ route('user-order-index') }}">{{ __('Payments') }}</a>
                        </li>

                    </ul>
                </div>
            </div>
        </div>
        <div class="product-area">
            <div class="row">
                <div class="col-lg-12">
                    <div class="mr-table allproduct">
                        @include('includes.admin.form-success')
                        <div class="table-responsive">
                            <div class="gocover"
                                style="background: url({{ asset('assets/images/' . $gs->admin_loader) }}) no-repeat scroll center center rgba(45, 45, 45, 0.5);">
                            </div>
                            <table id="abbasTable" class="table table-hover" cellspacing="0" style="width:100%;">
                                <thead>
                                    <tr>
                                        <th>{{ __('Auction') }}</th>
                                        <th>{{ __('Type') }}</th>
                                        <th>{{ __('Total Cost') }}</th>
                                        <th>{{ __('Payment Method') }}</th>
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


@endsection

@section('scripts')

    {{-- DATA TABLE --}}

    <script type="text/javascript">
        var table = $('#abbasTable').DataTable({
            ordering: false,
            processing: true,
            serverSide: true,
            ajax: '{{ route('user-order-datatables', 'none') }}',
            columns: [{
                    data: 'auction',
                    name: 'auction'
                },
                {
                    data: 'type',
                    name: 'type'
                },
                {
                    data: 'pay_amount',
                    name: 'pay_amount'
                },
                {
                    data: 'method',
                    name: 'method'
                },
                {
                    data: 'action',
                    searchable: false,
                    orderable: false
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

    {{-- DATA TABLE --}}

@endsection
