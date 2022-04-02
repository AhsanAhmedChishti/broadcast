@extends('layouts.admin')

@section('content')

    <div class="content-area">
        <div class="mr-breadcrumb">
            <div class="row">
                <div class="col-lg-12">
                    <h4 class="heading">Customize Menus Links</h4>
                    <ul class="links">
                        <li>
                            <a href="{{ route('admin.dashboard') }}">Dashboard </a>
                        </li>
                        <li>
                            <a href="javascript:;">Menu Page Settings</a>
                        </li>
                        <li>
                            <a href="javascript:;">Customize Menus Links</a>
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

                            <form id="ghulamabbasform" action="{{ route('admin-gs-menuupdate') }}" method="POST"
                                enctype="multipart/form-data">
                                {{ csrf_field() }}

                                @include('includes.admin.form-both')


                                <div class="row justify-content-center">
                                    <div class="col-lg-4 d-flex justify-content-between">
                                        <label class="control-label" for="is_home">Home *</label>
                                        <label class="switch float-right">
                                            <input type="checkbox" name="is_home" value="1"
                                                {{ $gs->is_home == 1 ? 'checked' : '' }}>
                                            <span class="slider round"></span>
                                        </label>
                                    </div>
                                    <div class="col-lg-2"></div>
                                    <div class="col-lg-4 d-flex justify-content-between">
                                        <label class="control-label" for="is_blog">Blog *</label>
                                        <label class="switch float-right">
                                            <input type="checkbox" name="is_blog" value="1"
                                                {{ $gs->is_blog == 1 ? 'checked' : '' }}>
                                            <span class="slider round"></span>
                                        </label>
                                    </div>
                                </div>

                                <div class="row justify-content-center">
                                    <div class="col-lg-4 d-flex justify-content-between">
                                        <label class="control-label" for="is_auction">Auctions *</label>
                                        <label class="switch float-right">
                                            <input type="checkbox" name="is_auction" value="1"
                                                {{ $gs->is_auction == 1 ? 'checked' : '' }}>
                                            <span class="slider round"></span>
                                        </label>
                                    </div>
                                    <div class="col-lg-2"></div>
                                    <div class="col-lg-4 d-flex justify-content-between">
                                        <label class="control-label" for="is_faq">Faq *</label>
                                        <label class="switch float-right">
                                            <input type="checkbox" name="is_faq" value="1"
                                                {{ $gs->is_faq == 1 ? 'checked' : '' }}>
                                            <span class="slider round"></span>
                                        </label>
                                    </div>
                                </div>

                                <div class="row justify-content-center">
                                    <div class="col-lg-4 d-flex justify-content-between">
                                        <label class="control-label" for="is_page">Pages *</label>
                                        <label class="switch float-right">
                                            <input type="checkbox" name="is_page" value="1"
                                                {{ $gs->is_page == 1 ? 'checked' : '' }}>
                                            <span class="slider round"></span>
                                        </label>
                                    </div>
                                    <div class="col-lg-2"></div>
                                    <div class="col-lg-4 d-flex justify-content-between">
                                        <label class="control-label" for="is_contact">Contact Us *</label>
                                        <label class="switch float-right">
                                            <input type="checkbox" name="is_contact" value="1"
                                                {{ $gs->is_contact == 1 ? 'checked' : '' }}>
                                            <span class="slider round"></span>
                                        </label>
                                    </div>
                                </div>



                                <br>

                                <div class="row">
                                    <div class="col-12 text-center">
                                        <button type="submit" class="submit-btn">Submit</button>
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
