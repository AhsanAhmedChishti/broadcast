@extends('layouts.admin')

@section('content')

    <div class="content-area">
        <div class="mr-breadcrumb">
            <div class="row">
                <div class="col-lg-12">
                    <h4 class="heading">{{ __('Home Page Customization') }}</h4>
                    <ul class="links">
                        <li>
                            <a href="{{ route('admin.dashboard') }}">{{ __('Dashboard') }} </a>
                        </li>
                        <li>
                            <a href="javascript:;">{{ __('Home Page Settings') }}</a>
                        </li>
                        <li>
                            <a href="{{ route('admin-ps-customize') }}">{{ __('Home Page Customization') }}</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="add-product-content">
            <div class="row">
                <div class="col-lg-12">
                    <div class="product-description">
                        <div class="social-links-area">
                            <div class="gocover"
                                style="background: url({{ asset('assets/images/' . $gs->admin_loader) }}) no-repeat scroll center center rgba(45, 45, 45, 0.5);">
                            </div>

                            <form id="ghulamabbasform" action="{{ route('admin-ps-homeupdate') }}" method="POST"
                                enctype="multipart/form-data">
                                {{ csrf_field() }}

                                @include('includes.admin.form-both')


                                <div class="row justify-content-center">
                                    <div class="col-lg-4 d-flex justify-content-between">
                                        <label class="control-label" for="slider">{{ __('Sliders') }} *</label>
                                        <label class="switch float-right">
                                            <input type="checkbox" name="slider" value="1"
                                                {{ $data->slider == 1 ? 'checked' : '' }}>
                                            <span class="slider round"></span>
                                        </label>
                                    </div>
                                    <div class="col-lg-2"></div>

                                    <div class="col-lg-4 d-flex justify-content-between">
                                        <label class="control-label" for="service">{{ __('Services') }} *</label>
                                        <label class="switch float-right">
                                            <input type="checkbox" name="service" value="1"
                                                {{ $data->service == 1 ? 'checked' : '' }}>
                                            <span class="slider round"></span>
                                        </label>
                                    </div>

                                </div>

                                <div class="row justify-content-center">

                                    <div class="col-lg-4 d-flex justify-content-between">
                                        <label class="control-label" for="featured">{{ __('Auction Categories') }}
                                            *</label>
                                        <label class="switch float-right">
                                            <input type="checkbox" name="featured" value="1"
                                                {{ $data->featured == 1 ? 'checked' : '' }}>
                                            <span class="slider round"></span>
                                        </label>
                                    </div>

                                    <div class="col-lg-2"></div>

                                    <div class="col-lg-4 d-flex justify-content-between">
                                        <label class="control-label" for="small_banner">{{ __('Featured Auctions') }}
                                            *</label>
                                        <label class="switch float-right">
                                            <input type="checkbox" name="small_banner" value="1"
                                                {{ $data->small_banner == 1 ? 'checked' : '' }}>
                                            <span class="slider round"></span>
                                        </label>
                                    </div>

                                </div>


                                <div class="row justify-content-center">

                                    <div class="col-lg-4 d-flex justify-content-between">
                                        <label class="control-label" for="contact_section">{{ __('Contact Section') }}
                                            *</label>
                                        <label class="switch float-right">
                                            <input type="checkbox" name="contact_section" value="1"
                                                {{ $data->contact_section == 1 ? 'checked' : '' }}>
                                            <span class="slider round"></span>
                                        </label>
                                    </div>



                                    <div class="col-lg-2"></div>


                                    <div class="col-lg-4 d-flex justify-content-between">
                                        <label class="control-label" for="latest_auction">{{ __('Latest Auction') }}
                                            *</label>
                                        <label class="switch float-right">
                                            <input type="checkbox" name="latest_auction" value="1"
                                                {{ $data->latest_auction == 1 ? 'checked' : '' }}>
                                            <span class="slider round"></span>
                                        </label>
                                    </div>



                                </div>

                                <div class="row justify-content-center">
                                    <div class="col-lg-4 d-flex justify-content-between">
                                        <label class="control-label"
                                            for="top_rated">{{ __('Video Presentation Section') }} *</label>
                                        <label class="switch float-right">
                                            <input type="checkbox" name="top_rated" value="1"
                                                {{ $data->top_rated == 1 ? 'checked' : '' }}>
                                            <span class="slider round"></span>
                                        </label>
                                    </div>



                                    <div class="col-lg-2"></div>

                                    <div class="col-lg-4 d-flex justify-content-between">
                                        <label class="control-label" for="review_blog">{{ __('Latest Blog Section') }}
                                            *</label>
                                        <label class="switch float-right">
                                            <input type="checkbox" name="review_blog" value="1"
                                                {{ $data->review_blog == 1 ? 'checked' : '' }}>
                                            <span class="slider round"></span>
                                        </label>
                                    </div>

                                </div>




                                <div class="row justify-content-center">


                                    <div class="col-lg-4 d-flex justify-content-between">
                                        <label class="control-label" for="hot_sale">{{ __('Review section') }} *</label>
                                        <label class="switch float-right">
                                            <input type="checkbox" name="hot_sale" value="1"
                                                {{ $data->hot_sale == 1 ? 'checked' : '' }}>
                                            <span class="slider round"></span>
                                        </label>
                                    </div>

                                    <div class="col-lg-2"></div>
                                    <div class="col-lg-4 d-flex justify-content-between">
                                    </div>
                                </div>


                                <br>

                                <div class="row">
                                    <div class="col-12 text-center">
                                        <button type="submit" class="submit-btn">{{ __('Submit') }}</button>
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
