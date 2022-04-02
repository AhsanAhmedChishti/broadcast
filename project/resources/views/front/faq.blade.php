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
                    <span>Faqs</span>
                </li>
            </ul>
        </div>
        <div class="bg_img hero-bg bottom_center"
            data-background="{{ asset('assets/front-new/images/banner/hero-bg.png') }}"></div>
    </div>
    {{-- ============ Hero Section Ends Here ============ --}}


    {{-- ============ Faq Section Starts Here ============ --}}
    <section class="faq-section padding-bottom mt--240 mt-lg--440 pos-rel">
        <div class="container">
            <div class="section-header cl-white mw-100 left-style">
                <h2 class="title">{{ __('FAQ') }}</h2>
                <p>{{ __('Do not hesitate to send us an email if you can\'t find what you\'re looking for.') }}</p>
            </div>
            <div class="row mb--50">
                <div class="col-lg-8 mb-50">
                    <div class="faq-wrapper">
                        @foreach ($faqs as $faq)
                            <div class="faq-item">
                                <div class="faq-title">
                                    <img src="{{ asset('assets/front-new/css/img/faq.png') }}" alt="css"><span
                                        class="title">{{ __($faq->title) }}</span><span
                                        class="right-icon"></span>
                                </div>
                                <div class="faq-content">
                                    {!! $faq->details !!}
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="col-lg-4 mb-50">
                    <aside class="sticky-menu">
                        {{-- <div class="faq-menu bg_img mb-30"
                            data-background="./{{ asset('assets/front-new/images/faq/faq-menu.png') }}"
                            style="background-image: url(_/{{ asset('assets/front-new/images/faq/faq-menu.html') }});">
                            <ul id="faq-menu">
                                <li class="nav-item">
                                    <a class="nav-link active" href="#company">For Companies</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#freelancer">For Freelancers</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#account">Your Account</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#pricing">Pricing Plans</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#tec">Technical</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#security">Security</a>
                                </li>
                            </ul>
                        </div> --}}
                        <div class="faq-video mb-30">
                            <a href="https://www.youtube.com/watch?v=Mj3QejzYZ70" class="video-area popup">
                                <img src="{{ asset('assets/front-new/images/faq/video.png') }}" alt="faq">
                                <div class="video-button-2">
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                    <i class="fas fa-play"></i>
                                </div>
                            </a>
                            <h5 class="title">Watch Video Tour</h5>
                        </div>
                        {{-- <div class="popular-article pt-30 mb--20">
                            <h4 class="title mb-20">Most Popular Articles</h4>
                            <div class="popular-article-item">
                                <a href="#0" class="right-con"><i class="flaticon-right-arrow"></i></a>
                                <h5 class="title"><a href="#0">Tips for winning</a></h5>
                                <p>Found an item you love? Here are some tips for winning your next item:</p>
                            </div>
                            <div class="popular-article-item">
                                <a href="#0" class="right-con"><i class="flaticon-right-arrow"></i></a>
                                <h5 class="title"><a href="#0">How to bid at an Auction</a></h5>
                                <p>Bidding at auction can be terrifying,
                                    especially your first time.</p>
                            </div>
                            <div class="popular-article-item">
                                <a href="#0" class="right-con"><i class="flaticon-right-arrow"></i></a>
                                <h5 class="title"><a href="#0">Bid increments</a></h5>
                                <p>Each auction house sets their own
                                    bidding increments</p>
                            </div>
                        </div> --}}
                    </aside>
                </div>
            </div>
        </div>
    </section>
    {{-- ============ Faq Section Ends Here ============ --}}



@endsection
