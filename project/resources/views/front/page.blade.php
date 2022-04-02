@extends('layouts.front')

@section('content')
    {{-- ============ Hero Section Starts Here ============ --}}
    <div class="hero-section style-2">
        <div class="container">
            <ul class="breadcrumb">
                <li>
                    <a href="{{ route('front.index') }}">{{ __('Home') }}</a>
                </li>
                <li>
                    <span>{{ __($page->title) }}</span>
                </li>
            </ul>
        </div>
        <div class="bg_img hero-bg bottom_center"
            data-background="{{ asset('assets/front-new/images/banner/hero-bg.png') }}"></div>
    </div>
    {{-- ============ Hero Section Ends Here ============ --}}

    {{-- ============ Page Section Starts Here ============ --}}
    <section class="blog-section padding-bottom mt--240 mt-lg--440 pos-rel">
        <div class="container">
            <div class="section-header cl-white mw-100 left-style">
                <h2 class="title">{{ __($page->title) }}</h2>
            </div>
            <div class="row mb--50">
                <div class="col-lg-8 mb-50">
                    <div class="faq-wrapper generic page-content">
                        {!! $page->details !!}
                    </div>
                </div>

            </div>
        </div>
    </section>
    {{-- ============ Page Section Ends Here ============ --}}
@endsection
