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
                    <span>{{ __('Sign Up') }}</span>
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
                        <h2 class="title">{{ __('Sign Up Your Business Today') }}</h2>
                        <p>{{ __('We\'re happy you\'re here!') }}</p>
                    </div>
                    {{-- <ul class="login-with">
                        <li>
                            <a href="#0"><i class="fab fa-facebook"></i>Log in with Facebook</a>
                        </li>
                        <li>
                            <a href="#0"><i class="fab fa-google-plus"></i>Log in with Google</a>
                        </li>
                    </ul>
                    <div class="or">
                        <span>Or</span>
                    </div> --}}
                    @if (session('status'))
                        <div class="alert alert-danger">{{ session('status') }}</div>
                    @endif

                    <form class="login-form" method="POST" action="{{ route('seller.register.submit') }}">
                        @csrf
                        <div class="row form-group mb-30">
                            <div style="display: none;" class="col-lg-6 col-sm-6 col-xs-6">
                                <input type="radio" class="shipping" id="free-shepping1" name="type" value="0"
                                    checked>
                                <label for="free-shepping1">
                                    {{ __('Private') }}
                                </label>
                            </div>
                            <div style="display: none;" class="col-lg-6 col-sm-6 col-xs-6">
                                <input type="radio" class="shipping" id="free-shepping2" name="type" value="1" checked>
                                <label for="free-shepping2">
                                    {{ __('Business') }}
                                </label>
                            </div>
                        </div>

                        {{-- Company Starts --}}
                        <div id="company" class="row form-group mb-30 d-none">
                            <div class="col-lg-6">
                                <label for="company-name"><i class="fas fa-business-time"></i></label>
                                <input type="text" id="company-name" name="company_name"
                                    placeholder="{{ __('Company name') }}">
                            </div>

                            <div class="col-lg-6">
                                <label for="crv-number"><i class="fas fa-percent"></i></label>
                                <input type="text" id="crv-number" name="cvr_number"
                                    placeholder="{{ __('CVR number') }}">
                            </div>
                        </div>
                        {{-- Company Ends --}}
                        <div class="row form-group mb-30">
                            <div class="col-lg-6">
                                <label for="first-name"><i class="fas fa-user"></i></label>
                                <input type="text" id="first-name" name="first_name" placeholder="{{ __('First name') }}"
                                    required="">
                            </div>

                            <div class="col-lg-6">
                                <label for="last-name"><i class="fas fa-user-tie"></i></label>
                                <input type="text" id="last-name" name="last_name" placeholder="{{ __('Last name') }}"
                                    required="">
                            </div>
                        </div>

                        <div class="row form-group mb-30">
                            <div class="col-lg-6">
                                <label for="email"><i class="fas fa-envelope"></i></label>
                                <input type="email" id="email" name="email" placeholder="{{ __('Your email address') }}"
                                    required="">
                            </div>

                            <div class="col-lg-6">
                                <label for="phone"><i class="fas fa-phone"></i></label>
                                <input type="tel" id="phone" name="phone" placeholder="{{ __('Phone number') }}"
                                    required="">
                            </div>
                        </div>

                        <div class="row form-group mb-30">
                            <div class="col-lg-12">
                                <label for="address"> <i class="fas fa-map-marker-alt"></i></label>
                                <input type="text" name="address" placeholder="{{ __('Address') }}" required="">
                            </div>
                        </div>

                        <div class="row form-group mb-30">
                            <div class="col-lg-6">
                                <label for="login-pass"><i class="fas fa-lock"></i></label>
                                <input type="password" id="login-pass" name="password"
                                    placeholder="{{ __('Password') }}">
                                <span class="pass-type"><i class="fas fa-eye"></i></span>
                            </div>
                            <div class="col-lg-6">
                                <label for="login-pass"><i class="fas fa-lock"></i></label>
                                <input type="password" id="login-pass-confirm" name="password_confirmation"
                                    placeholder="{{ __('Confirm password') }}">
                                <span class="pass-type"><i class="fas fa-eye"></i></span>
                            </div>
                        </div>
                        {{-- <div class="form-group checkgroup mb-30">
                            <input type="checkbox" name="terms" id="check"><label for="check">The Sbidu Terms of Use
                                apply</label>
                        </div> --}}
                        <div class="form-group mb-0">
                            <input id="mprocessdata" type="hidden" value="{{ __('Processing...') }}">
                            <button id="auth-btn" type="submit" class="custom-button">{{ __('REGISTER') }}</button>
                        </div>
                    </form>
                </div>
                <div class="right-side cl-white">
                    <div class="section-header mb-0">
                        <h3 class="title mt-0">{{ __('ALREADY HAVE AN ACCOUNT?') }}</h3>
                        <p>{{ __('Log in and go to your Dashboard.') }}</p>
                        <a href="{{ route('seller.login') }}" class="custom-button transparent">{{ __('Login') }}</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{-- ============ Account Section Ends Here ============ --}}

@endsection

@section('scripts')
    <script>
        $(document).ready(function(){
            $('#company').removeClass('d-none');
        })
        $('input[name=type]').on('click', function() {
            var value = $(this).val();
            if (1 == value) {
                $('#company').removeClass('d-none');
            } else {
                $('#company').addClass('d-none');
            }
        });
        var isVisible = false;
        $('#login-pass-confirm').next('.pass-type').on('click', function() {
            isVisible = !isVisible;
            if (isVisible) {
                $(this).prev('#login-pass-confirm').prop('type', 'text');
            } else {
                $(this).prev('#login-pass-confirm').prop('type', 'password');
            }
        });
    </script>
@endsection
