@extends('layouts.admin')

@section('content')
    <div class="content-area">
        @include('includes.form-success')
        <div class="row row-cards-one">

            <div class="col-md-12 col-lg-6 col-xl-4">
                <div class="mycard bg1">
                    <div class="left">
                        <h5 class="title">{{ __('Auctions Opened') }}! </h5>
                        <span class="number">{{ App\Models\Auction::where('status', '=', 1)->count() }}</span>
                        <a href="{{ route('admin-auction-index') }}" class="link">{{ __('View All') }}</a>
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
                        <h5 class="title">{{ __('Auctions Closed') }}!</h5>
                        <span class="number">{{ App\Models\Auction::where('status', '=', 0)->count() }}</span>
                        <a href="{{ route('admin-auction-index') }}" class="link">{{ __('View All') }}</a>
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
                        <h5 class="title">{{ __('Auctions Pending') }}!</h5>
                        <span class="number">{{ App\Models\Auction::where('is_approve', '=', 0)->count() }}</span>
                        <a href="{{ route('admin-auction-pending') }}" class="link">{{ __('View All') }}</a>
                    </div>
                    <div class="right d-flex align-self-center">
                        <div class="icon">
                            <i class="icofont-check-circled"></i>
                        </div>
                    </div>
                </div>
            </div>


            <div class="col-md-12 col-lg-6 col-xl-4">
                <div class="mycard bg4">
                    <div class="left">
                        <h5 class="title">{{ __('Total Customers') }}!</h5>
                        <span class="number">{{ App\Models\User::count() }}</span>
                        <a href="{{ route('admin-user-index') }}" class="link">{{ __('View All') }}</a>
                    </div>
                    <div class="right d-flex align-self-center">
                        <div class="icon">
                            <i class="icofont-user"></i>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-12 col-lg-6 col-xl-4">
                <div class="mycard bg6">
                    <div class="left">
                        <h5 class="title">{{ __('Total Posts') }}!</h5>
                        <span class="number">{{ count($blogs) }}</span>
                        <a href="{{ route('admin-blog-index') }}" class="link">{{ __('View All') }}</a>
                    </div>
                    <div class="right d-flex align-self-center">
                        <div class="icon">
                            <i class="icofont-newspaper"></i>
                        </div>
                    </div>
                </div>
            </div>



            <div class="col-md-12 col-lg-6 col-xl-4">
                <div class="mycard bg7">
                    <div class="left">
                        <h5 class="title">{{ __('Website Maintenance') }}!</h5>
                        <span class="number"
                            style="font-size:20px;">{{ $gs->is_maintain == 1 ? __('Activated') : __('Deactivated') }}</span>
                        <a href="{{ route('admin-gs-maintenance') }}" class="link">{{ __('Change') }}</a>
                    </div>
                    <div class="right d-flex align-self-center">
                        <div class="icon">
                            <i class="icofont-ui-settings"></i>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div class="row row-cards-one">

            <div class="col-md-6 col-lg-6 col-xl-6">
                <div class="card">
                    <h5 class="card-header">{{ __('Top Referrals') }}</h5>
                    <div class="card-body">
                        <div class="admin-fix-height-card">
                            <div id="chartContainer-topReference"></div>
                        </div>

                    </div>
                </div>

            </div>

            <div class="col-md-6 col-lg-6 col-xl-6">
                <div class="card">
                    <h5 class="card-header">{{ __('Most Used OS') }}</h5>
                    <div class="card-body">
                        <div class="admin-fix-height-card">
                            <div id="chartContainer-os"></div>
                        </div>
                    </div>
                </div>
            </div>

        </div>


    </div>

@endsection

@section('scripts')

    <script type="text/javascript">
        var chart1 = new CanvasJS.Chart("chartContainer-topReference", {
            exportEnabled: true,
            animationEnabled: true,

            legend: {
                cursor: "pointer",
                horizontalAlign: "right",
                verticalAlign: "center",
                fontSize: 16,
                padding: {
                    top: 20,
                    bottom: 2,
                    right: 20,
                },
            },
            data: [{
                type: "pie",
                showInLegend: true,
                legendText: "",
                toolTipContent: "{name}: <strong>{#percent%} (#percent%)</strong>",
                indexLabel: "#percent%",
                indexLabelFontColor: "white",
                indexLabelPlacement: "inside",
                dataPoints: [
                    @foreach ($referrals as $browser)
                        {y:{{ $browser->total_count }}, name: "{{ $browser->referral }}"},
                    @endforeach
                ]
            }]
        });
        chart1.render();

        var chart = new CanvasJS.Chart("chartContainer-os", {
            exportEnabled: true,
            animationEnabled: true,
            legend: {
                cursor: "pointer",
                horizontalAlign: "right",
                verticalAlign: "center",
                fontSize: 16,
                padding: {
                    top: 20,
                    bottom: 2,
                    right: 20,
                },
            },
            data: [{
                type: "pie",
                showInLegend: true,
                legendText: "",
                toolTipContent: "{name}: <strong>{#percent%} (#percent%)</strong>",
                indexLabel: "#percent%",
                indexLabelFontColor: "white",
                indexLabelPlacement: "inside",
                dataPoints: [
                    @foreach ($browsers as $browser)
                        {y:{{ $browser->total_count }}, name: "{{ $browser->referral }}"},
                    @endforeach
                ]
            }]
        });
        chart.render();
    </script>

@endsection
