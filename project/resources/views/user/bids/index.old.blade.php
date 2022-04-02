@extends('layouts.user')

@section('content')
    <div class="content-area">
        <div class="mr-breadcrumb">
            <div class="row">
                <div class="col-lg-12">
                    <h4 class="heading">{{ __('My Bids') }}</h4>
                    <ul class="links">
                        <li>
                            <a href="{{ route('user.dashboard') }}">{{ __('Dashboard') }} </a>
                        </li>
                        <li>
                            <a href="{{ route('user-bid-index') }}">{{ __('My Bids') }}</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="product-area">

            @include('includes.form-success')

            <div class="row">
                <div class="col-lg-12">
                    <div class="mr-table allproduct">
                        @include('includes.admin.form-success')
                        <div class="table-responsive">
                            <table id="abbasTable" class="table table-hover" cellspacing="0" style="width:100%;">
                                <thead>
                                    <tr>
                                        <th>{{ __('Date') }}</th>
                                        <th>{{ __('Auction') }}</th>
                                        <th>{{ __('Title') }}</th>
                                        <th>{{ __('Amount') }}</th>
                                        <th>{{ __('Action') }}</th>
                                    </tr>
                                </thead>

                                <tbody>


                                    @foreach ($bids as $bid)


                                        <tr>
                                            <td>{{ date('d-M-Y', strtotime($bid->created_at)) }}</td>

                                            <td>{{ $bid->auction->title }}</td>

                                            <td>{{ $gs->currency_format == 0? $gs->currency_sign . number_format($bid->bid_amount, 2, ',', '.'): number_format($bid->bid_amount, 2, ',', '.') . $gs->currency_sign }}
                                            </td>
                                            <td>
                                                <div class="action-list">
                                                    <a href="{{ route('user-bid-show', $bid->id) }}"><i
                                                            class="fas fa-eye"></i> {{ __('View Details') }}</a>
                                                    @if ($bid->winner == 1)
                                                        <a><i class="fas fa-trophy"></i> {{ __('Winner') }}</a>

                                                        @if ($bid->status != 1)
                                                            <a href="{{ route('user-bid-pay', $bid->id) }}"><i
                                                                    class="fas fa-dollar-sign"></i> {{ __('Pay') }}
                                                            </a>
                                                </div>
                                            </td>
                                    @endif



                                @else
                                    <a> {{ __('Not Win') }}</a>
                                    @endif
                        </div>
                        </td>




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

@endsection



@section('scripts')

    {{-- DATA TABLE --}}


    <script type="text/javascript">
        var table = $('#abbasTable').DataTable({
            ordering: false
        });
    </script>

    {{-- DATA TABLE --}}

@endsection
