@extends('layouts.front')

@section('content')
    {{-- ============ Hero Section Starts Here ============ --}}
    <div class="hero-section style-2">
        <div class="container">
            <ul class="breadcrumb">
                <li>
                    <a href="{{ route('front.index') }}"> {{ __('Home') }}</a>
                </li>
                <li>
                    <a href="{{ route('front.index') }}#auction-categories">{{ __('Categories') }}</a>
                </li>
                @if (isset($_GET['search']))
                    <li>
                        <span>{{ __('Search') }}</span>
                    </li>
                @else
                    <li>
                        <span>{{ __($cat->title) }}</span>
                    </li>
                @endif
            </ul>
        </div>
        <div class="bg_img hero-bg bottom_center"
            data-background="{{ asset('assets/front-new/images/banner/hero-bg.png') }}"></div>
    </div>
    {{-- ============ Hero Section Ends Here ============ --}}

    {{-- ============ Featured Auction Section Starts Here ============ --}}
    @if (isset($featuredAuctions) && $featuredAuctions->count())
        <section class="featured-auction-section padding-bottom mt--240 mt-lg--440 pos-rel">
            <div class="container">
                <div class="section-header cl-white mw-100 left-style">
                    <h3 class="title">{{ __($auction_title_description->title) }}</h3>
                </div>
                <div class="row justify-content-center mb-30-none">
                    @foreach ($featuredAuctions as $featuredAuction)
                        <div class="col-sm-10 col-md-6 col-lg-4">
                            {{-- Featured Auction Item Starts --}}
                            @include('layouts.partials.front.auction-item-featured')
                            {{-- Featured Auction Item Ends --}}
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif
    {{-- ============ Featured Auction Section Ends Here ============ --}}

    {{-- ============ Product Auction Section Starts Here ============ --}}
    <div @php
        $featured_auction_class = 'featured-auction-section padding-bottom mt--240 mt-lg--440 pos-rel';
    @endphp
        class="product-auction padding-bottom {{ isset($featuredAuctions) && !$featuredAuctions->count()? $featured_auction_class: (!isset($featuredAuctions)? $featured_auction_class: '') }}">
        <div class="container">
            <div class="row mb--50">
                {{-- Filter Starts --}}
                @include('layouts.partials.front.auctions-filter')
                {{-- Filter Ends --}}

                <div class="col-lg-8 mb-50">
                    {{-- Product Header Satrts --}}
                    @include('layouts.partials.front.product-header')
                    {{-- Product Header Ends --}}
                    <div class="row mb-30-none justify-content-center">
                        @forelse ($auctions as $auction)
                            <div class="col-sm-10 col-md-6 col-lg-6">
                                {{-- Auction Item Starts --}}
                                @include('layouts.partials.front.auction-item')
                                {{-- Auction Item Ends --}}
                            </div>
                        @empty
                            @include('layouts.partials.front.not-found')
                        @endforelse
                    </div>
                    {{ $auctions->withQueryString()->links('front.pagination') }}
                </div>
            </div>
        </div>
    </div>
    {{-- ============ Product Auction Section Ends Here ============ --}}
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            $('#form-price-range').on('submit', function(e) {
                e.preventDefault();
                var priceRange = $('.price-range input').val();
                var arr = priceRange.replace(/\$/g, '').split('-');
                $('#price-min').val(arr[0].trim());
                $('#price-max').val(arr[1].trim());
                e.target.submit();
            });
        });
    </script>
@endsection
