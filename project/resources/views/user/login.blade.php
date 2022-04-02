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
                    <a>Pages</a>
                </li>
                <li>
                    <span>Sign In</span>
                </li>
            </ul>
        </div>
        <div class="bg_img hero-bg bottom_center"
            data-background="{{ asset('assets/front-new/images/banner/hero-bg.png') }}"></div>
    </div>
    {{-- ============ Hero Section Ends Here ============ --}}

    {{-- ============ Account Section Starts Here ============ --}}
    <section class="account-section padding-bottom">
        <div class="container">
            <div class="account-wrapper mt--100 mt-lg--440">
                <div class="left-side">
                    <div class="section-header">
                        <h2 class="title">{{ __('HI, THERE') }}</h2>
                        <p>{{ __('You can log in to your ' . $gs->title . ' account here.') }}</p>
                    </div>
                    {{-- <ul class="login-with">
                        <li>
                            <a href="#0"><i class="fab fa-facebook"></i>Log in with Facebook</a>
                        </li>
                        <li>
                            <a href="#0"><i class="fab fa-google-plus"></i>Log in with Google</a>
                        </li>
                    </ul> --}}
                    {{-- <div class="or">
                        <span>Or</span>
                    </div> --}}
                    @if (session('status'))
                        <div class="alert alert-danger">{{ session('status') }}</div>
                    @endif

                    <form class="login-form" action="{{ route('user.login.submit') }}" method="POST">
                        @csrf
                        <div class="form-group mb-30">
                            <label for="login-email"><i class="far fa-envelope"></i></label>
                            <input type="email" id="login-email" name="email" placeholder="{{ __('Email Address') }}"
                                autofocus required>
                        </div>
                        <div class="form-group">
                            <label for="login-pass"><i class="fas fa-lock"></i></label>
                            <input type="password" id="login-pass" name="password" placeholder="{{ __('Password') }}"
                                required>
                            <span class="pass-type"><i class="fas fa-eye"></i></span>
                        </div>
                        <div class="form-group">
                            <a href="javascript:;">Forgot Password?</a>
                        </div>
                        <div class="form-group mb-0">
                            <input id="authdata" type="hidden" value="Authenticating...">
                            <button id="auth-btn" type="submit" class="custom-button">{{ __('LOG IN') }}</button>
                        </div>
                    </form>
                </div>
                <div class="right-side cl-white">
                    <div class="section-header mb-0">
                        <h3 class="title mt-0">{{ __('NEW HERE?') }}</h3>
                        <p>{{ __('Sign up and create your Account') }}</p>
                        <a href="{{ route('user.register') }}"
                            class="custom-button transparent">{{ __('Sign Up') }}</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{-- ============ Account Section Ends Here ============ --}}
@endsection
