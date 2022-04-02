@extends('layouts.admin')

@section('content')


    <div class="content-area">
        <div class="mr-breadcrumb">
            <div class="row">
                <div class="col-lg-12">
                    <h4 class="heading">{{ __('Auction Categories Section') }}</h4>
                    <ul class="links">
                        <li>
                            <a href="{{ route('admin.dashboard') }}">{{ __('Dashboard') }}</a>
                        </li>
                        <li>
                            <a href="javascript:;">{{ __('Home Page Settings') }}</a>
                        </li>
                        <li>
                            <a href="{{ route('admin-auction-title-description') }}">
                                {{ __('Auction Categories Section') }}</a>
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

                            <form id="ghulamabbasform"
                                action="{{ route('admin-category-title-update', $category_section_title_text->id) }}"
                                method="POST">
                                {{ csrf_field() }}
                                {{ method_field('PUT') }}

                                @include('includes.admin.form-both')

                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="left-area">
                                            <h4 class="heading">{{ __('Category Title') }} * </h4>
                                        </div>
                                    </div>
                                    <div class="col-lg-7">
                                        <input name="category_section_title" type="text" class="input-field"
                                            value="{{ $category_section_title_text->category_section_title }}">
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="left-area">
                                            <h4 class="heading">{{ __('Category Text') }} * </h4>
                                        </div>
                                    </div>
                                    <div class="col-lg-7">
                                        <textarea class="form-control" name="category_section_text"
                                            id="service_secttion_text">{{ $category_section_title_text->category_section_text }}</textarea>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="left-area">

                                        </div>
                                    </div>
                                    <div class="col-lg-7">
                                        <button class="addProductSubmit-btn" type="submit">{{ __('Save') }}</button>
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
