@extends('layouts.front')

@section('content')
    {{-- ============ Hero Section Starts Here ============ --}}
    <div class="hero-section">
        <div class="container">
            <ul class="breadcrumb">
                <li>
                    <a href="{{ route('front.index') }}">{{ __('Home') }}</a>
                </li>
                <li>
                    <a>{{ __('Pages') }}</a>
                </li>
                <li>
                    <span>{{ __(Str::lower($data->title)) }}</span>
                </li>
            </ul>
        </div>
        <div class="bg_img hero-bg bottom_center"
            data-background="{{ asset('assets/front-new/images/banner/hero-bg.png') }}"></div>
    </div>
    {{-- ============ Hero Section Ends Here ============ --}}

    {{-- ============ About Section Starts Here ============ --}}
    <section class="about-section">
        <div class="container">
            <div class="about-wrapper mt--100 mt-lg--440 padding-top">
                <div class="row">
                    <div class="col-lg-7 col-xl-6">
                        <div class="about-content">
                            <h4 class="subtitle">{{ __($data->title) }}</h4>
                            @php
                                $heading = $data->heading;
                                $heading = explode(' ', $heading, 3);
                            @endphp
                            <h2 class="title"><span
                                    class="d-block">{{ __("$heading[0] $heading[1]") }}</span>
                                {{ __($heading[2]) }}
                            </h2>
                            <p>{{ _($data->sub_heading) }}</p>
                            <div class="item-area">
                                <div class="item">
                                    <div class="thumb">
                                        <img src="{{ asset('assets/front-new/images/about/01.png') }}" alt="about">
                                    </div>
                                    <p>award-winning team</p>
                                </div>
                                <div class="item">
                                    <div class="thumb">
                                        <img src="{{ asset('assets/front-new/images/about/02.png') }}" alt="about">
                                    </div>
                                    <p>AFFILIATIONS</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="about-thumb">
                    <img src="{{ asset('assets/front-new/images/about/about.png') }}" alt="about">
                </div>
            </div>
        </div>
    </section>
    {{-- ============ About Section Ends Here ============ --}}

    {{-- ============ Counter Section Starts Here ============ --}}
    <div class="counter-section padding-top mt--10">
        <div class="container">
            <div class="row justify-content-center mb-30-none">
                <div class="col-sm-6 col-lg-3">
                    <div class="counter-item">
                        <h3 class="counter-header">
                            <span class="title counter">{{ $data->items_auctioned }}</span><span
                                class="title">M</span>
                        </h3>
                        <p>ITEMS AUCTIONED</p>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-3">
                    <div class="counter-item">
                        <h3 class="counter-header">
                            <span>$</span><span class="title counter">{{ $data->items_in_secure }}</span><span
                                class="title">M</span>
                        </h3>
                        <p>IN SECURE BIDS</p>
                    </div>
                </div>
                {{-- <div class="col-sm-6 col-lg-3">
                    <div class="counter-item">
                        <h3 class="counter-header">
                            <span class="title counter">63</span><span class="title">M</span>
                        </h3>
                        <p>ITEMS AUCTIONED</p>
                    </div>
                </div> --}}
                <div class="col-sm-6 col-lg-3">
                    <div class="counter-item">
                        <h3 class="counter-header">
                            {{-- <span></span> --}}
                            <span class="title counter">{{ $data->auction_experts }}</span>
                            <span class="title">K</span>
                        </h3>
                        <p>AUCTION EXPERTS</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- ============ Counter Section Ends Here ============ --}}


    {{-- ============ Overview Section Starts Here ============ --}}
    <section class="overview-section padding-top">
        <div class="container mw-lg-100 p-lg-0">
            <div class="row m-0">
                <div class="col-lg-6 p-0">
                    <div class="overview-content">
                        <div class="section-header text-lg-left">
                            <h2 class="title">{{ __($data->overview_heading) }}</h2>
                            <p>{{ __($data->overview_subheading) }}</p>
                        </div>
                        <div class="row mb--50">
                            <div class="col-sm-6">
                                <div class="expert-item">
                                    <div class="thumb">
                                        <img src="{{ asset('assets/front-new/images/overview/01.png') }}" alt="overview">
                                    </div>
                                    <div class="content">
                                        <h6 class="title">Real-time Auction</h6>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="expert-item">
                                    <div class="thumb">
                                        <img src="{{ asset('assets/front-new/images/overview/02.png') }}" alt="overview">
                                    </div>
                                    <div class="content">
                                        <h6 class="title">Supports Multiple Currency</h6>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="expert-item">
                                    <div class="thumb">
                                        <img src="{{ asset('assets/front-new/images/overview/03.png') }}" alt="overview">
                                    </div>
                                    <div class="content">
                                        <h6 class="title">Winner Announcement</h6>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="expert-item">
                                    <div class="thumb">
                                        <img src="{{ asset('assets/front-new/images/overview/04.png') }}" alt="overview">
                                    </div>
                                    <div class="content">
                                        <h6 class="title">Supports Multiple Currency</h6>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="expert-item">
                                    <div class="thumb">
                                        <img src="{{ asset('assets/front-new/images/overview/05.png') }}" alt="overview">
                                    </div>
                                    <div class="content">
                                        <h6 class="title">Show all bidders history</h6>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="expert-item">
                                    <div class="thumb">
                                        <img src="{{ asset('assets/front-new/images/overview/06.png') }}" alt="overview">
                                    </div>
                                    <div class="content">
                                        <h6 class="title">Add to watchlist</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 pl-30 pr-0">
                    <div class="w-100 h-100 bg_img"
                        data-background="{{ asset('assets/front-new/images/overview/overview-bg.png') }}"></div>
                </div>
            </div>
        </div>
    </section>
    {{-- ============ Overview Section Ends Here ============ --}}

    {{-- Call-in Section Starts --}}
    @include('layouts.partials.front.callin')
    {{-- Call-in Section Ends --}}

    {{-- ============ Team Section Starts Here ============ --}}
    @if (1 == $data->toggle_team_section)
        <section class="team-section section-bg padding-top padding-bottom">
            <div class="container">
                <div class="section-header">
                    <h2 class="title">{{ __($data->team_management_heading) }}</h2>
                    <p>{{ __($data->team_management_subheading) }}</p>
                </div>
                <div class="team-wrapper row justify-content-between">
                    @foreach ($admins as $admin)
                        <div class="team-item">
                            <div class="team-inner">
                                <div class="team-thumb">
                                    <a>
                                        <img src="{{ asset('assets/images/admins/' . $admin->photo) }}" alt="team">
                                    </a>
                                </div>
                                <div class="team-content">
                                    <h6 class="title"><a href="#0">{{ $admin->name }}</a></h6>
                                    {{-- <ul class="social">
                                    <li>
                                        <a href="#0"><i class="fab fa-facebook-f"></i></a>
                                    </li>
                                    <li>
                                        <a href="#0"><i class="fab fa-twitter"></i></a>
                                    </li>
                                    <li>
                                        <a href="#0"><i class="fab fa-instagram"></i></a>
                                    </li>
                                </ul> --}}
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </section>
    @endif
    {{-- ============ Team Section Ends Here ============ --}}

    {{-- Clients Section Starts --}}
    @include('layouts.partials.front.clients')
    {{-- Clients Section Ends --}}

@endsection
