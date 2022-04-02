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
                    <a href="{{ route('seller.dashboard') }}">{{ __('Dashboard') }}</a>
                </li>
                <li>
                    <span>{{ __('My profile') }}</span>
                </li>
            </ul>
        </div>
        <div class="bg_img hero-bg bottom_center"
            data-background="{{ asset('assets/front-new/images/banner/hero-bg.png') }}"></div>
    </div>
    {{-- ============ Hero Section Ends Here ============ --}}

    {{-- ============ Dashboard Section Starts Here ============ --}}
    <section class="dashboard-section padding-bottom mt--240 mt-lg--440 pos-rel">
        <div class="container">
            <div class="row justify-content-center">
                {{-- Sidebar Starts --}}
                @include('layouts.partials.seller.sidebar')
                {{-- Sidebar Ends --}}
                <div class="col-lg-8">
                    <div class="row">
                        <div class="col-12">
                            <div class="dash-pro-item mb-30 dashboard-widget">
                                <div class="header">
                                    <h4 class="title">{{ __('Personal Details') }}</h4>
                                    <span class="edit"><i class="flaticon-edit"></i> {{ __('Edit') }}</span>
                                </div>
                                @include('includes.admin.form-both')
                                <form id="ghulamabbasform" name="user_profile"
                                    action="{{ route('seller.my_profile.update') }}" method="POST"
                                    enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    <ul class="dash-pro-body">
                                        <li class="row align-items-center mb-3 user-photo-wrapper">
                                            {{-- IMAGE HERE --}}
                                            <div class="col-lg-6">
                                                <div id="image-prv" class="image-preview">
                                                    <img src="{{ $data->photo ? asset('assets/images/users/' . $data->photo) : asset('assets/images/noimage.png') }}"
                                                        alt="user">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <label for="photo">
                                                    <i class="flaticon-cloud"></i>{{ __('Upload Image') }}
                                                    <input type="file" accept=".jpeg,.jpg,.png" name="photo" id="photo">
                                                </label>
                                                <p>{{ __('Prefered Size: (600x600) or Square Sized Image.') }}</p>
                                            </div>
                                        </li>

                                        <li class="row align-items-center mb-3 user-photo-wrapper">
                                            {{-- Cover IMAGE HERE --}}
                                            <div class="col-lg-6">
                                                <div id="cover-image-prv" class="image-preview">
                                                    <img src="{{ $data->cover_photo ? asset('assets/images/users/' . $data->cover_photo) : asset('assets/images/noimage.png') }}"
                                                        alt="seller">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <label for="cover_photo">
                                                    <i class="flaticon-cloud"></i>{{ __('Upload Cover Image') }}
                                                    <input type="file" accept=".jpeg,.jpg,.png" name="cover_photo" id="cover_photo">
                                                </label>
                                                <p>{{ __('Prefered Size: (1300x520) or Rectangular Sized Image.') }}</p>
                                            </div>
                                        </li>

                                        <li class="row align-items-center mb-3">
                                            <div class="info-name col-lg-2">{{ __('First Name') }}</div>
                                            <div class="info-value col-lg-10">
                                                <input type="text" name="first_name" placeholder="{{ __('First Name') }}"
                                                    required="" value="{{ $data->first_name }}">
                                            </div>
                                        </li>
                                        <li class="row align-items-center mb-3">
                                            <div class="info-name col-lg-2">{{ __('Last Name') }}</div>
                                            <div class="info-value col-lg-10">
                                                <input type="text" name="last_name" placeholder="{{ __('Last Name') }}"
                                                    required="" value="{{ $data->last_name }}">
                                            </div>
                                        </li>
                                        <li class="row align-items-center mb-3">
                                            <div class="info-name col-lg-2">{{ __('City') }}</div>
                                            <div class="info-value col-lg-10">
                                                <input type="text" name="city" placeholder="{{ __('City') }}"
                                                    required="" value="{{ $data->city }}">
                                            </div>
                                        </li>
                                        <li class="row align-items-center mb-3">
                                            <div class="info-name col-lg-2">{{ __('Address') }}</div>
                                            <div class="info-value col-lg-10">
                                                <input type="text" name="address" placeholder="{{ __('Address') }}"
                                                    required="" value="{{ $data->address }}">
                                            </div>
                                        </li>
                                        <li class="row align-items-center mb-3">
                                            <div class="info-name col-lg-2">{{ __('Zip') }}</div>
                                            <div class="info-value col-lg-10">
                                                <input type="text" name="zip" placeholder="{{ __('Zip') }}" required=""
                                                    value="{{ $data->zip }}">
                                            </div>
                                        </li>
                                        <button class="custom-button addProductSubmit-btn">Save</button>
                                    </ul>
                                </form>
                            </div>
                        </div>
                        {{-- <div class="col-12">
                            <div class="dash-pro-item mb-30 dashboard-widget">
                                <div class="header">
                                    <h4 class="title">Account Settings</h4>
                                    <span class="edit"><i class="flaticon-edit"></i> Edit</span>
                                </div>
                                <ul class="dash-pro-body">
                                    <li>
                                        <div class="info-name">Language</div>
                                        <div class="info-value">English (United States)</div>
                                    </li>
                                    <li>
                                        <div class="info-name">Time Zone</div>
                                        <div class="info-value">(GMT-06:00) Central America</div>
                                    </li>
                                    <li>
                                        <div class="info-name">Status</div>
                                        <div class="info-value"><i class="flaticon-check text-success"></i> Active</div>
                                    </li>
                                </ul>
                            </div>
                        </div> --}}
                        <div class="col-12">
                            <div class="dash-pro-item mb-30 dashboard-widget">
                                <div class="header">
                                    <h4 class="title">{{ __('Email Address') }}</h4>
                                    {{-- <span class="edit"><i class="flaticon-edit"></i> {{ __('Edit') }}</span> --}}
                                </div>
                                <ul class="dash-pro-body">
                                    <li class="row align-items-center mb-3">
                                        <div class="info-name col-lg-2">{{ __('Email') }}</div>
                                        <div class="info-value col-lg-10">
                                            <input type="email" name="email" placeholder="{{ __('Email') }}" readonly=""
                                                value="{{ $data->email }}">
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="dash-pro-item mb-30 dashboard-widget">
                                <div class="header">
                                    <h4 class="title">{{ __('Phone') }}</h4>
                                    <span class="edit"><i class="flaticon-edit"></i> {{ __('Edit') }}</span>
                                </div>
                                @include('includes.admin.form-both')
                                <form id="ghulamabbasform" action="{{ route('seller.my_profile.update') }}" method="POST">
                                    {{ csrf_field() }}
                                    <ul class="dash-pro-body">
                                        <li class="row align-items-center mb-3">
                                            <div class="info-name col-lg-2">{{ __('Phone') }}</div>
                                            <div class="info-value col-lg-10">
                                                <input type="text" name="phone" placeholder="{{ __('Phone') }}"
                                                    required="" value="{{ $data->phone }}">
                                            </div>
                                        </li>
                                        <button class="custom-button addProductSubmit-btn">Save</button>
                                    </ul>
                                </form>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="dash-pro-item dashboard-widget">
                                <div class="header">
                                    <h4 class="title">{{ __('Security') }}</h4>
                                    <span class="edit"><i class="flaticon-edit"></i> {{ __('Edit') }}</span>
                                </div>
                                @include('includes.admin.form-both')
                                <form id="ghulamabbasform" action="{{ route('seller.password.update') }}" method="POST"
                                    enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    <ul class="dash-pro-body">
                                        <li class="row align-items-center mb-3">
                                            <div class="info-name col-lg-2">{{ __('Current Password') }}</div>
                                            <div class="info-value col-lg-10">
                                                <input type="password" name="cpass"
                                                    placeholder="{{ __('Current Password') }}" required="">
                                            </div>
                                        </li>
                                        <li class="row align-items-center mb-3">
                                            <div class="info-name col-lg-2">{{ __('New Password') }}</div>
                                            <div class="info-value col-lg-10">
                                                <input type="password" name="newpass"
                                                    placeholder="{{ __('New Password') }}" required="">
                                            </div>
                                        </li>
                                        <li class="row align-items-center mb-3">
                                            <div class="info-name col-lg-2">{{ __('Re-Type New Password') }}</div>
                                            <div class="info-value col-lg-10">
                                                <input type="password" name="renewpass"
                                                    placeholder="{{ __('Re-Type New Password') }}" required="">
                                            </div>
                                        </li>
                                        <button class="custom-button addProductSubmit-btn">Save</button>
                                    </ul>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{-- ============ Dashboard Section Ends Here ============ --}}
@endsection

@section('scripts')
    {{-- Image Preview Starts --}}
    <script>
        if (document.forms.user_profile) {
            var userProfileFrom = document.forms.user_profile;
            var photoUpload = userProfileFrom.photo;
            photoUpload.addEventListener('change', function(e) {
                var imgaePreview = document.querySelector('#image-prv img');
                imgaePreview.src = URL.createObjectURL(e.target.files[0]);
                imgaePreview.addEventListener('load', function() {
                    URL.revokeObjectURL(imgaePreview.src);
                });
            });
        }
    </script>

    <script>
        if (document.forms.user_profile) {
            var userProfileFrom = document.forms.user_profile;
            var photoUpload = userProfileFrom.cover_photo;
            photoUpload.addEventListener('change', function(e) {
                var imgaePreview = document.querySelector('#cover-image-prv img');
                imgaePreview.src = URL.createObjectURL(e.target.files[0]);
                imgaePreview.addEventListener('load', function() {
                    URL.revokeObjectURL(imgaePreview.src);
                });
            });
        }
    </script>
    {{-- Image Preview Ends --}}
@endsection
