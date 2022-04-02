@extends('layouts.admin')

@section('styles')

    <style type="text/css">
        textarea.input-field {
            padding: 20px 20px 0px 20px;
            border-radius: 0px;
        }

    </style>

@endsection

@section('content')

    <div class="content-area">
        <div class="mr-breadcrumb">
            <div class="row">
                <div class="col-lg-12">
                    <h4 class="heading">{{ __('Add Language') }} <a class="add-btn"
                            href="{{ route('admin-tlang-index') }}"><i class="fas fa-arrow-left"></i>
                            {{ __('Back') }}</a>
                    </h4>
                    <ul class="links">
                        <li>
                            <a href="{{ route('admin.dashboard') }}">{{ __('Dashboard') }} </a>
                        </li>
                        <li><a href="javascript:;">{{ __('Language Settings') }}</a></li>
                        <li>
                            <a href="{{ route('admin-tlang-index') }}">{{ __('Admin Panel Language') }}</a>
                        </li>
                        <li>
                            <a href="{{ route('admin-tlang-create') }}">{{ __('Add Language') }}</a>
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
                            <form id="ghulamabbasform" action="{{ route('admin-tlang-create') }}" method="POST"
                                enctype="multipart/form-data">
                                {{ csrf_field() }}
                                @include('includes.admin.form-both')

                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="left-area">
                                            <h4 class="heading">{{ __('Language') }} *</h4>
                                            <p class="sub-heading">{{ __('(In Any Language)') }}</p>
                                        </div>
                                    </div>
                                    <div class="col-lg-7">
                                        <input type="text" class="input-field" name="language"
                                            placeholder="{{ __('Language') }}" required="" value="English">
                                    </div>
                                </div>



                                <input type="hidden" name="rtl" value="0">



                                <hr>

                                <h4 class="text-center">{{ __('SET LANGUAGE KEYS & VALUES') }}</h4>

                                <hr>



                                <div class="row">
                                    <div class="col-lg-2">
                                        <div class="left-area">

                                        </div>
                                    </div>
                                    <div class="col-lg-8">
                                        <div class="featured-keyword-area">

                                            <div class="lang-tag-top-filds" id="lang-section">

                                                <div class="lang-area">
                                                    <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <textarea name="keys[]" class="input-field"
                                                                placeholder="Enter Language Key" required="">Home</textarea>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <textarea name="values[]" class="input-field"
                                                                placeholder="Enter Language Value"
                                                                required="">Home</textarea>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="lang-area">
                                                    <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <textarea name="keys[]" class="input-field"
                                                                placeholder="Enter Language Key" required="">Blog</textarea>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <textarea name="values[]" class="input-field"
                                                                placeholder="Enter Language Value"
                                                                required="">Blog</textarea>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="lang-area">
                                                    <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <textarea name="keys[]" class="input-field"
                                                                placeholder="Enter Language Key"
                                                                required="">Auctions</textarea>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <textarea name="values[]" class="input-field"
                                                                placeholder="Enter Language Value"
                                                                required="">Auctions</textarea>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="lang-area">
                                                    <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <textarea name="keys[]" class="input-field"
                                                                placeholder="Enter Language Key" required="">FAQ</textarea>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <textarea name="values[]" class="input-field"
                                                                placeholder="Enter Language Value"
                                                                required="">FAQ</textarea>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="lang-area">
                                                    <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <textarea name="keys[]" class="input-field"
                                                                placeholder="Enter Language Key"
                                                                required="">Pages</textarea>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <textarea name="values[]" class="input-field"
                                                                placeholder="Enter Language Value"
                                                                required="">Pages</textarea>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="lang-area">
                                                    <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <textarea name="keys[]" class="input-field"
                                                                placeholder="Enter Language Key"
                                                                required="">Contact Us</textarea>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <textarea name="values[]" class="input-field"
                                                                placeholder="Enter Language Value"
                                                                required="">Contact Us</textarea>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="lang-area">
                                                    <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <textarea name="keys[]" class="input-field"
                                                                placeholder="Enter Language Key"
                                                                required="">Follow Us</textarea>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <textarea name="values[]" class="input-field"
                                                                placeholder="Enter Language Value"
                                                                required="">Follow Us</textarea>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="lang-area">
                                                    <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <textarea name="keys[]" class="input-field"
                                                                placeholder="Enter Language Key"
                                                                required="">Sign in</textarea>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <textarea name="values[]" class="input-field"
                                                                placeholder="Enter Language Value"
                                                                required="">Sign in</textarea>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="lang-area">
                                                    <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <textarea name="keys[]" class="input-field"
                                                                placeholder="Enter Language Key" required="">Join</textarea>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <textarea name="values[]" class="input-field"
                                                                placeholder="Enter Language Value"
                                                                required="">Join</textarea>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="lang-area">
                                                    <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <textarea name="keys[]" class="input-field"
                                                                placeholder="Enter Language Key"
                                                                required="">My Account</textarea>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <textarea name="values[]" class="input-field"
                                                                placeholder="Enter Language Value"
                                                                required="">My Account</textarea>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="lang-area">
                                                    <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <textarea name="keys[]" class="input-field"
                                                                placeholder="Enter Language Key"
                                                                required="">ADDRESS</textarea>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <textarea name="values[]" class="input-field"
                                                                placeholder="Enter Language Value"
                                                                required="">ADDRESS</textarea>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="lang-area">
                                                    <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <textarea name="keys[]" class="input-field"
                                                                placeholder="Enter Language Key"
                                                                required="">NEWSLETTER</textarea>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <textarea name="values[]" class="input-field"
                                                                placeholder="Enter Language Value"
                                                                required="">NEWSLETTER</textarea>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="lang-area">
                                                    <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <textarea name="keys[]" class="input-field"
                                                                placeholder="Enter Language Key"
                                                                required="">Your email address</textarea>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <textarea name="values[]" class="input-field"
                                                                placeholder="Enter Language Value"
                                                                required="">Your email address</textarea>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="lang-area">
                                                    <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <textarea name="keys[]" class="input-field"
                                                                placeholder="Enter Language Key"
                                                                required="">We're social, connect with us</textarea>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <textarea name="values[]" class="input-field"
                                                                placeholder="Enter Language Value"
                                                                required="">We're social, connect with us</textarea>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="lang-area">
                                                    <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <textarea name="keys[]" class="input-field"
                                                                placeholder="Enter Language Key"
                                                                required="">Login</textarea>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <textarea name="values[]" class="input-field"
                                                                placeholder="Enter Language Value"
                                                                required="">Login</textarea>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="lang-area">
                                                    <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <textarea name="keys[]" class="input-field"
                                                                placeholder="Enter Language Key"
                                                                required="">Register</textarea>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <textarea name="values[]" class="input-field"
                                                                placeholder="Enter Language Value"
                                                                required="">Register</textarea>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="lang-area">
                                                    <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <textarea name="keys[]" class="input-field"
                                                                placeholder="Enter Language Key"
                                                                required="">Login Now</textarea>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <textarea name="values[]" class="input-field"
                                                                placeholder="Enter Language Value"
                                                                required="">Login Now</textarea>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="lang-area">
                                                    <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <textarea name="keys[]" class="input-field"
                                                                placeholder="Enter Language Key"
                                                                required="">Type Email Address</textarea>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <textarea name="values[]" class="input-field"
                                                                placeholder="Enter Language Value"
                                                                required="">Type Email Address</textarea>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="lang-area">
                                                    <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <textarea name="keys[]" class="input-field"
                                                                placeholder="Enter Language Key"
                                                                required="">Type Password</textarea>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <textarea name="values[]" class="input-field"
                                                                placeholder="Enter Language Value"
                                                                required="">Type Password</textarea>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="lang-area">
                                                    <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <textarea name="keys[]" class="input-field"
                                                                placeholder="Enter Language Key"
                                                                required="">Remember Password</textarea>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <textarea name="values[]" class="input-field"
                                                                placeholder="Enter Language Value"
                                                                required="">Remember Password</textarea>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="lang-area">
                                                    <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <textarea name="keys[]" class="input-field"
                                                                placeholder="Enter Language Key"
                                                                required="">Forgot Password</textarea>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <textarea name="values[]" class="input-field"
                                                                placeholder="Enter Language Value"
                                                                required="">Forgot Password</textarea>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="lang-area">
                                                    <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <textarea name="keys[]" class="input-field"
                                                                placeholder="Enter Language Key"
                                                                required="">Authenticating</textarea>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <textarea name="values[]" class="input-field"
                                                                placeholder="Enter Language Value"
                                                                required="">Authenticating</textarea>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="lang-area">
                                                    <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <textarea name="keys[]" class="input-field"
                                                                placeholder="Enter Language Key"
                                                                required="">Sign In with social media</textarea>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <textarea name="values[]" class="input-field"
                                                                placeholder="Enter Language Value"
                                                                required="">Sign In with social media</textarea>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="lang-area">
                                                    <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <textarea name="keys[]" class="input-field"
                                                                placeholder="Enter Language Key"
                                                                required="">Signup Now</textarea>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <textarea name="values[]" class="input-field"
                                                                placeholder="Enter Language Value"
                                                                required="">Signup Now</textarea>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="lang-area">
                                                    <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <textarea name="keys[]" class="input-field"
                                                                placeholder="Enter Language Key"
                                                                required="">Private</textarea>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <textarea name="values[]" class="input-field"
                                                                placeholder="Enter Language Value"
                                                                required="">Private</textarea>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="lang-area">
                                                    <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <textarea name="keys[]" class="input-field"
                                                                placeholder="Enter Language Key"
                                                                required="">Business</textarea>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <textarea name="values[]" class="input-field"
                                                                placeholder="Enter Language Value"
                                                                required="">Business</textarea>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="lang-area">
                                                    <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <textarea name="keys[]" class="input-field"
                                                                placeholder="Enter Language Key"
                                                                required="">Full Name</textarea>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <textarea name="values[]" class="input-field"
                                                                placeholder="Enter Language Value"
                                                                required="">Full Name</textarea>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="lang-area">
                                                    <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <textarea name="keys[]" class="input-field"
                                                                placeholder="Enter Language Key"
                                                                required="">Phone Number</textarea>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <textarea name="values[]" class="input-field"
                                                                placeholder="Enter Language Value"
                                                                required="">Phone Number</textarea>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="lang-area">
                                                    <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <textarea name="keys[]" class="input-field"
                                                                placeholder="Enter Language Key"
                                                                required="">Password</textarea>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <textarea name="values[]" class="input-field"
                                                                placeholder="Enter Language Value"
                                                                required="">Password</textarea>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="lang-area">
                                                    <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <textarea name="keys[]" class="input-field"
                                                                placeholder="Enter Language Key"
                                                                required="">Confirm Password</textarea>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <textarea name="values[]" class="input-field"
                                                                placeholder="Enter Language Value"
                                                                required="">Confirm Password</textarea>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="lang-area">
                                                    <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <textarea name="keys[]" class="input-field"
                                                                placeholder="Enter Language Key"
                                                                required="">Explore More</textarea>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <textarea name="values[]" class="input-field"
                                                                placeholder="Enter Language Value"
                                                                required="">Explore More</textarea>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="lang-area">
                                                    <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <textarea name="keys[]" class="input-field"
                                                                placeholder="Enter Language Key"
                                                                required="">lowest</textarea>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <textarea name="values[]" class="input-field"
                                                                placeholder="Enter Language Value"
                                                                required="">lowest</textarea>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="lang-area">
                                                    <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <textarea name="keys[]" class="input-field"
                                                                placeholder="Enter Language Key"
                                                                required="">Highest</textarea>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <textarea name="values[]" class="input-field"
                                                                placeholder="Enter Language Value"
                                                                required="">Highest</textarea>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="lang-area">
                                                    <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <textarea name="keys[]" class="input-field"
                                                                placeholder="Enter Language Key" required="">Bids</textarea>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <textarea name="values[]" class="input-field"
                                                                placeholder="Enter Language Value"
                                                                required="">Bids</textarea>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="lang-area">
                                                    <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <textarea name="keys[]" class="input-field"
                                                                placeholder="Enter Language Key"
                                                                required="">Conditions</textarea>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <textarea name="values[]" class="input-field"
                                                                placeholder="Enter Language Value"
                                                                required="">Conditions</textarea>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="lang-area">
                                                    <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <textarea name="keys[]" class="input-field"
                                                                placeholder="Enter Language Key"
                                                                required="">To Start</textarea>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <textarea name="values[]" class="input-field"
                                                                placeholder="Enter Language Value"
                                                                required="">To Start</textarea>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="lang-area">
                                                    <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <textarea name="keys[]" class="input-field"
                                                                placeholder="Enter Language Key" required="">Left</textarea>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <textarea name="values[]" class="input-field"
                                                                placeholder="Enter Language Value"
                                                                required="">Left</textarea>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="lang-area">
                                                    <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <textarea name="keys[]" class="input-field"
                                                                placeholder="Enter Language Key"
                                                                required="">Read More</textarea>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <textarea name="values[]" class="input-field"
                                                                placeholder="Enter Language Value"
                                                                required="">Read More</textarea>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="lang-area">
                                                    <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <textarea name="keys[]" class="input-field"
                                                                placeholder="Enter Language Key"
                                                                required="">Contact Now</textarea>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <textarea name="values[]" class="input-field"
                                                                placeholder="Enter Language Value"
                                                                required="">Contact Now</textarea>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="lang-area">
                                                    <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <textarea name="keys[]" class="input-field"
                                                                placeholder="Enter Language Key"
                                                                required="">Search</textarea>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <textarea name="values[]" class="input-field"
                                                                placeholder="Enter Language Value"
                                                                required="">Search</textarea>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="lang-area">
                                                    <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <textarea name="keys[]" class="input-field"
                                                                placeholder="Enter Language Key"
                                                                required="">Archive</textarea>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <textarea name="values[]" class="input-field"
                                                                placeholder="Enter Language Value"
                                                                required="">Archive</textarea>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="lang-area">
                                                    <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <textarea name="keys[]" class="input-field"
                                                                placeholder="Enter Language Key"
                                                                required="">Views</textarea>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <textarea name="values[]" class="input-field"
                                                                placeholder="Enter Language Value"
                                                                required="">Views</textarea>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="lang-area">
                                                    <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <textarea name="keys[]" class="input-field"
                                                                placeholder="Enter Language Key"
                                                                required="">Source</textarea>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <textarea name="values[]" class="input-field"
                                                                placeholder="Enter Language Value"
                                                                required="">Source</textarea>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="lang-area">
                                                    <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <textarea name="keys[]" class="input-field"
                                                                placeholder="Enter Language Key"
                                                                required="">No Blog Found</textarea>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <textarea name="values[]" class="input-field"
                                                                placeholder="Enter Language Value"
                                                                required="">No Blog Found</textarea>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="lang-area">
                                                    <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <textarea name="keys[]" class="input-field"
                                                                placeholder="Enter Language Key"
                                                                required="">Search Here</textarea>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <textarea name="values[]" class="input-field"
                                                                placeholder="Enter Language Value"
                                                                required="">Search Here</textarea>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="lang-area">
                                                    <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <textarea name="keys[]" class="input-field"
                                                                placeholder="Enter Language Key"
                                                                required="">Categories</textarea>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <textarea name="values[]" class="input-field"
                                                                placeholder="Enter Language Value"
                                                                required="">Categories</textarea>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="lang-area">
                                                    <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <textarea name="keys[]" class="input-field"
                                                                placeholder="Enter Language Key"
                                                                required="">Recent Post</textarea>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <textarea name="values[]" class="input-field"
                                                                placeholder="Enter Language Value"
                                                                required="">Recent Post</textarea>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="lang-area">
                                                    <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <textarea name="keys[]" class="input-field"
                                                                placeholder="Enter Language Key"
                                                                required="">Archives</textarea>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <textarea name="values[]" class="input-field"
                                                                placeholder="Enter Language Value"
                                                                required="">Archives</textarea>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="lang-area">
                                                    <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <textarea name="keys[]" class="input-field"
                                                                placeholder="Enter Language Key" required="">Tag</textarea>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <textarea name="values[]" class="input-field"
                                                                placeholder="Enter Language Value"
                                                                required="">Tag</textarea>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="lang-area">
                                                    <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <textarea name="keys[]" class="input-field"
                                                                placeholder="Enter Language Key" required="">Tags</textarea>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <textarea name="values[]" class="input-field"
                                                                placeholder="Enter Language Value"
                                                                required="">Tags</textarea>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="lang-area">
                                                    <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <textarea name="keys[]" class="input-field"
                                                                placeholder="Enter Language Key"
                                                                required="">Featured Auctions</textarea>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <textarea name="values[]" class="input-field"
                                                                placeholder="Enter Language Value"
                                                                required="">Featured Auctions</textarea>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="lang-area">
                                                    <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <textarea name="keys[]" class="input-field"
                                                                placeholder="Enter Language Key"
                                                                required="">Filter Results By</textarea>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <textarea name="values[]" class="input-field"
                                                                placeholder="Enter Language Value"
                                                                required="">Filter Results By</textarea>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="lang-area">
                                                    <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <textarea name="keys[]" class="input-field"
                                                                placeholder="Enter Language Key" required="">To</textarea>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <textarea name="values[]" class="input-field"
                                                                placeholder="Enter Language Value" required="">To</textarea>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="lang-area">
                                                    <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <textarea name="keys[]" class="input-field"
                                                                placeholder="Enter Language Key"
                                                                required="">All Categories</textarea>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <textarea name="values[]" class="input-field"
                                                                placeholder="Enter Language Value"
                                                                required="">All Categories</textarea>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="lang-area">
                                                    <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <textarea name="keys[]" class="input-field"
                                                                placeholder="Enter Language Key"
                                                                required="">Latest Auction</textarea>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <textarea name="values[]" class="input-field"
                                                                placeholder="Enter Language Value"
                                                                required="">Latest Auction</textarea>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="lang-area">
                                                    <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <textarea name="keys[]" class="input-field"
                                                                placeholder="Enter Language Key"
                                                                required="">No Auctions Found</textarea>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <textarea name="values[]" class="input-field"
                                                                placeholder="Enter Language Value"
                                                                required="">No Auctions Found</textarea>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="lang-area">
                                                    <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <textarea name="keys[]" class="input-field"
                                                                placeholder="Enter Language Key"
                                                                required="">Blog Details</textarea>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <textarea name="values[]" class="input-field"
                                                                placeholder="Enter Language Value"
                                                                required="">Blog Details</textarea>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="lang-area">
                                                    <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <textarea name="keys[]" class="input-field"
                                                                placeholder="Enter Language Key"
                                                                required="">Description</textarea>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <textarea name="values[]" class="input-field"
                                                                placeholder="Enter Language Value"
                                                                required="">Description</textarea>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="lang-area">
                                                    <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <textarea name="keys[]" class="input-field"
                                                                placeholder="Enter Language Key"
                                                                required="">Bid History</textarea>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <textarea name="values[]" class="input-field"
                                                                placeholder="Enter Language Value"
                                                                required="">Bid History</textarea>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="lang-area">
                                                    <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <textarea name="keys[]" class="input-field"
                                                                placeholder="Enter Language Key"
                                                                required="">Bidder</textarea>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <textarea name="values[]" class="input-field"
                                                                placeholder="Enter Language Value"
                                                                required="">Bidder</textarea>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="lang-area">
                                                    <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <textarea name="keys[]" class="input-field"
                                                                placeholder="Enter Language Key"
                                                                required="">Bid Amount</textarea>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <textarea name="values[]" class="input-field"
                                                                placeholder="Enter Language Value"
                                                                required="">Bid Amount</textarea>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="lang-area">
                                                    <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <textarea name="keys[]" class="input-field"
                                                                placeholder="Enter Language Key" required="">Date</textarea>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <textarea name="values[]" class="input-field"
                                                                placeholder="Enter Language Value"
                                                                required="">Date</textarea>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="lang-area">
                                                    <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <textarea name="keys[]" class="input-field"
                                                                placeholder="Enter Language Key"
                                                                required="">Admin</textarea>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <textarea name="values[]" class="input-field"
                                                                placeholder="Enter Language Value"
                                                                required="">Admin</textarea>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="lang-area">
                                                    <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <textarea name="keys[]" class="input-field"
                                                                placeholder="Enter Language Key"
                                                                required="">Condition</textarea>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <textarea name="values[]" class="input-field"
                                                                placeholder="Enter Language Value"
                                                                required="">Condition</textarea>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="lang-area">
                                                    <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <textarea name="keys[]" class="input-field"
                                                                placeholder="Enter Language Key"
                                                                required="">Highest BID</textarea>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <textarea name="values[]" class="input-field"
                                                                placeholder="Enter Language Value"
                                                                required="">Highest BID</textarea>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="lang-area">
                                                    <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <textarea name="keys[]" class="input-field"
                                                                placeholder="Enter Language Key"
                                                                required="">Buy Now</textarea>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <textarea name="values[]" class="input-field"
                                                                placeholder="Enter Language Value"
                                                                required="">Buy Now</textarea>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="lang-area">
                                                    <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <textarea name="keys[]" class="input-field"
                                                                placeholder="Enter Language Key"
                                                                required="">Created By</textarea>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <textarea name="values[]" class="input-field"
                                                                placeholder="Enter Language Value"
                                                                required="">Created By</textarea>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="lang-area">
                                                    <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <textarea name="keys[]" class="input-field"
                                                                placeholder="Enter Language Key"
                                                                required="">Amount</textarea>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <textarea name="values[]" class="input-field"
                                                                placeholder="Enter Language Value"
                                                                required="">Amount</textarea>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="lang-area">
                                                    <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <textarea name="keys[]" class="input-field"
                                                                placeholder="Enter Language Key"
                                                                required="">Enter Your Amount</textarea>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <textarea name="values[]" class="input-field"
                                                                placeholder="Enter Language Value"
                                                                required="">Enter Your Amount</textarea>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="lang-area">
                                                    <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <textarea name="keys[]" class="input-field"
                                                                placeholder="Enter Language Key"
                                                                required="">Place Bid Now</textarea>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <textarea name="values[]" class="input-field"
                                                                placeholder="Enter Language Value"
                                                                required="">Place Bid Now</textarea>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="lang-area">
                                                    <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <textarea name="keys[]" class="input-field"
                                                                placeholder="Enter Language Key"
                                                                required="">Login To Bid</textarea>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <textarea name="values[]" class="input-field"
                                                                placeholder="Enter Language Value"
                                                                required="">Login To Bid</textarea>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="lang-area">
                                                    <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <textarea name="keys[]" class="input-field"
                                                                placeholder="Enter Language Key"
                                                                required="">Login To Buy Now</textarea>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <textarea name="values[]" class="input-field"
                                                                placeholder="Enter Language Value"
                                                                required="">Login To Buy Now</textarea>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="lang-area">
                                                    <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <textarea name="keys[]" class="input-field"
                                                                placeholder="Enter Language Key"
                                                                required="">Contact</textarea>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <textarea name="values[]" class="input-field"
                                                                placeholder="Enter Language Value"
                                                                required="">Contact</textarea>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="lang-area">
                                                    <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <textarea name="keys[]" class="input-field"
                                                                placeholder="Enter Language Key" required="">Name</textarea>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <textarea name="values[]" class="input-field"
                                                                placeholder="Enter Language Value"
                                                                required="">Name</textarea>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="lang-area">
                                                    <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <textarea name="keys[]" class="input-field"
                                                                placeholder="Enter Language Key"
                                                                required="">Email Address</textarea>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <textarea name="values[]" class="input-field"
                                                                placeholder="Enter Language Value"
                                                                required="">Email Address</textarea>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="lang-area">
                                                    <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <textarea name="keys[]" class="input-field"
                                                                placeholder="Enter Language Key"
                                                                required="">Your Message</textarea>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <textarea name="values[]" class="input-field"
                                                                placeholder="Enter Language Value"
                                                                required="">Your Message</textarea>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="lang-area">
                                                    <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <textarea name="keys[]" class="input-field"
                                                                placeholder="Enter Language Key"
                                                                required="">Enter Code</textarea>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <textarea name="values[]" class="input-field"
                                                                placeholder="Enter Language Value"
                                                                required="">Enter Code</textarea>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="lang-area">
                                                    <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <textarea name="keys[]" class="input-field"
                                                                placeholder="Enter Language Key"
                                                                required="">Send Message</textarea>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <textarea name="values[]" class="input-field"
                                                                placeholder="Enter Language Value"
                                                                required="">Send Message</textarea>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="lang-area">
                                                    <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <textarea name="keys[]" class="input-field"
                                                                placeholder="Enter Language Key"
                                                                required="">Find Us Here</textarea>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <textarea name="values[]" class="input-field"
                                                                placeholder="Enter Language Value"
                                                                required="">Find Us Here</textarea>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="lang-area">
                                                    <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <textarea name="keys[]" class="input-field"
                                                                placeholder="Enter Language Key"
                                                                required="">Withdraw</textarea>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <textarea name="values[]" class="input-field"
                                                                placeholder="Enter Language Value"
                                                                required="">Withdraw</textarea>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="lang-area">
                                                    <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <textarea name="keys[]" class="input-field"
                                                                placeholder="Enter Language Key"
                                                                required="">Auctions Opened</textarea>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <textarea name="values[]" class="input-field"
                                                                placeholder="Enter Language Value"
                                                                required="">Auctions Opened</textarea>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="lang-area">
                                                    <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <textarea name="keys[]" class="input-field"
                                                                placeholder="Enter Language Key"
                                                                required="">View All</textarea>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <textarea name="values[]" class="input-field"
                                                                placeholder="Enter Language Value"
                                                                required="">View All</textarea>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="lang-area">
                                                    <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <textarea name="keys[]" class="input-field"
                                                                placeholder="Enter Language Key"
                                                                required="">Edit Profile</textarea>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <textarea name="values[]" class="input-field"
                                                                placeholder="Enter Language Value"
                                                                required="">Edit Profile</textarea>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="lang-area">
                                                    <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <textarea name="keys[]" class="input-field"
                                                                placeholder="Enter Language Key"
                                                                required="">Change Password</textarea>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <textarea name="values[]" class="input-field"
                                                                placeholder="Enter Language Value"
                                                                required="">Change Password</textarea>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="lang-area">
                                                    <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <textarea name="keys[]" class="input-field"
                                                                placeholder="Enter Language Key"
                                                                required="">Dashbord</textarea>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <textarea name="values[]" class="input-field"
                                                                placeholder="Enter Language Value"
                                                                required="">Dashbord</textarea>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="lang-area">
                                                    <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <textarea name="keys[]" class="input-field"
                                                                placeholder="Enter Language Key"
                                                                required="">Logout</textarea>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <textarea name="values[]" class="input-field"
                                                                placeholder="Enter Language Value"
                                                                required="">Logout</textarea>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="lang-area">
                                                    <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <textarea name="keys[]" class="input-field"
                                                                placeholder="Enter Language Key"
                                                                required="">My Payments</textarea>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <textarea name="values[]" class="input-field"
                                                                placeholder="Enter Language Value"
                                                                required="">My Payments</textarea>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="lang-area">
                                                    <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <textarea name="keys[]" class="input-field"
                                                                placeholder="Enter Language Key"
                                                                required="">All Auctions List</textarea>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <textarea name="values[]" class="input-field"
                                                                placeholder="Enter Language Value"
                                                                required="">All Auctions List</textarea>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="lang-area">
                                                    <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <textarea name="keys[]" class="input-field"
                                                                placeholder="Enter Language Key"
                                                                required="">Create Auction</textarea>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <textarea name="values[]" class="input-field"
                                                                placeholder="Enter Language Value"
                                                                required="">Create Auction</textarea>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="lang-area">
                                                    <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <textarea name="keys[]" class="input-field"
                                                                placeholder="Enter Language Key"
                                                                required="">Pending Auctions</textarea>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <textarea name="values[]" class="input-field"
                                                                placeholder="Enter Language Value"
                                                                required="">Pending Auctions</textarea>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="lang-area">
                                                    <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <textarea name="keys[]" class="input-field"
                                                                placeholder="Enter Language Key"
                                                                required="">My Bids</textarea>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <textarea name="values[]" class="input-field"
                                                                placeholder="Enter Language Value"
                                                                required="">My Bids</textarea>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="lang-area">
                                                    <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <textarea name="keys[]" class="input-field"
                                                                placeholder="Enter Language Key"
                                                                required="">Withdraws</textarea>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <textarea name="values[]" class="input-field"
                                                                placeholder="Enter Language Value"
                                                                required="">Withdraws</textarea>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="lang-area">
                                                    <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <textarea name="keys[]" class="input-field"
                                                                placeholder="Enter Language Key"
                                                                required="">Duration</textarea>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <textarea name="values[]" class="input-field"
                                                                placeholder="Enter Language Value"
                                                                required="">Duration</textarea>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="lang-area">
                                                    <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <textarea name="keys[]" class="input-field"
                                                                placeholder="Enter Language Key"
                                                                required="">Buy Price</textarea>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <textarea name="values[]" class="input-field"
                                                                placeholder="Enter Language Value"
                                                                required="">Buy Price</textarea>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="lang-area">
                                                    <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <textarea name="keys[]" class="input-field"
                                                                placeholder="Enter Language Key" required="">Type</textarea>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <textarea name="values[]" class="input-field"
                                                                placeholder="Enter Language Value"
                                                                required="">Type</textarea>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="lang-area">
                                                    <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <textarea name="keys[]" class="input-field"
                                                                placeholder="Enter Language Key"
                                                                required="">Total Bids</textarea>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <textarea name="values[]" class="input-field"
                                                                placeholder="Enter Language Value"
                                                                required="">Total Bids</textarea>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="lang-area">
                                                    <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <textarea name="keys[]" class="input-field"
                                                                placeholder="Enter Language Key"
                                                                required="">Status</textarea>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <textarea name="values[]" class="input-field"
                                                                placeholder="Enter Language Value"
                                                                required="">Status</textarea>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="lang-area">
                                                    <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <textarea name="keys[]" class="input-field"
                                                                placeholder="Enter Language Key"
                                                                required="">Actions</textarea>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <textarea name="values[]" class="input-field"
                                                                placeholder="Enter Language Value"
                                                                required="">Actions</textarea>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="lang-area">
                                                    <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <textarea name="keys[]" class="input-field"
                                                                placeholder="Enter Language Key"
                                                                required="">Dashboard</textarea>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <textarea name="values[]" class="input-field"
                                                                placeholder="Enter Language Value"
                                                                required="">Dashboard</textarea>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="lang-area">
                                                    <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <textarea name="keys[]" class="input-field"
                                                                placeholder="Enter Language Key"
                                                                required="">Add New Auction</textarea>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <textarea name="values[]" class="input-field"
                                                                placeholder="Enter Language Value"
                                                                required="">Add New Auction</textarea>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="lang-area">
                                                    <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <textarea name="keys[]" class="input-field"
                                                                placeholder="Enter Language Key"
                                                                required="">Auction Name</textarea>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <textarea name="values[]" class="input-field"
                                                                placeholder="Enter Language Value"
                                                                required="">Auction Name</textarea>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="lang-area">
                                                    <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <textarea name="keys[]" class="input-field"
                                                                placeholder="Enter Language Key"
                                                                required="">Select Category</textarea>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <textarea name="values[]" class="input-field"
                                                                placeholder="Enter Language Value"
                                                                required="">Select Category</textarea>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="lang-area">
                                                    <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <textarea name="keys[]" class="input-field"
                                                                placeholder="Enter Language Key"
                                                                required="">Select Conditions</textarea>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <textarea name="values[]" class="input-field"
                                                                placeholder="Enter Language Value"
                                                                required="">Select Conditions</textarea>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="lang-area">
                                                    <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <textarea name="keys[]" class="input-field"
                                                                placeholder="Enter Language Key"
                                                                required="">Please Select Condition</textarea>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <textarea name="values[]" class="input-field"
                                                                placeholder="Enter Language Value"
                                                                required="">Please Select Condition</textarea>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="lang-area">
                                                    <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <textarea name="keys[]" class="input-field"
                                                                placeholder="Enter Language Key"
                                                                required="">Please select Category</textarea>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <textarea name="values[]" class="input-field"
                                                                placeholder="Enter Language Value"
                                                                required="">Please select Category</textarea>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="lang-area">
                                                    <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <textarea name="keys[]" class="input-field"
                                                                placeholder="Enter Language Key"
                                                                required="">Set Auction Image</textarea>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <textarea name="values[]" class="input-field"
                                                                placeholder="Enter Language Value"
                                                                required="">Set Auction Image</textarea>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="lang-area">
                                                    <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <textarea name="keys[]" class="input-field"
                                                                placeholder="Enter Language Key"
                                                                required="">Upload Image</textarea>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <textarea name="values[]" class="input-field"
                                                                placeholder="Enter Language Value"
                                                                required="">Upload Image</textarea>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="lang-area">
                                                    <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <textarea name="keys[]" class="input-field"
                                                                placeholder="Enter Language Key"
                                                                required="">Prefered Size</textarea>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <textarea name="values[]" class="input-field"
                                                                placeholder="Enter Language Value"
                                                                required="">Prefered Size</textarea>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="lang-area">
                                                    <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <textarea name="keys[]" class="input-field"
                                                                placeholder="Enter Language Key"
                                                                required="">(600x600) or Square Sized Image</textarea>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <textarea name="values[]" class="input-field"
                                                                placeholder="Enter Language Value"
                                                                required="">(600x600) or Square Sized Image</textarea>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="lang-area">
                                                    <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <textarea name="keys[]" class="input-field"
                                                                placeholder="Enter Language Key"
                                                                required="">Auction Gallery Images</textarea>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <textarea name="values[]" class="input-field"
                                                                placeholder="Enter Language Value"
                                                                required="">Auction Gallery Images</textarea>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="lang-area">
                                                    <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <textarea name="keys[]" class="input-field"
                                                                placeholder="Enter Language Key"
                                                                required="">Set Gallery</textarea>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <textarea name="values[]" class="input-field"
                                                                placeholder="Enter Language Value"
                                                                required="">Set Gallery</textarea>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="lang-area">
                                                    <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <textarea name="keys[]" class="input-field"
                                                                placeholder="Enter Language Key"
                                                                required="">Start Date</textarea>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <textarea name="values[]" class="input-field"
                                                                placeholder="Enter Language Value"
                                                                required="">Start Date</textarea>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="lang-area">
                                                    <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <textarea name="keys[]" class="input-field"
                                                                placeholder="Enter Language Key"
                                                                required="">End Date</textarea>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <textarea name="values[]" class="input-field"
                                                                placeholder="Enter Language Value"
                                                                required="">End Date</textarea>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="lang-area">
                                                    <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <textarea name="keys[]" class="input-field"
                                                                placeholder="Enter Language Key"
                                                                required="">Buy Now Price</textarea>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <textarea name="values[]" class="input-field"
                                                                placeholder="Enter Language Value"
                                                                required="">Buy Now Price</textarea>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="lang-area">
                                                    <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <textarea name="keys[]" class="input-field"
                                                                placeholder="Enter Language Key"
                                                                required="">Start Bid Amount</textarea>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <textarea name="values[]" class="input-field"
                                                                placeholder="Enter Language Value"
                                                                required="">Start Bid Amount</textarea>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="lang-area">
                                                    <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <textarea name="keys[]" class="input-field"
                                                                placeholder="Enter Language Key"
                                                                required="">Enter Bid Amount</textarea>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <textarea name="values[]" class="input-field"
                                                                placeholder="Enter Language Value"
                                                                required="">Enter Bid Amount</textarea>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="lang-area">
                                                    <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <textarea name="keys[]" class="input-field"
                                                                placeholder="Enter Language Key"
                                                                required="">Add This Auction To Featured</textarea>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <textarea name="values[]" class="input-field"
                                                                placeholder="Enter Language Value"
                                                                required="">Add This Auction To Featured</textarea>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="lang-area">
                                                    <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <textarea name="keys[]" class="input-field"
                                                                placeholder="Enter Language Key"
                                                                required="">Action</textarea>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <textarea name="values[]" class="input-field"
                                                                placeholder="Enter Language Value"
                                                                required="">Action</textarea>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="lang-area">
                                                    <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <textarea name="keys[]" class="input-field"
                                                                placeholder="Enter Language Key"
                                                                required="">View Details</textarea>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <textarea name="values[]" class="input-field"
                                                                placeholder="Enter Language Value"
                                                                required="">View Details</textarea>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="lang-area">
                                                    <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <textarea name="keys[]" class="input-field"
                                                                placeholder="Enter Language Key"
                                                                required="">Winner</textarea>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <textarea name="values[]" class="input-field"
                                                                placeholder="Enter Language Value"
                                                                required="">Winner</textarea>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="lang-area">
                                                    <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <textarea name="keys[]" class="input-field"
                                                                placeholder="Enter Language Key" required="">Pay</textarea>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <textarea name="values[]" class="input-field"
                                                                placeholder="Enter Language Value"
                                                                required="">Pay</textarea>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="lang-area">
                                                    <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <textarea name="keys[]" class="input-field"
                                                                placeholder="Enter Language Key"
                                                                required="">Not Win</textarea>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <textarea name="values[]" class="input-field"
                                                                placeholder="Enter Language Value"
                                                                required="">Not Win</textarea>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="lang-area">
                                                    <span class="remove lang-remove"><i
                                                            class="fas fa-times"></i></span>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <textarea name="keys[]" class="input-field"
                                                                placeholder="Enter Language Key"
                                                                required="">Category</textarea>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <textarea name="values[]" class="input-field"
                                                                placeholder="Enter Language Value"
                                                                required="">Category</textarea>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="lang-area">
                                                    <span class="remove lang-remove"><i
                                                            class="fas fa-times"></i></span>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <textarea name="keys[]" class="input-field"
                                                                placeholder="Enter Language Key"
                                                                required="">Feature Image</textarea>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <textarea name="values[]" class="input-field"
                                                                placeholder="Enter Language Value"
                                                                required="">Feature Image</textarea>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="lang-area">
                                                    <span class="remove lang-remove"><i
                                                            class="fas fa-times"></i></span>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <textarea name="keys[]" class="input-field"
                                                                placeholder="Enter Language Key"
                                                                required="">Withdraw Date</textarea>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <textarea name="values[]" class="input-field"
                                                                placeholder="Enter Language Value"
                                                                required="">Withdraw Date</textarea>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="lang-area">
                                                    <span class="remove lang-remove"><i
                                                            class="fas fa-times"></i></span>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <textarea name="keys[]" class="input-field"
                                                                placeholder="Enter Language Key"
                                                                required="">Method</textarea>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <textarea name="values[]" class="input-field"
                                                                placeholder="Enter Language Value"
                                                                required="">Method</textarea>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="lang-area">
                                                    <span class="remove lang-remove"><i
                                                            class="fas fa-times"></i></span>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <textarea name="keys[]" class="input-field"
                                                                placeholder="Enter Language Key"
                                                                required="">Account</textarea>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <textarea name="values[]" class="input-field"
                                                                placeholder="Enter Language Value"
                                                                required="">Account</textarea>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="lang-area">
                                                    <span class="remove lang-remove"><i
                                                            class="fas fa-times"></i></span>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <textarea name="keys[]" class="input-field"
                                                                placeholder="Enter Language Key"
                                                                required="">My Withdraws</textarea>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <textarea name="values[]" class="input-field"
                                                                placeholder="Enter Language Value"
                                                                required="">My Withdraws</textarea>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="lang-area">
                                                    <span class="remove lang-remove"><i
                                                            class="fas fa-times"></i></span>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <textarea name="keys[]" class="input-field"
                                                                placeholder="Enter Language Key"
                                                                required="">Auctions Closed</textarea>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <textarea name="values[]" class="input-field"
                                                                placeholder="Enter Language Value"
                                                                required="">Auctions Closed</textarea>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="lang-area">
                                                    <span class="remove lang-remove"><i
                                                            class="fas fa-times"></i></span>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <textarea name="keys[]" class="input-field"
                                                                placeholder="Enter Language Key"
                                                                required="">Total Income</textarea>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <textarea name="values[]" class="input-field"
                                                                placeholder="Enter Language Value"
                                                                required="">Total Income</textarea>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="lang-area">
                                                    <span class="remove lang-remove"><i
                                                            class="fas fa-times"></i></span>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <textarea name="keys[]" class="input-field"
                                                                placeholder="Enter Language Key"
                                                                required="">Payments</textarea>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <textarea name="values[]" class="input-field"
                                                                placeholder="Enter Language Value"
                                                                required="">Payments</textarea>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="lang-area">
                                                    <span class="remove lang-remove"><i
                                                            class="fas fa-times"></i></span>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <textarea name="keys[]" class="input-field"
                                                                placeholder="Enter Language Key"
                                                                required="">Auction</textarea>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <textarea name="values[]" class="input-field"
                                                                placeholder="Enter Language Value"
                                                                required="">Auction</textarea>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="lang-area">
                                                    <span class="remove lang-remove"><i
                                                            class="fas fa-times"></i></span>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <textarea name="keys[]" class="input-field"
                                                                placeholder="Enter Language Key"
                                                                required="">Total Cost</textarea>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <textarea name="values[]" class="input-field"
                                                                placeholder="Enter Language Value"
                                                                required="">Total Cost</textarea>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="lang-area">
                                                    <span class="remove lang-remove"><i
                                                            class="fas fa-times"></i></span>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <textarea name="keys[]" class="input-field"
                                                                placeholder="Enter Language Key"
                                                                required="">Payment Method</textarea>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <textarea name="values[]" class="input-field"
                                                                placeholder="Enter Language Value"
                                                                required="">Payment Method</textarea>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="lang-area">
                                                    <span class="remove lang-remove"><i
                                                            class="fas fa-times"></i></span>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <textarea name="keys[]" class="input-field"
                                                                placeholder="Enter Language Key"
                                                                required="">Payment Number</textarea>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <textarea name="values[]" class="input-field"
                                                                placeholder="Enter Language Value"
                                                                required="">Payment Number</textarea>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="lang-area">
                                                    <span class="remove lang-remove"><i
                                                            class="fas fa-times"></i></span>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <textarea name="keys[]" class="input-field"
                                                                placeholder="Enter Language Key"
                                                                required="">Transaction ID</textarea>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <textarea name="values[]" class="input-field"
                                                                placeholder="Enter Language Value"
                                                                required="">Transaction ID</textarea>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="lang-area">
                                                    <span class="remove lang-remove"><i
                                                            class="fas fa-times"></i></span>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <textarea name="keys[]" class="input-field"
                                                                placeholder="Enter Language Key"
                                                                required="">Charge ID</textarea>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <textarea name="values[]" class="input-field"
                                                                placeholder="Enter Language Value"
                                                                required="">Charge ID</textarea>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="lang-area">
                                                    <span class="remove lang-remove"><i
                                                            class="fas fa-times"></i></span>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <textarea name="keys[]" class="input-field"
                                                                placeholder="Enter Language Key"
                                                                required="">Payment Status</textarea>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <textarea name="values[]" class="input-field"
                                                                placeholder="Enter Language Value"
                                                                required="">Payment Status</textarea>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="lang-area">
                                                    <span class="remove lang-remove"><i
                                                            class="fas fa-times"></i></span>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <textarea name="keys[]" class="input-field"
                                                                placeholder="Enter Language Key"
                                                                required="">Paid at</textarea>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <textarea name="values[]" class="input-field"
                                                                placeholder="Enter Language Value"
                                                                required="">Paid at</textarea>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="lang-area">
                                                    <span class="remove lang-remove"><i
                                                            class="fas fa-times"></i></span>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <textarea name="keys[]" class="input-field"
                                                                placeholder="Enter Language Key"
                                                                required="">Payment Details</textarea>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <textarea name="values[]" class="input-field"
                                                                placeholder="Enter Language Value"
                                                                required="">Payment Details</textarea>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="lang-area">
                                                    <span class="remove lang-remove"><i
                                                            class="fas fa-times"></i></span>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <textarea name="keys[]" class="input-field"
                                                                placeholder="Enter Language Key"
                                                                required="">Current Profile Image</textarea>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <textarea name="values[]" class="input-field"
                                                                placeholder="Enter Language Value"
                                                                required="">Current Profile Image</textarea>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="lang-area">
                                                    <span class="remove lang-remove"><i
                                                            class="fas fa-times"></i></span>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <textarea name="keys[]" class="input-field"
                                                                placeholder="Enter Language Key"
                                                                required="">Email</textarea>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <textarea name="values[]" class="input-field"
                                                                placeholder="Enter Language Value"
                                                                required="">Email</textarea>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="lang-area">
                                                    <span class="remove lang-remove"><i
                                                            class="fas fa-times"></i></span>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <textarea name="keys[]" class="input-field"
                                                                placeholder="Enter Language Key" required="">City</textarea>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <textarea name="values[]" class="input-field"
                                                                placeholder="Enter Language Value"
                                                                required="">City</textarea>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="lang-area">
                                                    <span class="remove lang-remove"><i
                                                            class="fas fa-times"></i></span>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <textarea name="keys[]" class="input-field"
                                                                placeholder="Enter Language Key"
                                                                required="">Address</textarea>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <textarea name="values[]" class="input-field"
                                                                placeholder="Enter Language Value"
                                                                required="">Address</textarea>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="lang-area">
                                                    <span class="remove lang-remove"><i
                                                            class="fas fa-times"></i></span>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <textarea name="keys[]" class="input-field"
                                                                placeholder="Enter Language Key"
                                                                required="">Phone</textarea>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <textarea name="values[]" class="input-field"
                                                                placeholder="Enter Language Value"
                                                                required="">Phone</textarea>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="lang-area">
                                                    <span class="remove lang-remove"><i
                                                            class="fas fa-times"></i></span>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <textarea name="keys[]" class="input-field"
                                                                placeholder="Enter Language Key" required="">Fax</textarea>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <textarea name="values[]" class="input-field"
                                                                placeholder="Enter Language Value"
                                                                required="">Fax</textarea>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="lang-area">
                                                    <span class="remove lang-remove"><i
                                                            class="fas fa-times"></i></span>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <textarea name="keys[]" class="input-field"
                                                                placeholder="Enter Language Key"
                                                                required="">Fax Number</textarea>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <textarea name="values[]" class="input-field"
                                                                placeholder="Enter Language Value"
                                                                required="">Fax Number</textarea>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="lang-area">
                                                    <span class="remove lang-remove"><i
                                                            class="fas fa-times"></i></span>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <textarea name="keys[]" class="input-field"
                                                                placeholder="Enter Language Key"
                                                                required="">Zip Code</textarea>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <textarea name="values[]" class="input-field"
                                                                placeholder="Enter Language Value"
                                                                required="">Zip Code</textarea>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="lang-area">
                                                    <span class="remove lang-remove"><i
                                                            class="fas fa-times"></i></span>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <textarea name="keys[]" class="input-field"
                                                                placeholder="Enter Language Key" required="">Save</textarea>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <textarea name="values[]" class="input-field"
                                                                placeholder="Enter Language Value"
                                                                required="">Save</textarea>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="lang-area">
                                                    <span class="remove lang-remove"><i
                                                            class="fas fa-times"></i></span>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <textarea name="keys[]" class="input-field"
                                                                placeholder="Enter Language Key"
                                                                required="">User Name</textarea>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <textarea name="values[]" class="input-field"
                                                                placeholder="Enter Language Value"
                                                                required="">User Name</textarea>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="lang-area">
                                                    <span class="remove lang-remove"><i
                                                            class="fas fa-times"></i></span>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <textarea name="keys[]" class="input-field"
                                                                placeholder="Enter Language Key"
                                                                required="">Current Password</textarea>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <textarea name="values[]" class="input-field"
                                                                placeholder="Enter Language Value"
                                                                required="">Current Password</textarea>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="lang-area">
                                                    <span class="remove lang-remove"><i
                                                            class="fas fa-times"></i></span>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <textarea name="keys[]" class="input-field"
                                                                placeholder="Enter Language Key"
                                                                required="">Enter Current Password</textarea>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <textarea name="values[]" class="input-field"
                                                                placeholder="Enter Language Value"
                                                                required="">Enter Current Password</textarea>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="lang-area">
                                                    <span class="remove lang-remove"><i
                                                            class="fas fa-times"></i></span>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <textarea name="keys[]" class="input-field"
                                                                placeholder="Enter Language Key"
                                                                required="">New Password</textarea>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <textarea name="values[]" class="input-field"
                                                                placeholder="Enter Language Value"
                                                                required="">New Password</textarea>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="lang-area">
                                                    <span class="remove lang-remove"><i
                                                            class="fas fa-times"></i></span>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <textarea name="keys[]" class="input-field"
                                                                placeholder="Enter Language Key"
                                                                required="">Enter New Password</textarea>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <textarea name="values[]" class="input-field"
                                                                placeholder="Enter Language Value"
                                                                required="">Enter New Password</textarea>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="lang-area">
                                                    <span class="remove lang-remove"><i
                                                            class="fas fa-times"></i></span>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <textarea name="keys[]" class="input-field"
                                                                placeholder="Enter Language Key"
                                                                required="">Re-Type New Password</textarea>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <textarea name="values[]" class="input-field"
                                                                placeholder="Enter Language Value"
                                                                required="">Re-Type New Password</textarea>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="lang-area">
                                                    <span class="remove lang-remove"><i
                                                            class="fas fa-times"></i></span>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <textarea name="keys[]" class="input-field"
                                                                placeholder="Enter Language Key"
                                                                required="">Auction Details</textarea>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <textarea name="values[]" class="input-field"
                                                                placeholder="Enter Language Value"
                                                                required="">Auction Details</textarea>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="lang-area">
                                                    <span class="remove lang-remove"><i
                                                            class="fas fa-times"></i></span>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <textarea name="keys[]" class="input-field"
                                                                placeholder="Enter Language Key"
                                                                required="">Bid Information</textarea>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <textarea name="values[]" class="input-field"
                                                                placeholder="Enter Language Value"
                                                                required="">Bid Information</textarea>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="lang-area">
                                                    <span class="remove lang-remove"><i
                                                            class="fas fa-times"></i></span>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <textarea name="keys[]" class="input-field"
                                                                placeholder="Enter Language Key"
                                                                required="">Highest Bid</textarea>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <textarea name="values[]" class="input-field"
                                                                placeholder="Enter Language Value"
                                                                required="">Highest Bid</textarea>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="lang-area">
                                                    <span class="remove lang-remove"><i
                                                            class="fas fa-times"></i></span>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <textarea name="keys[]" class="input-field"
                                                                placeholder="Enter Language Key" required="">Time</textarea>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <textarea name="values[]" class="input-field"
                                                                placeholder="Enter Language Value"
                                                                required="">Time</textarea>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="lang-area">
                                                    <span class="remove lang-remove"><i
                                                            class="fas fa-times"></i></span>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <textarea name="keys[]" class="input-field"
                                                                placeholder="Enter Language Key"
                                                                required="">Send Email</textarea>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <textarea name="values[]" class="input-field"
                                                                placeholder="Enter Language Value"
                                                                required="">Send Email</textarea>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="lang-area">
                                                    <span class="remove lang-remove"><i
                                                            class="fas fa-times"></i></span>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <textarea name="keys[]" class="input-field"
                                                                placeholder="Enter Language Key"
                                                                required="">Remove Winner</textarea>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <textarea name="values[]" class="input-field"
                                                                placeholder="Enter Language Value"
                                                                required="">Remove Winner</textarea>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="lang-area">
                                                    <span class="remove lang-remove"><i
                                                            class="fas fa-times"></i></span>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <textarea name="keys[]" class="input-field"
                                                                placeholder="Enter Language Key"
                                                                required="">Not Won</textarea>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <textarea name="values[]" class="input-field"
                                                                placeholder="Enter Language Value"
                                                                required="">Not Won</textarea>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="lang-area">
                                                    <span class="remove lang-remove"><i
                                                            class="fas fa-times"></i></span>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <textarea name="keys[]" class="input-field"
                                                                placeholder="Enter Language Key"
                                                                required="">Make Winner</textarea>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <textarea name="values[]" class="input-field"
                                                                placeholder="Enter Language Value"
                                                                required="">Make Winner</textarea>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="lang-area">
                                                    <span class="remove lang-remove"><i
                                                            class="fas fa-times"></i></span>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <textarea name="keys[]" class="input-field"
                                                                placeholder="Enter Language Key"
                                                                required="">Edit Auction</textarea>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <textarea name="values[]" class="input-field"
                                                                placeholder="Enter Language Value"
                                                                required="">Edit Auction</textarea>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="lang-area">
                                                    <span class="remove lang-remove"><i
                                                            class="fas fa-times"></i></span>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <textarea name="keys[]" class="input-field"
                                                                placeholder="Enter Language Key"
                                                                required="">Welcome</textarea>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <textarea name="values[]" class="input-field"
                                                                placeholder="Enter Language Value"
                                                                required="">Welcome</textarea>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="lang-area">
                                                    <span class="remove lang-remove"><i
                                                            class="fas fa-times"></i></span>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <textarea name="keys[]" class="input-field"
                                                                placeholder="Enter Language Key"
                                                                required="">Bid Details</textarea>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <textarea name="values[]" class="input-field"
                                                                placeholder="Enter Language Value"
                                                                required="">Bid Details</textarea>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="lang-area">
                                                    <span class="remove lang-remove"><i
                                                            class="fas fa-times"></i></span>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <textarea name="keys[]" class="input-field"
                                                                placeholder="Enter Language Key"
                                                                required="">Manage Categories</textarea>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <textarea name="values[]" class="input-field"
                                                                placeholder="Enter Language Value"
                                                                required="">Manage Categories</textarea>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="lang-area">
                                                    <span class="remove lang-remove"><i
                                                            class="fas fa-times"></i></span>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <textarea name="keys[]" class="input-field"
                                                                placeholder="Enter Language Key"
                                                                required="">Customers</textarea>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <textarea name="values[]" class="input-field"
                                                                placeholder="Enter Language Value"
                                                                required="">Customers</textarea>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="lang-area">
                                                    <span class="remove lang-remove"><i
                                                            class="fas fa-times"></i></span>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <textarea name="keys[]" class="input-field"
                                                                placeholder="Enter Language Key"
                                                                required="">Customers List</textarea>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <textarea name="values[]" class="input-field"
                                                                placeholder="Enter Language Value"
                                                                required="">Customers List</textarea>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="lang-area">
                                                    <span class="remove lang-remove"><i
                                                            class="fas fa-times"></i></span>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <textarea name="keys[]" class="input-field"
                                                                placeholder="Enter Language Key"
                                                                required="">Posts</textarea>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <textarea name="values[]" class="input-field"
                                                                placeholder="Enter Language Value"
                                                                required="">Posts</textarea>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="lang-area">
                                                    <span class="remove lang-remove"><i
                                                            class="fas fa-times"></i></span>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <textarea name="keys[]" class="input-field"
                                                                placeholder="Enter Language Key"
                                                                required="">General Settings</textarea>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <textarea name="values[]" class="input-field"
                                                                placeholder="Enter Language Value"
                                                                required="">General Settings</textarea>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="lang-area">
                                                    <span class="remove lang-remove"><i
                                                            class="fas fa-times"></i></span>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <textarea name="keys[]" class="input-field"
                                                                placeholder="Enter Language Key" required="">Logo</textarea>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <textarea name="values[]" class="input-field"
                                                                placeholder="Enter Language Value"
                                                                required="">Logo</textarea>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="lang-area">
                                                    <span class="remove lang-remove"><i
                                                            class="fas fa-times"></i></span>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <textarea name="keys[]" class="input-field"
                                                                placeholder="Enter Language Key"
                                                                required="">Favicon</textarea>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <textarea name="values[]" class="input-field"
                                                                placeholder="Enter Language Value"
                                                                required="">Favicon</textarea>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="lang-area">
                                                    <span class="remove lang-remove"><i
                                                            class="fas fa-times"></i></span>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <textarea name="keys[]" class="input-field"
                                                                placeholder="Enter Language Key"
                                                                required="">Loader</textarea>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <textarea name="values[]" class="input-field"
                                                                placeholder="Enter Language Value"
                                                                required="">Loader</textarea>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="lang-area">
                                                    <span class="remove lang-remove"><i
                                                            class="fas fa-times"></i></span>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <textarea name="keys[]" class="input-field"
                                                                placeholder="Enter Language Key"
                                                                required="">Breadcumb Banner</textarea>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <textarea name="values[]" class="input-field"
                                                                placeholder="Enter Language Value"
                                                                required="">Breadcumb Banner</textarea>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="lang-area">
                                                    <span class="remove lang-remove"><i
                                                            class="fas fa-times"></i></span>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <textarea name="keys[]" class="input-field"
                                                                placeholder="Enter Language Key"
                                                                required="">Website Contents</textarea>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <textarea name="values[]" class="input-field"
                                                                placeholder="Enter Language Value"
                                                                required="">Website Contents</textarea>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="lang-area">
                                                    <span class="remove lang-remove"><i
                                                            class="fas fa-times"></i></span>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <textarea name="keys[]" class="input-field"
                                                                placeholder="Enter Language Key"
                                                                required="">Success Messages</textarea>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <textarea name="values[]" class="input-field"
                                                                placeholder="Enter Language Value"
                                                                required="">Success Messages</textarea>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="lang-area">
                                                    <span class="remove lang-remove"><i
                                                            class="fas fa-times"></i></span>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <textarea name="keys[]" class="input-field"
                                                                placeholder="Enter Language Key"
                                                                required="">Footer</textarea>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <textarea name="values[]" class="input-field"
                                                                placeholder="Enter Language Value"
                                                                required="">Footer</textarea>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="lang-area">
                                                    <span class="remove lang-remove"><i
                                                            class="fas fa-times"></i></span>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <textarea name="keys[]" class="input-field"
                                                                placeholder="Enter Language Key"
                                                                required="">Error Page</textarea>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <textarea name="values[]" class="input-field"
                                                                placeholder="Enter Language Value"
                                                                required="">Error Page</textarea>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="lang-area">
                                                    <span class="remove lang-remove"><i
                                                            class="fas fa-times"></i></span>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <textarea name="keys[]" class="input-field"
                                                                placeholder="Enter Language Key"
                                                                required="">Home Page Settings</textarea>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <textarea name="values[]" class="input-field"
                                                                placeholder="Enter Language Value"
                                                                required="">Home Page Settings</textarea>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="lang-area">
                                                    <span class="remove lang-remove"><i
                                                            class="fas fa-times"></i></span>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <textarea name="keys[]" class="input-field"
                                                                placeholder="Enter Language Key"
                                                                required="">Sliders</textarea>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <textarea name="values[]" class="input-field"
                                                                placeholder="Enter Language Value"
                                                                required="">Sliders</textarea>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="lang-area">
                                                    <span class="remove lang-remove"><i
                                                            class="fas fa-times"></i></span>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <textarea name="keys[]" class="input-field"
                                                                placeholder="Enter Language Key"
                                                                required="">Services</textarea>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <textarea name="values[]" class="input-field"
                                                                placeholder="Enter Language Value"
                                                                required="">Services</textarea>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="lang-area">
                                                    <span class="remove lang-remove"><i
                                                            class="fas fa-times"></i></span>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <textarea name="keys[]" class="input-field"
                                                                placeholder="Enter Language Key"
                                                                required="">Auction Categories Section</textarea>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <textarea name="values[]" class="input-field"
                                                                placeholder="Enter Language Value"
                                                                required="">Auction Categories Section</textarea>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="lang-area">
                                                    <span class="remove lang-remove"><i
                                                            class="fas fa-times"></i></span>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <textarea name="keys[]" class="input-field"
                                                                placeholder="Enter Language Key"
                                                                required="">Featured Auction Section</textarea>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <textarea name="values[]" class="input-field"
                                                                placeholder="Enter Language Value"
                                                                required="">Featured Auction Section</textarea>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="lang-area">
                                                    <span class="remove lang-remove"><i
                                                            class="fas fa-times"></i></span>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <textarea name="keys[]" class="input-field"
                                                                placeholder="Enter Language Key"
                                                                required="">Contact Section</textarea>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <textarea name="values[]" class="input-field"
                                                                placeholder="Enter Language Value"
                                                                required="">Contact Section</textarea>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="lang-area">
                                                    <span class="remove lang-remove"><i
                                                            class="fas fa-times"></i></span>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <textarea name="keys[]" class="input-field"
                                                                placeholder="Enter Language Key"
                                                                required="">Project Section</textarea>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <textarea name="values[]" class="input-field"
                                                                placeholder="Enter Language Value"
                                                                required="">Project Section</textarea>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="lang-area">
                                                    <span class="remove lang-remove"><i
                                                            class="fas fa-times"></i></span>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <textarea name="keys[]" class="input-field"
                                                                placeholder="Enter Language Key"
                                                                required="">Video Presentation Section</textarea>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <textarea name="values[]" class="input-field"
                                                                placeholder="Enter Language Value"
                                                                required="">Video Presentation Section</textarea>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="lang-area">
                                                    <span class="remove lang-remove"><i
                                                            class="fas fa-times"></i></span>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <textarea name="keys[]" class="input-field"
                                                                placeholder="Enter Language Key"
                                                                required="">Review Section</textarea>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <textarea name="values[]" class="input-field"
                                                                placeholder="Enter Language Value"
                                                                required="">Review Section</textarea>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="lang-area">
                                                    <span class="remove lang-remove"><i
                                                            class="fas fa-times"></i></span>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <textarea name="keys[]" class="input-field"
                                                                placeholder="Enter Language Key"
                                                                required="">Latest Blog  Section</textarea>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <textarea name="values[]" class="input-field"
                                                                placeholder="Enter Language Value"
                                                                required="">Latest Blog  Section</textarea>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="lang-area">
                                                    <span class="remove lang-remove"><i
                                                            class="fas fa-times"></i></span>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <textarea name="keys[]" class="input-field"
                                                                placeholder="Enter Language Key"
                                                                required="">Home Page Customization</textarea>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <textarea name="values[]" class="input-field"
                                                                placeholder="Enter Language Value"
                                                                required="">Home Page Customization</textarea>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="lang-area">
                                                    <span class="remove lang-remove"><i
                                                            class="fas fa-times"></i></span>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <textarea name="keys[]" class="input-field"
                                                                placeholder="Enter Language Key"
                                                                required="">Menu Page Settings</textarea>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <textarea name="values[]" class="input-field"
                                                                placeholder="Enter Language Value"
                                                                required="">Menu Page Settings</textarea>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="lang-area">
                                                    <span class="remove lang-remove"><i
                                                            class="fas fa-times"></i></span>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <textarea name="keys[]" class="input-field"
                                                                placeholder="Enter Language Key"
                                                                required="">FAQ Page</textarea>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <textarea name="values[]" class="input-field"
                                                                placeholder="Enter Language Value"
                                                                required="">FAQ Page</textarea>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="lang-area">
                                                    <span class="remove lang-remove"><i
                                                            class="fas fa-times"></i></span>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <textarea name="keys[]" class="input-field"
                                                                placeholder="Enter Language Key"
                                                                required="">Contact Us Page</textarea>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <textarea name="values[]" class="input-field"
                                                                placeholder="Enter Language Value"
                                                                required="">Contact Us Page</textarea>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="lang-area">
                                                    <span class="remove lang-remove"><i
                                                            class="fas fa-times"></i></span>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <textarea name="keys[]" class="input-field"
                                                                placeholder="Enter Language Key"
                                                                required="">Other Pages</textarea>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <textarea name="values[]" class="input-field"
                                                                placeholder="Enter Language Value"
                                                                required="">Other Pages</textarea>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="lang-area">
                                                    <span class="remove lang-remove"><i
                                                            class="fas fa-times"></i></span>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <textarea name="keys[]" class="input-field"
                                                                placeholder="Enter Language Key"
                                                                required="">Email Settings</textarea>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <textarea name="values[]" class="input-field"
                                                                placeholder="Enter Language Value"
                                                                required="">Email Settings</textarea>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="lang-area">
                                                    <span class="remove lang-remove"><i
                                                            class="fas fa-times"></i></span>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <textarea name="keys[]" class="input-field"
                                                                placeholder="Enter Language Key"
                                                                required="">Email Configurations</textarea>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <textarea name="values[]" class="input-field"
                                                                placeholder="Enter Language Value"
                                                                required="">Email Configurations</textarea>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="lang-area">
                                                    <span class="remove lang-remove"><i
                                                            class="fas fa-times"></i></span>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <textarea name="keys[]" class="input-field"
                                                                placeholder="Enter Language Key"
                                                                required="">Group Email</textarea>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <textarea name="values[]" class="input-field"
                                                                placeholder="Enter Language Value"
                                                                required="">Group Email</textarea>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="lang-area">
                                                    <span class="remove lang-remove"><i
                                                            class="fas fa-times"></i></span>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <textarea name="keys[]" class="input-field"
                                                                placeholder="Enter Language Key"
                                                                required="">Payment Settings</textarea>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <textarea name="values[]" class="input-field"
                                                                placeholder="Enter Language Value"
                                                                required="">Payment Settings</textarea>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="lang-area">
                                                    <span class="remove lang-remove"><i
                                                            class="fas fa-times"></i></span>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <textarea name="keys[]" class="input-field"
                                                                placeholder="Enter Language Key"
                                                                required="">Payment Informations</textarea>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <textarea name="values[]" class="input-field"
                                                                placeholder="Enter Language Value"
                                                                required="">Payment Informations</textarea>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="lang-area">
                                                    <span class="remove lang-remove"><i
                                                            class="fas fa-times"></i></span>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <textarea name="keys[]" class="input-field"
                                                                placeholder="Enter Language Key"
                                                                required="">Currency</textarea>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <textarea name="values[]" class="input-field"
                                                                placeholder="Enter Language Value"
                                                                required="">Currency</textarea>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="lang-area">
                                                    <span class="remove lang-remove"><i
                                                            class="fas fa-times"></i></span>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <textarea name="keys[]" class="input-field"
                                                                placeholder="Enter Language Key"
                                                                required="">Social Settings</textarea>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <textarea name="values[]" class="input-field"
                                                                placeholder="Enter Language Value"
                                                                required="">Social Settings</textarea>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="lang-area">
                                                    <span class="remove lang-remove"><i
                                                            class="fas fa-times"></i></span>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <textarea name="keys[]" class="input-field"
                                                                placeholder="Enter Language Key"
                                                                required="">Social Links</textarea>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <textarea name="values[]" class="input-field"
                                                                placeholder="Enter Language Value"
                                                                required="">Social Links</textarea>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="lang-area">
                                                    <span class="remove lang-remove"><i
                                                            class="fas fa-times"></i></span>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <textarea name="keys[]" class="input-field"
                                                                placeholder="Enter Language Key"
                                                                required="">Language Settings</textarea>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <textarea name="values[]" class="input-field"
                                                                placeholder="Enter Language Value"
                                                                required="">Language Settings</textarea>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="lang-area">
                                                    <span class="remove lang-remove"><i
                                                            class="fas fa-times"></i></span>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <textarea name="keys[]" class="input-field"
                                                                placeholder="Enter Language Key"
                                                                required="">SEO Tools</textarea>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <textarea name="values[]" class="input-field"
                                                                placeholder="Enter Language Value"
                                                                required="">SEO Tools</textarea>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="lang-area">
                                                    <span class="remove lang-remove"><i
                                                            class="fas fa-times"></i></span>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <textarea name="keys[]" class="input-field"
                                                                placeholder="Enter Language Key"
                                                                required="">Google Analytics</textarea>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <textarea name="values[]" class="input-field"
                                                                placeholder="Enter Language Value"
                                                                required="">Google Analytics</textarea>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="lang-area">
                                                    <span class="remove lang-remove"><i
                                                            class="fas fa-times"></i></span>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <textarea name="keys[]" class="input-field"
                                                                placeholder="Enter Language Key"
                                                                required="">Website Meta Keywords</textarea>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <textarea name="values[]" class="input-field"
                                                                placeholder="Enter Language Value"
                                                                required="">Website Meta Keywords</textarea>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="lang-area">
                                                    <span class="remove lang-remove"><i
                                                            class="fas fa-times"></i></span>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <textarea name="keys[]" class="input-field"
                                                                placeholder="Enter Language Key"
                                                                required="">Manage Staffs</textarea>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <textarea name="values[]" class="input-field"
                                                                placeholder="Enter Language Value"
                                                                required="">Manage Staffs</textarea>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="lang-area">
                                                    <span class="remove lang-remove"><i
                                                            class="fas fa-times"></i></span>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <textarea name="keys[]" class="input-field"
                                                                placeholder="Enter Language Key"
                                                                required="">Subscribers</textarea>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <textarea name="values[]" class="input-field"
                                                                placeholder="Enter Language Value"
                                                                required="">Subscribers</textarea>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="lang-area">
                                                    <span class="remove lang-remove"><i
                                                            class="fas fa-times"></i></span>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <textarea name="keys[]" class="input-field"
                                                                placeholder="Enter Language Key"
                                                                required="">Auctions Pending</textarea>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <textarea name="values[]" class="input-field"
                                                                placeholder="Enter Language Value"
                                                                required="">Auctions Pending</textarea>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="lang-area">
                                                    <span class="remove lang-remove"><i
                                                            class="fas fa-times"></i></span>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <textarea name="keys[]" class="input-field"
                                                                placeholder="Enter Language Key"
                                                                required="">Total Customers</textarea>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <textarea name="values[]" class="input-field"
                                                                placeholder="Enter Language Value"
                                                                required="">Total Customers</textarea>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="lang-area">
                                                    <span class="remove lang-remove"><i
                                                            class="fas fa-times"></i></span>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <textarea name="keys[]" class="input-field"
                                                                placeholder="Enter Language Key"
                                                                required="">Total Posts</textarea>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <textarea name="values[]" class="input-field"
                                                                placeholder="Enter Language Value"
                                                                required="">Total Posts</textarea>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="lang-area">
                                                    <span class="remove lang-remove"><i
                                                            class="fas fa-times"></i></span>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <textarea name="keys[]" class="input-field"
                                                                placeholder="Enter Language Key"
                                                                required="">Top Referrals</textarea>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <textarea name="values[]" class="input-field"
                                                                placeholder="Enter Language Value"
                                                                required="">Top Referrals</textarea>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="lang-area">
                                                    <span class="remove lang-remove"><i
                                                            class="fas fa-times"></i></span>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <textarea name="keys[]" class="input-field"
                                                                placeholder="Enter Language Key"
                                                                required="">Most Used OS</textarea>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <textarea name="values[]" class="input-field"
                                                                placeholder="Enter Language Value"
                                                                required="">Most Used OS</textarea>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="lang-area">
                                                    <span class="remove lang-remove"><i
                                                            class="fas fa-times"></i></span>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <textarea name="keys[]" class="input-field"
                                                                placeholder="Enter Language Key"
                                                                required="">Customer Email</textarea>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <textarea name="values[]" class="input-field"
                                                                placeholder="Enter Language Value"
                                                                required="">Customer Email</textarea>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="lang-area">
                                                    <span class="remove lang-remove"><i
                                                            class="fas fa-times"></i></span>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <textarea name="keys[]" class="input-field"
                                                                placeholder="Enter Language Key"
                                                                required="">Customer Name</textarea>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <textarea name="values[]" class="input-field"
                                                                placeholder="Enter Language Value"
                                                                required="">Customer Name</textarea>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="lang-area">
                                                    <span class="remove lang-remove"><i
                                                            class="fas fa-times"></i></span>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <textarea name="keys[]" class="input-field"
                                                                placeholder="Enter Language Key"
                                                                required="">Customer Phone</textarea>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <textarea name="values[]" class="input-field"
                                                                placeholder="Enter Language Value"
                                                                required="">Customer Phone</textarea>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="lang-area">
                                                    <span class="remove lang-remove"><i
                                                            class="fas fa-times"></i></span>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <textarea name="keys[]" class="input-field"
                                                                placeholder="Enter Language Key"
                                                                required="">Customer Address</textarea>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <textarea name="values[]" class="input-field"
                                                                placeholder="Enter Language Value"
                                                                required="">Customer Address</textarea>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="lang-area">
                                                    <span class="remove lang-remove"><i
                                                            class="fas fa-times"></i></span>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <textarea name="keys[]" class="input-field"
                                                                placeholder="Enter Language Key"
                                                                required="">Customer City</textarea>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <textarea name="values[]" class="input-field"
                                                                placeholder="Enter Language Value"
                                                                required="">Customer City</textarea>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="lang-area">
                                                    <span class="remove lang-remove"><i
                                                            class="fas fa-times"></i></span>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <textarea name="keys[]" class="input-field"
                                                                placeholder="Enter Language Key"
                                                                required="">Customer Zip</textarea>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <textarea name="values[]" class="input-field"
                                                                placeholder="Enter Language Value"
                                                                required="">Customer Zip</textarea>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="lang-area">
                                                    <span class="remove lang-remove"><i
                                                            class="fas fa-times"></i></span>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <textarea name="keys[]" class="input-field"
                                                                placeholder="Enter Language Key"
                                                                required="">Subject</textarea>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <textarea name="values[]" class="input-field"
                                                                placeholder="Enter Language Value"
                                                                required="">Subject</textarea>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="lang-area">
                                                    <span class="remove lang-remove"><i
                                                            class="fas fa-times"></i></span>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <textarea name="keys[]" class="input-field"
                                                                placeholder="Enter Language Key" required="">Slug</textarea>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <textarea name="values[]" class="input-field"
                                                                placeholder="Enter Language Value"
                                                                required="">Slug</textarea>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="lang-area">
                                                    <span class="remove lang-remove"><i
                                                            class="fas fa-times"></i></span>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <textarea name="keys[]" class="input-field"
                                                                placeholder="Enter Language Key"
                                                                required="">Image</textarea>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <textarea name="values[]" class="input-field"
                                                                placeholder="Enter Language Value"
                                                                required="">Image</textarea>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="lang-area">
                                                    <span class="remove lang-remove"><i
                                                            class="fas fa-times"></i></span>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <textarea name="keys[]" class="input-field"
                                                                placeholder="Enter Language Key"
                                                                required="">Title</textarea>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <textarea name="values[]" class="input-field"
                                                                placeholder="Enter Language Value"
                                                                required="">Title</textarea>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="lang-area">
                                                    <span class="remove lang-remove"><i
                                                            class="fas fa-times"></i></span>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <textarea name="keys[]" class="input-field"
                                                                placeholder="Enter Language Key"
                                                                required="">Enter Title</textarea>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <textarea name="values[]" class="input-field"
                                                                placeholder="Enter Language Value"
                                                                required="">Enter Title</textarea>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="lang-area">
                                                    <span class="remove lang-remove"><i
                                                            class="fas fa-times"></i></span>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <textarea name="keys[]" class="input-field"
                                                                placeholder="Enter Language Key"
                                                                required="">Enter Slug</textarea>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <textarea name="values[]" class="input-field"
                                                                placeholder="Enter Language Value"
                                                                required="">Enter Slug</textarea>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="lang-area">
                                                    <span class="remove lang-remove"><i
                                                            class="fas fa-times"></i></span>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <textarea name="keys[]" class="input-field"
                                                                placeholder="Enter Language Key"
                                                                required="">Set Image</textarea>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <textarea name="values[]" class="input-field"
                                                                placeholder="Enter Language Value"
                                                                required="">Set Image</textarea>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="lang-area">
                                                    <span class="remove lang-remove"><i
                                                            class="fas fa-times"></i></span>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <textarea name="keys[]" class="input-field"
                                                                placeholder="Enter Language Key"
                                                                required="">Create Category</textarea>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <textarea name="values[]" class="input-field"
                                                                placeholder="Enter Language Value"
                                                                required="">Create Category</textarea>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="lang-area">
                                                    <span class="remove lang-remove"><i
                                                            class="fas fa-times"></i></span>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <textarea name="keys[]" class="input-field"
                                                                placeholder="Enter Language Key"
                                                                required="">Current Image</textarea>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <textarea name="values[]" class="input-field"
                                                                placeholder="Enter Language Value"
                                                                required="">Current Image</textarea>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="lang-area">
                                                    <span class="remove lang-remove"><i
                                                            class="fas fa-times"></i></span>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <textarea name="keys[]" class="input-field"
                                                                placeholder="Enter Language Key"
                                                                required="">Update</textarea>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <textarea name="values[]" class="input-field"
                                                                placeholder="Enter Language Value"
                                                                required="">Update</textarea>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="lang-area">
                                                    <span class="remove lang-remove"><i
                                                            class="fas fa-times"></i></span>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <textarea name="keys[]" class="input-field"
                                                                placeholder="Enter Language Key"
                                                                required="">Customer Details</textarea>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <textarea name="values[]" class="input-field"
                                                                placeholder="Enter Language Value"
                                                                required="">Customer Details</textarea>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="lang-area">
                                                    <span class="remove lang-remove"><i
                                                            class="fas fa-times"></i></span>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <textarea name="keys[]" class="input-field"
                                                                placeholder="Enter Language Key"
                                                                required="">Details</textarea>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <textarea name="values[]" class="input-field"
                                                                placeholder="Enter Language Value"
                                                                required="">Details</textarea>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="lang-area">
                                                    <span class="remove lang-remove"><i
                                                            class="fas fa-times"></i></span>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <textarea name="keys[]" class="input-field"
                                                                placeholder="Enter Language Key" required="">ID</textarea>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <textarea name="values[]" class="input-field"
                                                                placeholder="Enter Language Value" required="">ID</textarea>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="lang-area">
                                                    <span class="remove lang-remove"><i
                                                            class="fas fa-times"></i></span>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <textarea name="keys[]" class="input-field"
                                                                placeholder="Enter Language Key"
                                                                required="">Customer Profile Image</textarea>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <textarea name="values[]" class="input-field"
                                                                placeholder="Enter Language Value"
                                                                required="">Customer Profile Image</textarea>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="lang-area">
                                                    <span class="remove lang-remove"><i
                                                            class="fas fa-times"></i></span>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <textarea name="keys[]" class="input-field"
                                                                placeholder="Enter Language Key"
                                                                required="">Postal Code</textarea>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <textarea name="values[]" class="input-field"
                                                                placeholder="Enter Language Value"
                                                                required="">Postal Code</textarea>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="lang-area">
                                                    <span class="remove lang-remove"><i
                                                            class="fas fa-times"></i></span>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <textarea name="keys[]" class="input-field"
                                                                placeholder="Enter Language Key"
                                                                required="">User ID</textarea>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <textarea name="values[]" class="input-field"
                                                                placeholder="Enter Language Value"
                                                                required="">User ID</textarea>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="lang-area">
                                                    <span class="remove lang-remove"><i
                                                            class="fas fa-times"></i></span>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <textarea name="keys[]" class="input-field"
                                                                placeholder="Enter Language Key"
                                                                required="">Withdraw Amount</textarea>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <textarea name="values[]" class="input-field"
                                                                placeholder="Enter Language Value"
                                                                required="">Withdraw Amount</textarea>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="lang-area">
                                                    <span class="remove lang-remove"><i
                                                            class="fas fa-times"></i></span>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <textarea name="keys[]" class="input-field"
                                                                placeholder="Enter Language Key"
                                                                required="">Withdraw Charge</textarea>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <textarea name="values[]" class="input-field"
                                                                placeholder="Enter Language Value"
                                                                required="">Withdraw Charge</textarea>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="lang-area">
                                                    <span class="remove lang-remove"><i
                                                            class="fas fa-times"></i></span>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <textarea name="keys[]" class="input-field"
                                                                placeholder="Enter Language Key"
                                                                required="">Withdraw Process Date</textarea>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <textarea name="values[]" class="input-field"
                                                                placeholder="Enter Language Value"
                                                                required="">Withdraw Process Date</textarea>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="lang-area">
                                                    <span class="remove lang-remove"><i
                                                            class="fas fa-times"></i></span>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <textarea name="keys[]" class="input-field"
                                                                placeholder="Enter Language Key"
                                                                required="">Withdraw Status</textarea>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <textarea name="values[]" class="input-field"
                                                                placeholder="Enter Language Value"
                                                                required="">Withdraw Status</textarea>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="lang-area">
                                                    <span class="remove lang-remove"><i
                                                            class="fas fa-times"></i></span>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <textarea name="keys[]" class="input-field"
                                                                placeholder="Enter Language Key"
                                                                required="">User Email</textarea>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <textarea name="values[]" class="input-field"
                                                                placeholder="Enter Language Value"
                                                                required="">User Email</textarea>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="lang-area">
                                                    <span class="remove lang-remove"><i
                                                            class="fas fa-times"></i></span>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <textarea name="keys[]" class="input-field"
                                                                placeholder="Enter Language Key"
                                                                required="">User Phone</textarea>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <textarea name="values[]" class="input-field"
                                                                placeholder="Enter Language Value"
                                                                required="">User Phone</textarea>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="lang-area">
                                                    <span class="remove lang-remove"><i
                                                            class="fas fa-times"></i></span>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <textarea name="keys[]" class="input-field"
                                                                placeholder="Enter Language Key"
                                                                required="">Withdraw Method</textarea>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <textarea name="values[]" class="input-field"
                                                                placeholder="Enter Language Value"
                                                                required="">Withdraw Method</textarea>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="lang-area">
                                                    <span class="remove lang-remove"><i
                                                            class="fas fa-times"></i></span>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <textarea name="keys[]" class="input-field"
                                                                placeholder="Enter Language Key"
                                                                required="">Account Name</textarea>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <textarea name="values[]" class="input-field"
                                                                placeholder="Enter Language Value"
                                                                required="">Account Name</textarea>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="lang-area">
                                                    <span class="remove lang-remove"><i
                                                            class="fas fa-times"></i></span>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <textarea name="keys[]" class="input-field"
                                                                placeholder="Enter Language Key"
                                                                required="">Country</textarea>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <textarea name="values[]" class="input-field"
                                                                placeholder="Enter Language Value"
                                                                required="">Country</textarea>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="lang-area">
                                                    <span class="remove lang-remove"><i
                                                            class="fas fa-times"></i></span>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <textarea name="keys[]" class="input-field"
                                                                placeholder="Enter Language Key"
                                                                required="">Featured Image</textarea>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <textarea name="values[]" class="input-field"
                                                                placeholder="Enter Language Value"
                                                                required="">Featured Image</textarea>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="lang-area">
                                                    <span class="remove lang-remove"><i
                                                            class="fas fa-times"></i></span>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <textarea name="keys[]" class="input-field"
                                                                placeholder="Enter Language Key"
                                                                required="">Post Title</textarea>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <textarea name="values[]" class="input-field"
                                                                placeholder="Enter Language Value"
                                                                required="">Post Title</textarea>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="lang-area">
                                                    <span class="remove lang-remove"><i
                                                            class="fas fa-times"></i></span>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <textarea name="keys[]" class="input-field"
                                                                placeholder="Enter Language Key"
                                                                required="">In Any English</textarea>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <textarea name="values[]" class="input-field"
                                                                placeholder="Enter Language Value"
                                                                required="">In Any English</textarea>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="lang-area">
                                                    <span class="remove lang-remove"><i
                                                            class="fas fa-times"></i></span>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <textarea name="keys[]" class="input-field"
                                                                placeholder="Enter Language Key"
                                                                required="">Close</textarea>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <textarea name="values[]" class="input-field"
                                                                placeholder="Enter Language Value"
                                                                required="">Close</textarea>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="lang-area">
                                                    <span class="remove lang-remove"><i
                                                            class="fas fa-times"></i></span>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <textarea name="keys[]" class="input-field"
                                                                placeholder="Enter Language Key"
                                                                required="">You are about to delete this Category. Everything will be deleted under this Category</textarea>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <textarea name="values[]" class="input-field"
                                                                placeholder="Enter Language Value"
                                                                required="">You are about to delete this Category. Everything will be deleted under this</textarea>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="lang-area">
                                                    <span class="remove lang-remove"><i
                                                            class="fas fa-times"></i></span>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <textarea name="keys[]" class="input-field"
                                                                placeholder="Enter Language Key"
                                                                required="">Are you sure you want to proceed</textarea>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <textarea name="values[]" class="input-field"
                                                                placeholder="Enter Language Value"
                                                                required="">Are you sure you want to proceed</textarea>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="lang-area">
                                                    <span class="remove lang-remove"><i
                                                            class="fas fa-times"></i></span>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <textarea name="keys[]" class="input-field"
                                                                placeholder="Enter Language Key"
                                                                required="">Website logo</textarea>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <textarea name="values[]" class="input-field"
                                                                placeholder="Enter Language Value"
                                                                required="">Website logo</textarea>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="lang-area">
                                                    <span class="remove lang-remove"><i
                                                            class="fas fa-times"></i></span>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <textarea name="keys[]" class="input-field"
                                                                placeholder="Enter Language Key"
                                                                required="">Generel Settings</textarea>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <textarea name="values[]" class="input-field"
                                                                placeholder="Enter Language Value"
                                                                required="">Generel Settings</textarea>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="lang-area">
                                                    <span class="remove lang-remove"><i
                                                            class="fas fa-times"></i></span>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <textarea name="keys[]" class="input-field"
                                                                placeholder="Enter Language Key"
                                                                required="">Website Loader</textarea>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <textarea name="values[]" class="input-field"
                                                                placeholder="Enter Language Value"
                                                                required="">Website Loader</textarea>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="lang-area">
                                                    <span class="remove lang-remove"><i
                                                            class="fas fa-times"></i></span>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <textarea name="keys[]" class="input-field"
                                                                placeholder="Enter Language Key"
                                                                required="">Header Logo</textarea>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <textarea name="values[]" class="input-field"
                                                                placeholder="Enter Language Value"
                                                                required="">Header Logo</textarea>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="lang-area">
                                                    <span class="remove lang-remove"><i
                                                            class="fas fa-times"></i></span>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <textarea name="keys[]" class="input-field"
                                                                placeholder="Enter Language Key"
                                                                required="">Current Logo</textarea>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <textarea name="values[]" class="input-field"
                                                                placeholder="Enter Language Value"
                                                                required="">Current Logo</textarea>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="lang-area">
                                                    <span class="remove lang-remove"><i
                                                            class="fas fa-times"></i></span>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <textarea name="keys[]" class="input-field"
                                                                placeholder="Enter Language Key"
                                                                required="">Set New Logo</textarea>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <textarea name="values[]" class="input-field"
                                                                placeholder="Enter Language Value"
                                                                required="">Set New Logo</textarea>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="lang-area">
                                                    <span class="remove lang-remove"><i
                                                            class="fas fa-times"></i></span>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <textarea name="keys[]" class="input-field"
                                                                placeholder="Enter Language Key"
                                                                required="">Submit</textarea>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <textarea name="values[]" class="input-field"
                                                                placeholder="Enter Language Value"
                                                                required="">Submit</textarea>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="lang-area">
                                                    <span class="remove lang-remove"><i
                                                            class="fas fa-times"></i></span>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <textarea name="keys[]" class="input-field"
                                                                placeholder="Enter Language Key"
                                                                required="">Footer Logo</textarea>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <textarea name="values[]" class="input-field"
                                                                placeholder="Enter Language Value"
                                                                required="">Footer Logo</textarea>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="lang-area">
                                                    <span class="remove lang-remove"><i
                                                            class="fas fa-times"></i></span>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <textarea name="keys[]" class="input-field"
                                                                placeholder="Enter Language Key"
                                                                required="">Website Favicon</textarea>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <textarea name="values[]" class="input-field"
                                                                placeholder="Enter Language Value"
                                                                required="">Website Favicon</textarea>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="lang-area">
                                                    <span class="remove lang-remove"><i
                                                            class="fas fa-times"></i></span>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <textarea name="keys[]" class="input-field"
                                                                placeholder="Enter Language Key"
                                                                required="">Current Favicon</textarea>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <textarea name="values[]" class="input-field"
                                                                placeholder="Enter Language Value"
                                                                required="">Current Favicon</textarea>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="lang-area">
                                                    <span class="remove lang-remove"><i
                                                            class="fas fa-times"></i></span>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <textarea name="keys[]" class="input-field"
                                                                placeholder="Enter Language Key"
                                                                required="">Set New Favicon</textarea>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <textarea name="values[]" class="input-field"
                                                                placeholder="Enter Language Value"
                                                                required="">Set New Favicon</textarea>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="lang-area">
                                                    <span class="remove lang-remove"><i
                                                            class="fas fa-times"></i></span>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <textarea name="keys[]" class="input-field"
                                                                placeholder="Enter Language Key"
                                                                required="">Current Loader</textarea>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <textarea name="values[]" class="input-field"
                                                                placeholder="Enter Language Value"
                                                                required="">Current Loader</textarea>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="lang-area">
                                                    <span class="remove lang-remove"><i
                                                            class="fas fa-times"></i></span>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <textarea name="keys[]" class="input-field"
                                                                placeholder="Enter Language Key"
                                                                required="">Set New Loader</textarea>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <textarea name="values[]" class="input-field"
                                                                placeholder="Enter Language Value"
                                                                required="">Set New Loader</textarea>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="lang-area">
                                                    <span class="remove lang-remove"><i
                                                            class="fas fa-times"></i></span>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <textarea name="keys[]" class="input-field"
                                                                placeholder="Enter Language Key"
                                                                required="">Current Banner</textarea>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <textarea name="values[]" class="input-field"
                                                                placeholder="Enter Language Value"
                                                                required="">Current Banner</textarea>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="lang-area">
                                                    <span class="remove lang-remove"><i
                                                            class="fas fa-times"></i></span>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <textarea name="keys[]" class="input-field"
                                                                placeholder="Enter Language Key"
                                                                required="">Website Title</textarea>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <textarea name="values[]" class="input-field"
                                                                placeholder="Enter Language Value"
                                                                required="">Website Title</textarea>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="lang-area">
                                                    <span class="remove lang-remove"><i
                                                            class="fas fa-times"></i></span>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <textarea name="keys[]" class="input-field"
                                                                placeholder="Enter Language Key"
                                                                required="">Write Your Site Title Here</textarea>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <textarea name="values[]" class="input-field"
                                                                placeholder="Enter Language Value"
                                                                required="">Write Your Site Title Here</textarea>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="lang-area">
                                                    <span class="remove lang-remove"><i
                                                            class="fas fa-times"></i></span>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <textarea name="keys[]" class="input-field"
                                                                placeholder="Enter Language Key"
                                                                required="">Theme Color</textarea>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <textarea name="values[]" class="input-field"
                                                                placeholder="Enter Language Value"
                                                                required="">Theme Color</textarea>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="lang-area">
                                                    <span class="remove lang-remove"><i
                                                            class="fas fa-times"></i></span>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <textarea name="keys[]" class="input-field"
                                                                placeholder="Enter Language Key"
                                                                required="">Tawk.to</textarea>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <textarea name="values[]" class="input-field"
                                                                placeholder="Enter Language Value"
                                                                required="">Tawk.to</textarea>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="lang-area">
                                                    <span class="remove lang-remove"><i
                                                            class="fas fa-times"></i></span>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <textarea name="keys[]" class="input-field"
                                                                placeholder="Enter Language Key"
                                                                required="">Tawk.to Widget Code</textarea>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <textarea name="values[]" class="input-field"
                                                                placeholder="Enter Language Value"
                                                                required="">Tawk.to Widget Code</textarea>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="lang-area">
                                                    <span class="remove lang-remove"><i
                                                            class="fas fa-times"></i></span>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <textarea name="keys[]" class="input-field"
                                                                placeholder="Enter Language Key"
                                                                required="">Disqus</textarea>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <textarea name="values[]" class="input-field"
                                                                placeholder="Enter Language Value"
                                                                required="">Disqus</textarea>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="lang-area">
                                                    <span class="remove lang-remove"><i
                                                            class="fas fa-times"></i></span>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <textarea name="keys[]" class="input-field"
                                                                placeholder="Enter Language Key"
                                                                required="">Disqus Universal Code</textarea>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <textarea name="values[]" class="input-field"
                                                                placeholder="Enter Language Value"
                                                                required="">Disqus Universal Code</textarea>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="lang-area">
                                                    <span class="remove lang-remove"><i
                                                            class="fas fa-times"></i></span>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <textarea name="keys[]" class="input-field"
                                                                placeholder="Enter Language Key"
                                                                required="">Subscribe Success</textarea>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <textarea name="values[]" class="input-field"
                                                                placeholder="Enter Language Value"
                                                                required="">Subscribe Success</textarea>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="lang-area">
                                                    <span class="remove lang-remove"><i
                                                            class="fas fa-times"></i></span>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <textarea name="keys[]" class="input-field"
                                                                placeholder="Enter Language Key"
                                                                required="">Subscribe Success Message</textarea>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <textarea name="values[]" class="input-field"
                                                                placeholder="Enter Language Value"
                                                                required="">Subscribe Success Message</textarea>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="lang-area">
                                                    <span class="remove lang-remove"><i
                                                            class="fas fa-times"></i></span>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <textarea name="keys[]" class="input-field"
                                                                placeholder="Enter Language Key"
                                                                required="">Subscribe Error</textarea>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <textarea name="values[]" class="input-field"
                                                                placeholder="Enter Language Value"
                                                                required="">Subscribe Error</textarea>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="lang-area">
                                                    <span class="remove lang-remove"><i
                                                            class="fas fa-times"></i></span>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <textarea name="keys[]" class="input-field"
                                                                placeholder="Enter Language Key"
                                                                required="">Subscribe Error Message</textarea>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <textarea name="values[]" class="input-field"
                                                                placeholder="Enter Language Value"
                                                                required="">Subscribe Error Message</textarea>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="lang-area">
                                                    <span class="remove lang-remove"><i
                                                            class="fas fa-times"></i></span>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <textarea name="keys[]" class="input-field"
                                                                placeholder="Enter Language Key"
                                                                required="">Order Success Title</textarea>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <textarea name="values[]" class="input-field"
                                                                placeholder="Enter Language Value"
                                                                required="">Order Success Title</textarea>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="lang-area">
                                                    <span class="remove lang-remove"><i
                                                            class="fas fa-times"></i></span>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <textarea name="keys[]" class="input-field"
                                                                placeholder="Enter Language Key"
                                                                required="">In Any Language</textarea>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <textarea name="values[]" class="input-field"
                                                                placeholder="Enter Language Value"
                                                                required="">In Any Language</textarea>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="lang-area">
                                                    <span class="remove lang-remove"><i
                                                            class="fas fa-times"></i></span>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <textarea name="keys[]" class="input-field"
                                                                placeholder="Enter Language Key"
                                                                required="">Footer Text</textarea>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <textarea name="values[]" class="input-field"
                                                                placeholder="Enter Language Value"
                                                                required="">Footer Text</textarea>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="lang-area">
                                                    <span class="remove lang-remove"><i
                                                            class="fas fa-times"></i></span>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <textarea name="keys[]" class="input-field"
                                                                placeholder="Enter Language Key"
                                                                required="">Copyright Text</textarea>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <textarea name="values[]" class="input-field"
                                                                placeholder="Enter Language Value"
                                                                required="">Copyright Text</textarea>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="lang-area">
                                                    <span class="remove lang-remove"><i
                                                            class="fas fa-times"></i></span>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <textarea name="keys[]" class="input-field"
                                                                placeholder="Enter Language Key"
                                                                required="">Add Slider</textarea>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <textarea name="values[]" class="input-field"
                                                                placeholder="Enter Language Value"
                                                                required="">Add Slider</textarea>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="lang-area">
                                                    <span class="remove lang-remove"><i
                                                            class="fas fa-times"></i></span>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <textarea name="keys[]" class="input-field"
                                                                placeholder="Enter Language Key"
                                                                required="">Sub Title</textarea>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <textarea name="values[]" class="input-field"
                                                                placeholder="Enter Language Value"
                                                                required="">Sub Title</textarea>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="lang-area">
                                                    <span class="remove lang-remove"><i
                                                            class="fas fa-times"></i></span>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <textarea name="keys[]" class="input-field"
                                                                placeholder="Enter Language Key" required="">Text</textarea>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <textarea name="values[]" class="input-field"
                                                                placeholder="Enter Language Value"
                                                                required="">Text</textarea>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="lang-area">
                                                    <span class="remove lang-remove"><i
                                                            class="fas fa-times"></i></span>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <textarea name="keys[]" class="input-field"
                                                                placeholder="Enter Language Key"
                                                                required="">Enter Title Text</textarea>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <textarea name="values[]" class="input-field"
                                                                placeholder="Enter Language Value"
                                                                required="">Enter Title Text</textarea>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="lang-area">
                                                    <span class="remove lang-remove"><i
                                                            class="fas fa-times"></i></span>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <textarea name="keys[]" class="input-field"
                                                                placeholder="Enter Language Key"
                                                                required="">Font Size</textarea>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <textarea name="values[]" class="input-field"
                                                                placeholder="Enter Language Value"
                                                                required="">Font Size</textarea>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="lang-area">
                                                    <span class="remove lang-remove"><i
                                                            class="fas fa-times"></i></span>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <textarea name="keys[]" class="input-field"
                                                                placeholder="Enter Language Key"
                                                                required="">Font Color</textarea>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <textarea name="values[]" class="input-field"
                                                                placeholder="Enter Language Value"
                                                                required="">Font Color</textarea>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="lang-area">
                                                    <span class="remove lang-remove"><i
                                                            class="fas fa-times"></i></span>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <textarea name="keys[]" class="input-field"
                                                                placeholder="Enter Language Key"
                                                                required="">Animation</textarea>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <textarea name="values[]" class="input-field"
                                                                placeholder="Enter Language Value"
                                                                required="">Animation</textarea>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="lang-area">
                                                    <span class="remove lang-remove"><i
                                                            class="fas fa-times"></i></span>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <textarea name="keys[]" class="input-field"
                                                                placeholder="Enter Language Key"
                                                                required="">Current Featured Image</textarea>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <textarea name="values[]" class="input-field"
                                                                placeholder="Enter Language Value"
                                                                required="">Current Featured Image</textarea>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="lang-area">
                                                    <span class="remove lang-remove"><i
                                                            class="fas fa-times"></i></span>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <textarea name="keys[]" class="input-field"
                                                                placeholder="Enter Language Key" required="">Link</textarea>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <textarea name="values[]" class="input-field"
                                                                placeholder="Enter Language Value"
                                                                required="">Link</textarea>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="lang-area">
                                                    <span class="remove lang-remove"><i
                                                            class="fas fa-times"></i></span>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <textarea name="keys[]" class="input-field"
                                                                placeholder="Enter Language Key"
                                                                required="">Text Position</textarea>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <textarea name="values[]" class="input-field"
                                                                placeholder="Enter Language Value"
                                                                required="">Text Position</textarea>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="lang-area">
                                                    <span class="remove lang-remove"><i
                                                            class="fas fa-times"></i></span>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <textarea name="keys[]" class="input-field"
                                                                placeholder="Enter Language Key"
                                                                required="">Select Position</textarea>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <textarea name="values[]" class="input-field"
                                                                placeholder="Enter Language Value"
                                                                required="">Select Position</textarea>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="lang-area">
                                                    <span class="remove lang-remove"><i
                                                            class="fas fa-times"></i></span>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <textarea name="keys[]" class="input-field"
                                                                placeholder="Enter Language Key"
                                                                required="">Create Slider</textarea>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <textarea name="values[]" class="input-field"
                                                                placeholder="Enter Language Value"
                                                                required="">Create Slider</textarea>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="lang-area">
                                                    <span class="remove lang-remove"><i
                                                            class="fas fa-times"></i></span>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <textarea name="keys[]" class="input-field"
                                                                placeholder="Enter Language Key"
                                                                required="">You are about to delete this Slider</textarea>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <textarea name="values[]" class="input-field"
                                                                placeholder="Enter Language Value"
                                                                required="">You are about to delete this Slider</textarea>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="lang-area">
                                                    <span class="remove lang-remove"><i
                                                            class="fas fa-times"></i></span>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <textarea name="keys[]" class="input-field"
                                                                placeholder="Enter Language Key"
                                                                required="">Informations</textarea>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <textarea name="values[]" class="input-field"
                                                                placeholder="Enter Language Value"
                                                                required="">Informations</textarea>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="lang-area">
                                                    <span class="remove lang-remove"><i
                                                            class="fas fa-times"></i></span>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <textarea name="keys[]" class="input-field"
                                                                placeholder="Enter Language Key"
                                                                required="">Create Feature</textarea>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <textarea name="values[]" class="input-field"
                                                                placeholder="Enter Language Value"
                                                                required="">Create Feature</textarea>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="lang-area">
                                                    <span class="remove lang-remove"><i
                                                            class="fas fa-times"></i></span>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <textarea name="keys[]" class="input-field"
                                                                placeholder="Enter Language Key"
                                                                required="">You are about to delete this Feature</textarea>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <textarea name="values[]" class="input-field"
                                                                placeholder="Enter Language Value"
                                                                required="">You are about to delete this Feature</textarea>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="lang-area">
                                                    <span class="remove lang-remove"><i
                                                            class="fas fa-times"></i></span>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <textarea name="keys[]" class="input-field"
                                                                placeholder="Enter Language Key"
                                                                required="">Category Title</textarea>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <textarea name="values[]" class="input-field"
                                                                placeholder="Enter Language Value"
                                                                required="">Category Title</textarea>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="lang-area">
                                                    <span class="remove lang-remove"><i
                                                            class="fas fa-times"></i></span>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <textarea name="keys[]" class="input-field"
                                                                placeholder="Enter Language Key"
                                                                required="">Category Text</textarea>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <textarea name="values[]" class="input-field"
                                                                placeholder="Enter Language Value"
                                                                required="">Category Text</textarea>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="lang-area">
                                                    <span class="remove lang-remove"><i
                                                            class="fas fa-times"></i></span>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <textarea name="keys[]" class="input-field"
                                                                placeholder="Enter Language Key"
                                                                required="">Auction Title</textarea>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <textarea name="values[]" class="input-field"
                                                                placeholder="Enter Language Value"
                                                                required="">Auction Title</textarea>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="lang-area">
                                                    <span class="remove lang-remove"><i
                                                            class="fas fa-times"></i></span>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <textarea name="keys[]" class="input-field"
                                                                placeholder="Enter Language Key"
                                                                required="">Auction Description</textarea>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <textarea name="values[]" class="input-field"
                                                                placeholder="Enter Language Value"
                                                                required="">Auction Description</textarea>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="lang-area">
                                                    <span class="remove lang-remove"><i
                                                            class="fas fa-times"></i></span>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <textarea name="keys[]" class="input-field"
                                                                placeholder="Enter Language Key"
                                                                required="">Background</textarea>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <textarea name="values[]" class="input-field"
                                                                placeholder="Enter Language Value"
                                                                required="">Background</textarea>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="lang-area">
                                                    <span class="remove lang-remove"><i
                                                            class="fas fa-times"></i></span>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <textarea name="keys[]" class="input-field"
                                                                placeholder="Enter Language Key"
                                                                required="">Sub title</textarea>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <textarea name="values[]" class="input-field"
                                                                placeholder="Enter Language Value"
                                                                required="">Sub title</textarea>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="lang-area">
                                                    <span class="remove lang-remove"><i
                                                            class="fas fa-times"></i></span>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <textarea name="keys[]" class="input-field"
                                                                placeholder="Enter Language Key"
                                                                required="">Enter Subtitle</textarea>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <textarea name="values[]" class="input-field"
                                                                placeholder="Enter Language Value"
                                                                required="">Enter Subtitle</textarea>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="lang-area">
                                                    <span class="remove lang-remove"><i
                                                            class="fas fa-times"></i></span>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <textarea name="keys[]" class="input-field"
                                                                placeholder="Enter Language Key"
                                                                required="">Enter Text</textarea>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <textarea name="values[]" class="input-field"
                                                                placeholder="Enter Language Value"
                                                                required="">Enter Text</textarea>
                                                        </div>
                                                    </div>
                                                </div>







                                                <div class="lang-area">
                                                    <span class="remove lang-remove"><i
                                                            class="fas fa-times"></i></span>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <textarea name="keys[]" class="input-field"
                                                                placeholder="Enter Language Key"
                                                                required="">Video Presentation Informations</textarea>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <textarea name="values[]" class="input-field"
                                                                placeholder="Enter Language Value"
                                                                required="">Video Presentation Informations</textarea>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="lang-area">
                                                    <span class="remove lang-remove"><i
                                                            class="fas fa-times"></i></span>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <textarea name="keys[]" class="input-field"
                                                                placeholder="Enter Language Key"
                                                                required="">Youtube Link</textarea>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <textarea name="values[]" class="input-field"
                                                                placeholder="Enter Language Value"
                                                                required="">Youtube Link</textarea>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="lang-area">
                                                    <span class="remove lang-remove"><i
                                                            class="fas fa-times"></i></span>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <textarea name="keys[]" class="input-field"
                                                                placeholder="Enter Language Key"
                                                                required="">Reviews</textarea>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <textarea name="values[]" class="input-field"
                                                                placeholder="Enter Language Value"
                                                                required="">Reviews</textarea>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="lang-area">
                                                    <span class="remove lang-remove"><i
                                                            class="fas fa-times"></i></span>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <textarea name="keys[]" class="input-field"
                                                                placeholder="Enter Language Key"
                                                                required="">Create Review</textarea>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <textarea name="values[]" class="input-field"
                                                                placeholder="Enter Language Value"
                                                                required="">Create Review</textarea>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="lang-area">
                                                    <span class="remove lang-remove"><i
                                                            class="fas fa-times"></i></span>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <textarea name="keys[]" class="input-field"
                                                                placeholder="Enter Language Key"
                                                                required="">You are about to delete this Review</textarea>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <textarea name="values[]" class="input-field"
                                                                placeholder="Enter Language Value"
                                                                required="">You are about to delete this Review</textarea>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="lang-area">
                                                    <span class="remove lang-remove"><i
                                                            class="fas fa-times"></i></span>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <textarea name="keys[]" class="input-field"
                                                                placeholder="Enter Language Key"
                                                                required="">Latest Blog Section</textarea>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <textarea name="values[]" class="input-field"
                                                                placeholder="Enter Language Value"
                                                                required="">Latest Blog Section</textarea>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="lang-area">
                                                    <span class="remove lang-remove"><i
                                                            class="fas fa-times"></i></span>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <textarea name="keys[]" class="input-field"
                                                                placeholder="Enter Language Key"
                                                                required="">Subtitle</textarea>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <textarea name="values[]" class="input-field"
                                                                placeholder="Enter Language Value"
                                                                required="">Subtitle</textarea>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="lang-area">
                                                    <span class="remove lang-remove"><i
                                                            class="fas fa-times"></i></span>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <textarea name="keys[]" class="input-field"
                                                                placeholder="Enter Language Key"
                                                                required="">Auction Categories</textarea>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <textarea name="values[]" class="input-field"
                                                                placeholder="Enter Language Value"
                                                                required="">Auction Categories</textarea>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="lang-area">
                                                    <span class="remove lang-remove"><i
                                                            class="fas fa-times"></i></span>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <textarea name="keys[]" class="input-field"
                                                                placeholder="Enter Language Key"
                                                                required="">Review section</textarea>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <textarea name="values[]" class="input-field"
                                                                placeholder="Enter Language Value"
                                                                required="">Review section</textarea>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="lang-area">
                                                    <span class="remove lang-remove"><i
                                                            class="fas fa-times"></i></span>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <textarea name="keys[]" class="input-field"
                                                                placeholder="Enter Language Key" required="">Faq</textarea>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <textarea name="values[]" class="input-field"
                                                                placeholder="Enter Language Value"
                                                                required="">Faq</textarea>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="lang-area">
                                                    <span class="remove lang-remove"><i
                                                            class="fas fa-times"></i></span>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <textarea name="keys[]" class="input-field"
                                                                placeholder="Enter Language Key"
                                                                required="">Faq Title</textarea>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <textarea name="values[]" class="input-field"
                                                                placeholder="Enter Language Value"
                                                                required="">Faq Title</textarea>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="lang-area">
                                                    <span class="remove lang-remove"><i
                                                            class="fas fa-times"></i></span>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <textarea name="keys[]" class="input-field"
                                                                placeholder="Enter Language Key"
                                                                required="">Faq Details</textarea>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <textarea name="values[]" class="input-field"
                                                                placeholder="Enter Language Value"
                                                                required="">Faq Details</textarea>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="lang-area">
                                                    <span class="remove lang-remove"><i
                                                            class="fas fa-times"></i></span>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <textarea name="keys[]" class="input-field"
                                                                placeholder="Enter Language Key"
                                                                required="">Create FAQ</textarea>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <textarea name="values[]" class="input-field"
                                                                placeholder="Enter Language Value"
                                                                required="">Create FAQ</textarea>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="lang-area">
                                                    <span class="remove lang-remove"><i
                                                            class="fas fa-times"></i></span>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <textarea name="keys[]" class="input-field"
                                                                placeholder="Enter Language Key"
                                                                required="">You are about to delete this Faq</textarea>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <textarea name="values[]" class="input-field"
                                                                placeholder="Enter Language Value"
                                                                required="">You are about to delete this Faq</textarea>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="lang-area">
                                                    <span class="remove lang-remove"><i
                                                            class="fas fa-times"></i></span>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <textarea name="keys[]" class="input-field"
                                                                placeholder="Enter Language Key"
                                                                required="">Page Settings</textarea>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <textarea name="values[]" class="input-field"
                                                                placeholder="Enter Language Value"
                                                                required="">Page Settings</textarea>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="lang-area">
                                                    <span class="remove lang-remove"><i
                                                            class="fas fa-times"></i></span>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <textarea name="keys[]" class="input-field"
                                                                placeholder="Enter Language Key"
                                                                required="">Contact Page</textarea>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <textarea name="values[]" class="input-field"
                                                                placeholder="Enter Language Value"
                                                                required="">Contact Page</textarea>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="lang-area">
                                                    <span class="remove lang-remove"><i
                                                            class="fas fa-times"></i></span>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <textarea name="keys[]" class="input-field"
                                                                placeholder="Enter Language Key"
                                                                required="">Contact Us Email Address</textarea>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <textarea name="values[]" class="input-field"
                                                                placeholder="Enter Language Value"
                                                                required="">Contact Us Email Address</textarea>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="lang-area">
                                                    <span class="remove lang-remove"><i
                                                            class="fas fa-times"></i></span>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <textarea name="keys[]" class="input-field"
                                                                placeholder="Enter Language Key"
                                                                required="">Contact Form Success Text</textarea>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <textarea name="values[]" class="input-field"
                                                                placeholder="Enter Language Value"
                                                                required="">Contact Form Success Text</textarea>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="lang-area">
                                                    <span class="remove lang-remove"><i
                                                            class="fas fa-times"></i></span>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <textarea name="keys[]" class="input-field"
                                                                placeholder="Enter Language Key"
                                                                required="">Website</textarea>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <textarea name="values[]" class="input-field"
                                                                placeholder="Enter Language Value"
                                                                required="">Website</textarea>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="lang-area">
                                                    <span class="remove lang-remove"><i
                                                            class="fas fa-times"></i></span>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <textarea name="keys[]" class="input-field"
                                                                placeholder="Enter Language Key"
                                                                required="">Street Address</textarea>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <textarea name="values[]" class="input-field"
                                                                placeholder="Enter Language Value"
                                                                required="">Street Address</textarea>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="lang-area">
                                                    <span class="remove lang-remove"><i
                                                            class="fas fa-times"></i></span>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <textarea name="keys[]" class="input-field"
                                                                placeholder="Enter Language Key"
                                                                required="">Enter Street Address</textarea>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <textarea name="values[]" class="input-field"
                                                                placeholder="Enter Language Value"
                                                                required="">Enter Street Address</textarea>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="lang-area">
                                                    <span class="remove lang-remove"><i
                                                            class="fas fa-times"></i></span>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <textarea name="keys[]" class="input-field"
                                                                placeholder="Enter Language Key"
                                                                required="">Page Title</textarea>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <textarea name="values[]" class="input-field"
                                                                placeholder="Enter Language Value"
                                                                required="">Page Title</textarea>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="lang-area">
                                                    <span class="remove lang-remove"><i
                                                            class="fas fa-times"></i></span>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <textarea name="keys[]" class="input-field"
                                                                placeholder="Enter Language Key"
                                                                required="">Page Details</textarea>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <textarea name="values[]" class="input-field"
                                                                placeholder="Enter Language Value"
                                                                required="">Page Details</textarea>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="lang-area">
                                                    <span class="remove lang-remove"><i
                                                            class="fas fa-times"></i></span>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <textarea name="keys[]" class="input-field"
                                                                placeholder="Enter Language Key"
                                                                required="">In English</textarea>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <textarea name="values[]" class="input-field"
                                                                placeholder="Enter Language Value"
                                                                required="">In English</textarea>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="lang-area">
                                                    <span class="remove lang-remove"><i
                                                            class="fas fa-times"></i></span>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <textarea name="keys[]" class="input-field"
                                                                placeholder="Enter Language Key"
                                                                required="">Create Page</textarea>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <textarea name="values[]" class="input-field"
                                                                placeholder="Enter Language Value"
                                                                required="">Create Page</textarea>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="lang-area">
                                                    <span class="remove lang-remove"><i
                                                            class="fas fa-times"></i></span>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <textarea name="keys[]" class="input-field"
                                                                placeholder="Enter Language Key"
                                                                required="">Meta Tags</textarea>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <textarea name="values[]" class="input-field"
                                                                placeholder="Enter Language Value"
                                                                required="">Meta Tags</textarea>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="lang-area">
                                                    <span class="remove lang-remove"><i
                                                            class="fas fa-times"></i></span>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <textarea name="keys[]" class="input-field"
                                                                placeholder="Enter Language Key"
                                                                required="">Meta Description</textarea>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <textarea name="values[]" class="input-field"
                                                                placeholder="Enter Language Value"
                                                                required="">Meta Description</textarea>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="lang-area">
                                                    <span class="remove lang-remove"><i
                                                            class="fas fa-times"></i></span>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <textarea name="keys[]" class="input-field"
                                                                placeholder="Enter Language Key"
                                                                required="">You are about to delete this Page</textarea>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <textarea name="values[]" class="input-field"
                                                                placeholder="Enter Language Value"
                                                                required="">You are about to delete this Page</textarea>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="lang-area">
                                                    <span class="remove lang-remove"><i
                                                            class="fas fa-times"></i></span>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <textarea name="keys[]" class="input-field"
                                                                placeholder="Enter Language Key"
                                                                required="">Email Configuration</textarea>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <textarea name="values[]" class="input-field"
                                                                placeholder="Enter Language Value"
                                                                required="">Email Configuration</textarea>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="lang-area">
                                                    <span class="remove lang-remove"><i
                                                            class="fas fa-times"></i></span>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <textarea name="keys[]" class="input-field"
                                                                placeholder="Enter Language Key" required="">SMTP</textarea>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <textarea name="values[]" class="input-field"
                                                                placeholder="Enter Language Value"
                                                                required="">SMTP</textarea>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="lang-area">
                                                    <span class="remove lang-remove"><i
                                                            class="fas fa-times"></i></span>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <textarea name="keys[]" class="input-field"
                                                                placeholder="Enter Language Key"
                                                                required="">SMTP Host</textarea>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <textarea name="values[]" class="input-field"
                                                                placeholder="Enter Language Value"
                                                                required="">SMTP Host</textarea>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="lang-area">
                                                    <span class="remove lang-remove"><i
                                                            class="fas fa-times"></i></span>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <textarea name="keys[]" class="input-field"
                                                                placeholder="Enter Language Key"
                                                                required="">SMTP Port</textarea>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <textarea name="values[]" class="input-field"
                                                                placeholder="Enter Language Value"
                                                                required="">SMTP Port</textarea>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="lang-area">
                                                    <span class="remove lang-remove"><i
                                                            class="fas fa-times"></i></span>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <textarea name="keys[]" class="input-field"
                                                                placeholder="Enter Language Key"
                                                                required="">SMTP Username</textarea>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <textarea name="values[]" class="input-field"
                                                                placeholder="Enter Language Value"
                                                                required="">SMTP Username</textarea>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="lang-area">
                                                    <span class="remove lang-remove"><i
                                                            class="fas fa-times"></i></span>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <textarea name="keys[]" class="input-field"
                                                                placeholder="Enter Language Key"
                                                                required="">SMTP Password</textarea>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <textarea name="values[]" class="input-field"
                                                                placeholder="Enter Language Value"
                                                                required="">SMTP Password</textarea>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="lang-area">
                                                    <span class="remove lang-remove"><i
                                                            class="fas fa-times"></i></span>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <textarea name="keys[]" class="input-field"
                                                                placeholder="Enter Language Key"
                                                                required="">From Email</textarea>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <textarea name="values[]" class="input-field"
                                                                placeholder="Enter Language Value"
                                                                required="">From Email</textarea>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="lang-area">
                                                    <span class="remove lang-remove"><i
                                                            class="fas fa-times"></i></span>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <textarea name="keys[]" class="input-field"
                                                                placeholder="Enter Language Key"
                                                                required="">From Name</textarea>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <textarea name="values[]" class="input-field"
                                                                placeholder="Enter Language Value"
                                                                required="">From Name</textarea>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="lang-area">
                                                    <span class="remove lang-remove"><i
                                                            class="fas fa-times"></i></span>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <textarea name="keys[]" class="input-field"
                                                                placeholder="Enter Language Key"
                                                                required="">Select User Type</textarea>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <textarea name="values[]" class="input-field"
                                                                placeholder="Enter Language Value"
                                                                required="">Select User Type</textarea>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="lang-area">
                                                    <span class="remove lang-remove"><i
                                                            class="fas fa-times"></i></span>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <textarea name="keys[]" class="input-field"
                                                                placeholder="Enter Language Key"
                                                                required="">Email Subject</textarea>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <textarea name="values[]" class="input-field"
                                                                placeholder="Enter Language Value"
                                                                required="">Email Subject</textarea>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="lang-area">
                                                    <span class="remove lang-remove"><i
                                                            class="fas fa-times"></i></span>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <textarea name="keys[]" class="input-field"
                                                                placeholder="Enter Language Key"
                                                                required="">Stripe</textarea>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <textarea name="values[]" class="input-field"
                                                                placeholder="Enter Language Value"
                                                                required="">Stripe</textarea>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="lang-area">
                                                    <span class="remove lang-remove"><i
                                                            class="fas fa-times"></i></span>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <textarea name="keys[]" class="input-field"
                                                                placeholder="Enter Language Key"
                                                                required="">Paypal</textarea>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <textarea name="values[]" class="input-field"
                                                                placeholder="Enter Language Value"
                                                                required="">Paypal</textarea>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="lang-area">
                                                    <span class="remove lang-remove"><i
                                                            class="fas fa-times"></i></span>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <textarea name="keys[]" class="input-field"
                                                                placeholder="Enter Language Key"
                                                                required="">Paypal Business Email</textarea>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <textarea name="values[]" class="input-field"
                                                                placeholder="Enter Language Value"
                                                                required="">Paypal Business Email</textarea>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="lang-area">
                                                    <span class="remove lang-remove"><i
                                                            class="fas fa-times"></i></span>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <textarea name="keys[]" class="input-field"
                                                                placeholder="Enter Language Key"
                                                                required="">Stripe Key</textarea>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <textarea name="values[]" class="input-field"
                                                                placeholder="Enter Language Value"
                                                                required="">Stripe Key</textarea>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="lang-area">
                                                    <span class="remove lang-remove"><i
                                                            class="fas fa-times"></i></span>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <textarea name="keys[]" class="input-field"
                                                                placeholder="Enter Language Key"
                                                                required="">Stripe Secret</textarea>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <textarea name="values[]" class="input-field"
                                                                placeholder="Enter Language Value"
                                                                required="">Stripe Secret</textarea>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="lang-area">
                                                    <span class="remove lang-remove"><i
                                                            class="fas fa-times"></i></span>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <textarea name="keys[]" class="input-field"
                                                                placeholder="Enter Language Key"
                                                                required="">Auction Pay Amount</textarea>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <textarea name="values[]" class="input-field"
                                                                placeholder="Enter Language Value"
                                                                required="">Auction Pay Amount</textarea>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="lang-area">
                                                    <span class="remove lang-remove"><i
                                                            class="fas fa-times"></i></span>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <textarea name="keys[]" class="input-field"
                                                                placeholder="Enter Language Key"
                                                                required="">Withdraw Fee</textarea>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <textarea name="values[]" class="input-field"
                                                                placeholder="Enter Language Value"
                                                                required="">Withdraw Fee</textarea>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="lang-area">
                                                    <span class="remove lang-remove"><i
                                                            class="fas fa-times"></i></span>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <textarea name="keys[]" class="input-field"
                                                                placeholder="Enter Language Key"
                                                                required="">Currency Code</textarea>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <textarea name="values[]" class="input-field"
                                                                placeholder="Enter Language Value"
                                                                required="">Currency Code</textarea>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="lang-area">
                                                    <span class="remove lang-remove"><i
                                                            class="fas fa-times"></i></span>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <textarea name="keys[]" class="input-field"
                                                                placeholder="Enter Language Key"
                                                                required="">Currency Sign</textarea>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <textarea name="values[]" class="input-field"
                                                                placeholder="Enter Language Value"
                                                                required="">Currency Sign</textarea>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="lang-area">
                                                    <span class="remove lang-remove"><i
                                                            class="fas fa-times"></i></span>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <textarea name="keys[]" class="input-field"
                                                                placeholder="Enter Language Key"
                                                                required="">Currency Format</textarea>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <textarea name="values[]" class="input-field"
                                                                placeholder="Enter Language Value"
                                                                required="">Currency Format</textarea>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="lang-area">
                                                    <span class="remove lang-remove"><i
                                                            class="fas fa-times"></i></span>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <textarea name="keys[]" class="input-field"
                                                                placeholder="Enter Language Key"
                                                                required="">Facebook</textarea>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <textarea name="values[]" class="input-field"
                                                                placeholder="Enter Language Value"
                                                                required="">Facebook</textarea>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="lang-area">
                                                    <span class="remove lang-remove"><i
                                                            class="fas fa-times"></i></span>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <textarea name="keys[]" class="input-field"
                                                                placeholder="Enter Language Key"
                                                                required="">Google Plus</textarea>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <textarea name="values[]" class="input-field"
                                                                placeholder="Enter Language Value"
                                                                required="">Google Plus</textarea>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="lang-area">
                                                    <span class="remove lang-remove"><i
                                                            class="fas fa-times"></i></span>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <textarea name="keys[]" class="input-field"
                                                                placeholder="Enter Language Key"
                                                                required="">Twitter</textarea>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <textarea name="values[]" class="input-field"
                                                                placeholder="Enter Language Value"
                                                                required="">Twitter</textarea>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="lang-area">
                                                    <span class="remove lang-remove"><i
                                                            class="fas fa-times"></i></span>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <textarea name="keys[]" class="input-field"
                                                                placeholder="Enter Language Key"
                                                                required="">Linkedin</textarea>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <textarea name="values[]" class="input-field"
                                                                placeholder="Enter Language Value"
                                                                required="">Linkedin</textarea>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="lang-area">
                                                    <span class="remove lang-remove"><i
                                                            class="fas fa-times"></i></span>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <textarea name="keys[]" class="input-field"
                                                                placeholder="Enter Language Key"
                                                                required="">Dribble</textarea>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <textarea name="values[]" class="input-field"
                                                                placeholder="Enter Language Value"
                                                                required="">Dribble</textarea>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="lang-area">
                                                    <span class="remove lang-remove"><i
                                                            class="fas fa-times"></i></span>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <textarea name="keys[]" class="input-field"
                                                                placeholder="Enter Language Key"
                                                                required="">Languages</textarea>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <textarea name="values[]" class="input-field"
                                                                placeholder="Enter Language Value"
                                                                required="">Languages</textarea>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="lang-area">
                                                    <span class="remove lang-remove"><i
                                                            class="fas fa-times"></i></span>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <textarea name="keys[]" class="input-field"
                                                                placeholder="Enter Language Key"
                                                                required="">Options</textarea>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <textarea name="values[]" class="input-field"
                                                                placeholder="Enter Language Value"
                                                                required="">Options</textarea>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="lang-area">
                                                    <span class="remove lang-remove"><i
                                                            class="fas fa-times"></i></span>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <textarea name="keys[]" class="input-field"
                                                                placeholder="Enter Language Key"
                                                                required="">Add Language</textarea>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <textarea name="values[]" class="input-field"
                                                                placeholder="Enter Language Value"
                                                                required="">Add Language</textarea>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="lang-area">
                                                    <span class="remove lang-remove"><i
                                                            class="fas fa-times"></i></span>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <textarea name="keys[]" class="input-field"
                                                                placeholder="Enter Language Key"
                                                                required="">Admin Panel Language</textarea>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <textarea name="values[]" class="input-field"
                                                                placeholder="Enter Language Value"
                                                                required="">Admin Panel Language</textarea>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="lang-area">
                                                    <span class="remove lang-remove"><i
                                                            class="fas fa-times"></i></span>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <textarea name="keys[]" class="input-field"
                                                                placeholder="Enter Language Key"
                                                                required="">Create Language</textarea>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <textarea name="values[]" class="input-field"
                                                                placeholder="Enter Language Value"
                                                                required="">Create Language</textarea>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="lang-area">
                                                    <span class="remove lang-remove"><i
                                                            class="fas fa-times"></i></span>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <textarea name="keys[]" class="input-field"
                                                                placeholder="Enter Language Key"
                                                                required="">Edit Language</textarea>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <textarea name="values[]" class="input-field"
                                                                placeholder="Enter Language Value"
                                                                required="">Edit Language</textarea>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="lang-area">
                                                    <span class="remove lang-remove"><i
                                                            class="fas fa-times"></i></span>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <textarea name="keys[]" class="input-field"
                                                                placeholder="Enter Language Key" required="">Edit</textarea>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <textarea name="values[]" class="input-field"
                                                                placeholder="Enter Language Value"
                                                                required="">Edit</textarea>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="lang-area">
                                                    <span class="remove lang-remove"><i
                                                            class="fas fa-times"></i></span>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <textarea name="keys[]" class="input-field"
                                                                placeholder="Enter Language Key"
                                                                required="">Google Analytics Script</textarea>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <textarea name="values[]" class="input-field"
                                                                placeholder="Enter Language Value"
                                                                required="">Google Analytics Script</textarea>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="lang-area">
                                                    <span class="remove lang-remove"><i
                                                            class="fas fa-times"></i></span>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <textarea name="keys[]" class="input-field"
                                                                placeholder="Enter Language Key" required="">Role</textarea>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <textarea name="values[]" class="input-field"
                                                                placeholder="Enter Language Value"
                                                                required="">Role</textarea>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="lang-area">
                                                    <span class="remove lang-remove"><i
                                                            class="fas fa-times"></i></span>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <textarea name="keys[]" class="input-field"
                                                                placeholder="Enter Language Key"
                                                                required="">Create Staff</textarea>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <textarea name="values[]" class="input-field"
                                                                placeholder="Enter Language Value"
                                                                required="">Create Staff</textarea>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="lang-area">
                                                    <span class="remove lang-remove"><i
                                                            class="fas fa-times"></i></span>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <textarea name="keys[]" class="input-field"
                                                                placeholder="Enter Language Key"
                                                                required="">Staff ID</textarea>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <textarea name="values[]" class="input-field"
                                                                placeholder="Enter Language Value"
                                                                required="">Staff ID</textarea>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="lang-area">
                                                    <span class="remove lang-remove"><i
                                                            class="fas fa-times"></i></span>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <textarea name="keys[]" class="input-field"
                                                                placeholder="Enter Language Key"
                                                                required="">Staff Photo</textarea>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <textarea name="values[]" class="input-field"
                                                                placeholder="Enter Language Value"
                                                                required="">Staff Photo</textarea>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="lang-area">
                                                    <span class="remove lang-remove"><i
                                                            class="fas fa-times"></i></span>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <textarea name="keys[]" class="input-field"
                                                                placeholder="Enter Language Key"
                                                                required="">Staff Name</textarea>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <textarea name="values[]" class="input-field"
                                                                placeholder="Enter Language Value"
                                                                required="">Staff Name</textarea>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="lang-area">
                                                    <span class="remove lang-remove"><i
                                                            class="fas fa-times"></i></span>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <textarea name="keys[]" class="input-field"
                                                                placeholder="Enter Language Key"
                                                                required="">Staff Role</textarea>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <textarea name="values[]" class="input-field"
                                                                placeholder="Enter Language Value"
                                                                required="">Staff Role</textarea>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="lang-area">
                                                    <span class="remove lang-remove"><i
                                                            class="fas fa-times"></i></span>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <textarea name="keys[]" class="input-field"
                                                                placeholder="Enter Language Key"
                                                                required="">Staff Email</textarea>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <textarea name="values[]" class="input-field"
                                                                placeholder="Enter Language Value"
                                                                required="">Staff Email</textarea>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="lang-area">
                                                    <span class="remove lang-remove"><i
                                                            class="fas fa-times"></i></span>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <textarea name="keys[]" class="input-field"
                                                                placeholder="Enter Language Key"
                                                                required="">Staff Phone</textarea>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <textarea name="values[]" class="input-field"
                                                                placeholder="Enter Language Value"
                                                                required="">Staff Phone</textarea>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="lang-area">
                                                    <span class="remove lang-remove"><i
                                                            class="fas fa-times"></i></span>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <textarea name="keys[]" class="input-field"
                                                                placeholder="Enter Language Key"
                                                                required="">Joined</textarea>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <textarea name="values[]" class="input-field"
                                                                placeholder="Enter Language Value"
                                                                required="">Joined</textarea>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="lang-area">
                                                    <span class="remove lang-remove"><i
                                                            class="fas fa-times"></i></span>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <textarea name="keys[]" class="input-field"
                                                                placeholder="Enter Language Key"
                                                                required="">You are about to delete this Staff</textarea>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <textarea name="values[]" class="input-field"
                                                                placeholder="Enter Language Value"
                                                                required="">You are about to delete this Staff</textarea>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="lang-area">
                                                    <span class="remove lang-remove"><i
                                                            class="fas fa-times"></i></span>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <textarea name="keys[]" class="input-field"
                                                                placeholder="Enter Language Key"
                                                                required="">You are about to delete this Auction</textarea>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <textarea name="values[]" class="input-field"
                                                                placeholder="Enter Language Value"
                                                                required="">You are about to delete this Auction</textarea>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="lang-area">
                                                    <span class="remove lang-remove"><i
                                                            class="fas fa-times"></i></span>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <textarea name="keys[]" class="input-field"
                                                                placeholder="Enter Language Key"
                                                                required="">You are about to delete this Customer</textarea>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <textarea name="values[]" class="input-field"
                                                                placeholder="Enter Language Value"
                                                                required="">You are about to delete this Customer</textarea>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="lang-area">
                                                    <span class="remove lang-remove"><i
                                                            class="fas fa-times"></i></span>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <textarea name="keys[]" class="input-field"
                                                                placeholder="Enter Language Key"
                                                                required="">You are about to delete this Post</textarea>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <textarea name="values[]" class="input-field"
                                                                placeholder="Enter Language Value"
                                                                required="">You are about to delete this Post</textarea>
                                                        </div>
                                                    </div>
                                                </div>


                                            </div>
                                            <a href="javascript:;" id="lang-btn" class="add-fild-btn"><i
                                                    class="icofont-plus"></i> Add More Field</a>
                                        </div>
                                    </div>

                                    <div class="col-lg-2">
                                        <div class="left-area">

                                        </div>
                                    </div>

                                </div>

                                <hr>
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="left-area">

                                        </div>
                                    </div>
                                    <div class="col-lg-7">
                                        <button class="addProductSubmit-btn"
                                            type="submit">{{ __('Create Language') }}</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')

    <script type="text/javascript">
        function isEmpty(el) {
            return !$.trim(el.html())
        }


        $("#lang-btn").on('click', function() {

            $("#lang-section").append('' +
                '<div class="lang-area">' +
                '<span class="remove lang-remove"><i class="fas fa-times"></i></span>' +
                '<div class="row">' +
                '<div class="col-lg-6">' +
                '<textarea name="keys[]" class="input-field" placeholder="{{ __('Enter Language Key') }}" required=""></textarea>' +
                '</div>' +
                '<div class="col-lg-6">' +
                '<textarea  name="values[]" class="input-field" placeholder="{{ __('Enter Language Value') }}" required=""></textarea>' +
                '</div>' +
                '</div>' +
                '</div>' +
                '');

        });

        $(document).on('click', '.lang-remove', function() {

            $(this.parentNode).remove();
            if (isEmpty($('#lang-section'))) {

                $("#lang-section").append('' +
                    '<div class="lang-area">' +
                    '<span class="remove lang-remove"><i class="fas fa-times"></i></span>' +
                    '<div class="row">' +
                    '<div class="col-lg-6">' +
                    '<textarea name="keys[]" class="input-field" placeholder="{{ __('Enter Language Key') }}" required=""></textarea>' +
                    '</div>' +
                    '<div class="col-lg-6">' +
                    '<textarea  name="values[]" class="input-field" placeholder="{{ __('Enter Language Value') }}" required=""></textarea>' +
                    '</div>' +
                    '</div>' +
                    '</div>' +
                    '');


            }

        });
    </script>

@endsection
