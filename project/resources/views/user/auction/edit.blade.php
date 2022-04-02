@extends('layouts.front')

@section('styles')
    <link rel="stylesheet" href="{{ asset('assets/admin/css/datetimepicker.css') }}">
@endsection

@section('content')
    {{-- ============ Hero Section Starts Here ============ --}}
    <div class="hero-section style-2">
        <div class="container">
            <ul class="breadcrumb">
                <li>
                    <a href="{{ route('front.index') }}">{{ __('Home') }}</a>
                </li>
                <li>
                    <a href="{{ route('user.dashboard') }}">{{ __('Dashboard') }}</a>
                </li>
                <li>
                    <a href="{{ route('user-auction-index') }}">{{ __('Auctions') }}</a>
                </li>
                <li>
                    <span>{{ __('Edit Auction') }}</span>
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
                @include('layouts.partials.user.sidebar')
                {{-- Sidebar Ends --}}
                <div class="col-lg-8">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="dash-pro-item mb-30 dashboard-widget">
                                <div class="dashboard-title mb-30">
                                    <h5 class="title">{{ __('Edit Auction') }}</h5>
                                </div>
                                @include('includes.admin.form-error')

                                <div class="product-description">
                                    @include('includes.admin.form-both')
                                    <form id="ghulamabbasform" class="new-auction-form" name="new_auction"
                                        action="{{ route('user-auction-update', $data->id) }}" method="POST"
                                        enctype="multipart/form-data">
                                        {{ csrf_field() }}
                                        <div class="row">
                                            <div class="col-lg-6 mb-3">
                                                <input name="title" type="text" class="input-field"
                                                    placeholder="{{ __('Auction Name') }}" value="{{ $data->title }}"
                                                    required="">
                                            </div>
                                            <div class="col-lg-6 mb-3">
                                                <select class="input-field" name="category_id" required="">
                                                    <option value="" disabled>{{ __('Please select Category') }}</option>
                                                    @foreach ($categories as $category)
                                                        <option value="{{ $category->id }}"
                                                            {{ $category->id == $data->category_id ? 'selected' : '' }}>
                                                            {{ $category->title }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-6 mb-3">
                                                <select class="input-field" name="conditions" required="">
                                                    <option value="">{{ __('Please Select Condition') }}</option>
                                                    <option value="New"
                                                        {{ $data->conditions == 'New' ? 'selected' : '' }}>
                                                        New
                                                    </option>
                                                    <option value="Used"
                                                        {{ $data->conditions == 'Used' ? 'selected' : '' }}>
                                                        Used
                                                    </option>
                                                    <option value="Recondition"
                                                        {{ $data->conditions == 'Recondition' ? 'selected' : '' }}>
                                                        Recondition
                                                    </option>
                                                </select>
                                            </div>
                                            <div class="col-lg-6 mb-3">
                                                <div class="img-upload">
                                                    <label class="c-file-input" for="image-upload">
                                                        <input type="file" name="photo" accept=".jpeg,.jpg,.png"
                                                            class="img-upload" id="image-upload">
                                                        {{ __('Upload Image') }}
                                                    </label>
                                                    <div id="image-prv" class="img-preview"
                                                        style="background-image: url({{ $data->photo ? asset('assets/images/auction/' . $data->photo) : asset('assets/images/noimage.png') }});">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-7">
                                                <a href="#" class="set-gallery custom-button" data-toggle="modal"
                                                    data-target="#setgallery">
                                                    <input type="hidden" value="{{ $data->id }}">
                                                    <i class="icofont-plus"></i> {{ __('Set Gallery') }}
                                                </a>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-12 nic-edit-main-wrapper mb-3">
                                                <textarea class="nic-edit" name="descriptions"
                                                    placeholder="{{ __('Description') }}">{{ $data->descriptions }}</textarea>
                                            </div>
                                        </div>

                                        <div class=" row">
                                            <div class="col-lg-6 mb-3">
                                                <input id="from" class="input-field" type="text" name="start_date"
                                                    autocomplete="off" placeholder="{{ __('Start Date') }}"
                                                    value="{{ $data->start_date }}" required="">
                                            </div>
                                            <div class="col-lg-6 mb-3">
                                                <input id="to" class="input-field" type="text" name="end_date"
                                                    autocomplete="off" placeholder="{{ __('End Date') }}"
                                                    value="{{ $data->end_date }}" required="">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-6 mb-3">
                                                <input type="number" class="input-field" name="start_bid" id="start_bid"
                                                    placeholder="{{ __('Enter Bid Amount') }}" min="0" step="0.1"
                                                    value="{{ $data->start_bid }}" required="">
                                            </div>
                                            <div class="col-lg-6 mb-3">
                                                <div class="checkbox-wrapper row align-items-center">
                                                    <div class="col-lg-3"> <input type="checkbox" name="is_featured"
                                                            id="is_featured" value="1"
                                                            {{ $data->is_featured == 1 ? 'checked' : '' }}></div>
                                                    <div class="col-lg-9"> <label for="is_featured">
                                                            <small>
                                                                {{ __('Add This Auction To Featured') }}
                                                                ({{ __('Price') }}
                                                                <strong>{{ $gs->currency_format == 0? $gs->currency_sign . number_format($gs->feature_price, 2, ',', '.'): number_format($gs->feature_price, 2, ',', '.') . $gs->currency_sign }})</strong>
                                                            </small>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-7">
                                                <button class="addProductSubmit-btn custom-button"
                                                    type="submit">{{ __('Save') }}</button>
                                            </div>
                                        </div>

                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{-- ============ Dashboard Section Ends Here ============ --}}

    <div class="modal fade new-auction-gallery-modal" id="setgallery" tabindex="-1" role="dialog"
        aria-labelledby="setgallery" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered  modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">{{ __('Image Gallery') }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="top-area">
                        <div class="row">
                            <div class="col-sm-6 text-right">
                                <div class="upload-img-btn">
                                    <form method="POST" enctype="multipart/form-data" id="form-gallery">
                                        {{ csrf_field() }}
                                        <input type="hidden" id="pid" name="auction_id" value="">
                                        <input type="file" name="gallery[]" class="hidden" id="uploadgallery"
                                            accept=".jpeg,.jpg,.png" multiple>
                                        <label id="prod_gallery"><i
                                                class="icofont-upload-alt"></i>{{ __('Upload File') }}</label>
                                    </form>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <a href="javascript:;" class="upload-done" data-dismiss="modal"> <i
                                        class="fas fa-check"></i> {{ __('Done') }}</a>
                            </div>
                            <div class="col-sm-12 text-center mb-3">(
                                <small>{{ __('You can select multiple images.') }}</small> )
                            </div>
                        </div>
                    </div>
                    <div class="gallery-images">
                        <div class="selected-image">
                            <div class="row">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')


    <script src="{{ asset('assets/admin/js/datetimepicker.js') }}"></script>

    {{-- Image Preview Starts --}}
    <script>
        if (document.forms.new_auction) {
            var newAuctionForm = document.forms.new_auction;
            var photoUpload = newAuctionForm.photo;
            photoUpload.addEventListener('change', function(e) {
                var imgaePreview = document.querySelector('#image-prv');
                imgaePreview.style.backgroundImage = 'url(' + URL.createObjectURL(e.target.files[0]) + ')';
            });
        }
    </script>
    {{-- Image Preview Ends --}}

    <script type="text/javascript">
        // Gallery Section Update

        $(document).on("click", ".set-gallery", function() {
            var pid = $(this).find('input[type=hidden]').val();
            $('#pid').val(pid);
            $('.selected-image .row').html('');
            $.ajax({
                type: "GET",
                url: "{{ route('user-gallery-show') }}",
                data: {
                    id: pid
                },
                success: function(data) {
                    if (data[0] == 0) {
                        $('.selected-image .row').addClass('justify-content-center');
                        $('.selected-image .row').html(
                            '<h4 class="mt-3">{{ __('No Images Found.') }}</h4>');
                    } else {
                        $('.selected-image .row').removeClass('justify-content-center');
                        $('.selected-image .row h3').remove();
                        var arr = $.map(data[1], function(el) {
                            return el
                        });

                        for (var k in arr) {
                            $('.selected-image .row').append('<div class="col-sm-6">' +
                                '<div class="img gallery-img">' +
                                '<span class="remove-img"><i class="fas fa-times"></i>' +
                                '<input type="hidden" value="' + arr[k]['id'] + '">' +
                                '</span>' +
                                '<a href="' + '{{ asset('assets/images/galleries') . '/' }}' +
                                arr[k]
                                ['photo'] + '" target="_blank">' +
                                '<img src="' + '{{ asset('assets/images/galleries') . '/' }}' +
                                arr[
                                    k]['photo'] + '" alt="gallery image">' +
                                '</a>' +
                                '</div>' +
                                '</div>');
                        }
                    }

                }
            });
        });


        $(document).on('click', '.remove-img', function() {
            var id = $(this).find('input[type=hidden]').val();
            $(this).parent().parent().remove();
            $.ajax({
                type: "GET",
                url: "{{ route('user-gallery-delete') }}",
                data: {
                    id: id
                }
            });
        });

        $(document).on('click', '#prod_gallery', function() {
            $('#uploadgallery').click();
        });


        $("#uploadgallery").change(function() {
            $("#form-gallery").submit();
        });

        $(document).on('submit', '#form-gallery', function() {
            $.ajax({
                url: "{{ route('user-gallery-store') }}",
                method: "POST",
                data: new FormData(this),
                dataType: 'JSON',
                contentType: false,
                cache: false,
                processData: false,
                success: function(data) {
                    if (data != 0) {
                        $('.selected-image .row').removeClass('justify-content-center');
                        $('.selected-image .row h3').remove();
                        var arr = $.map(data, function(el) {
                            return el
                        });
                        for (var k in arr) {
                            $('.selected-image .row').append('<div class="col-sm-6">' +
                                '<div class="img gallery-img">' +
                                '<span class="remove-img"><i class="fas fa-times"></i>' +
                                '<input type="hidden" value="' + arr[k]['id'] + '">' +
                                '</span>' +
                                '<a href="' + '{{ asset('assets/images/galleries') . '/' }}' +
                                arr[k]
                                ['photo'] + '" target="_blank">' +
                                '<img src="' + '{{ asset('assets/images/galleries') . '/' }}' +
                                arr[
                                    k]['photo'] + '" alt="gallery image">' +
                                '</a>' +
                                '</div>' +
                                '</div>');
                        }
                    }

                }

            });
            return false;
        });
        // Gallery Section Update Ends

        var dateToday = new Date();
        var dates = $("#from,#to").datetimepicker({
            format: 'Y-m-d H:i',
            minDate: dateToday,
        });

        $('#buy_check').on('change', function() {
            if (this.checked) {
                $('#buy_now').prop('required', true);
            } else {
                $('#buy_now').prop('required', false);
            }
        });
    </script>

@endsection
