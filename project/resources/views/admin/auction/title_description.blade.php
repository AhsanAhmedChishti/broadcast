@extends('layouts.admin')

@section('content')


    <div class="content-area">
        <div class="mr-breadcrumb">
            <div class="row">
                <div class="col-lg-12">
                    <h4 class="heading">Featured Auction Section</h4>
                    <ul class="links">
                        <li>
                            <a href="{{ route('admin.dashboard') }}">Dashboard </a>
                        </li>

                        <li>
                            <a href="{{ route('admin-category-title-create') }}"> Featured Auction Section</a>
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

                            <form id="ghulamabbasform"
                                action="{{ route('admin-auction-title_description-update', $auction_title_description->id) }}"
                                method="POST">
                                {{ csrf_field() }}
                                {{ method_field('PUT') }}


                                @include('includes.admin.form-both')

                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="left-area">
                                            <h4 class="heading">{{ __('Auction Title') }} </h4>
                                        </div>
                                    </div>
                                    <div class="col-lg-7">
                                        <input name="title" type="text" class="input-field"
                                            value="{{ $auction_title_description->title }}">
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="left-area">
                                            <h4 class="heading">{{ __('Auction Description') }}</h4>
                                        </div>
                                    </div>
                                    <div class="col-lg-7">
                                        <textarea class="form-control" name="description"
                                            id="service_secttion_text">{{ $auction_title_description->description }}</textarea>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="left-area">

                                        </div>
                                    </div>
                                    <div class="col-lg-7">
                                        <button class="addProductSubmit-btn" type="submit">Update</button>
                                    </div>
                                </div>
                            </form>

                            <div class="row mt-5">
                                <div class="col-lg-12">
                                    <h3 class="text-center">{{ __('Latest Auctions Within 3 Hours') }}</h3>
                                </div>

                                <div class="col-lg-12">
                                    <div class="mr-table allproduct">

                                        @include('includes.admin.form-success')

                                        <div class="table-responsive">
                                            <table id="abbasTable" class="table table-hover" cellspacing="0"
                                                style="width:100%;" width="100%">
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
        </div>
    </div>



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
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
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
                    <h4 class="modal-title d-inline-block">Confirm Delete</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <p class="text-center">You are about to delete this Auction.</p>
                    <p class="text-center">Are you sure you want to proceed?</p>
                </div>

                <!-- Modal footer -->
                <div class="modal-footer justify-content-center">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-danger btn-ok">Delete</a>
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
            ajax: '{{ route('admin-auction-latest-datatables') }}',
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

        $(function() {

        });

        {{-- DATA TABLE ENDS --}}
    </script>

@endsection
