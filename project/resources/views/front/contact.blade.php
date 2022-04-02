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
                    <span>{{ __('Contact Us') }}</span>
                </li>
            </ul>
        </div>
        <div class="bg_img hero-bg bottom_center"
            data-background="{{ asset('assets/front-new/images/banner/hero-bg.png') }}"></div>
    </div>
    {{-- ============ Hero Section Ends Here ============ --}}

    {{-- ============ Contact Section Starts Here ============ --}}
    <section class="contact-section padding-bottom">
        <div class="container">
            <div class="contact-wrapper padding-top padding-bottom mt--100 mt-lg--440">
                <div class="section-header">
                    <h5 class="cate">Contact Us</h5>
                    <h2 class="title">get in touch</h2>
                    <p>We'd love to hear from you! Let us know how we can help.</p>
                </div>
                <div class="row">
                    <div class="col-xl-8 col-lg-7">
                        <div class="row">
                            <div class="col">
                                @include('includes.admin.form-both')
                            </div>
                        </div>
                        <form class="contact-form" id="contactform" action="{{ route('front.contact.submit') }}"
                            method="POST" autocomplete="off">
                            @csrf
                            <div class="form-group">
                                <label for="name"><i class="far fa-user"></i></label>
                                <input class="input-field" type="text" placeholder="{{ __('Your Name') }}" name="name"
                                    id="name" required>
                            </div>
                            <div class="form-group">
                                <label for="phonr"><i class="fas fa-phone"></i></label>
                                <input class="input-field" type="tel" placeholder="{{ __('Phone Number') }}"
                                    name="phonr" id="phonr" required>
                            </div>
                            <div class="form-group">
                                <label for="name"><i class="fas fa-envelope-open-text"></i></label>
                                <input class="input-field" type="email" placeholder="{{ __('Enter Your Email ID') }}"
                                    name="email" id="email">
                                <input type="hidden" name="to" value="{{ $ps->contact_email }}">
                            </div>
                            <div class="form-group">
                                <label for="message" class="message"><i class="far fa-envelope"></i></label>
                                <textarea class="input-field" name="text" id="message"
                                    placeholder="{{ __('Type Your Message') }}"></textarea>
                            </div>
                            <div class="captcha-area mb-3">
                                <div>
                                    <p><img class="codeimg" src="{{ asset('assets/images/capcha_code.png') }}"
                                            alt=""> <i class="fas fa-sync-alt pointer refresh_code"></i></p>

                                </div>
                                <div class="mt-3">
                                    <input name="codes" type="text" class="input-field"
                                        placeholder="{{ __('Enter Code') }}*" required="">

                                </div>
                            </div>
                            <div class="form-group text-center mb-0">
                                <button type="submit" class="custom-button submit-btn">{{ __('Send Message') }}</button>
                            </div>
                        </form>
                    </div>
                    <div class="col-xl-4 col-lg-5 d-lg-block d-none">
                        <img src="{{ asset('assets/front-new/images/contact.png') }}" class="w-100"
                            alt="images">
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{-- ============ Contact Section Ends Here ============ --}}

@endsection
