@extends('layouts.load')
@section('content')

    <div class="content-area">
        <div class="add-product-content">
            <div class="row">
                <div class="col-lg-12">
                    <div class="product-description">
                        <div class="body-area">

                            <form id="ghulamabbasformdata" action="{{ route('admin-user-store') }}" method="POST"
                                enctype="multipart/form-data">
                                @include('includes.admin.form-error')
                                {{ csrf_field() }}

                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="left-area">
                                            <h4 class="heading">{{ __('Customer Profile Image') }} *</h4>
                                        </div>
                                    </div>
                                    <div class="col-lg-7">
                                        <div class="img-upload">

                                            <div id="image-preview" class="img-preview"
                                                style="background: url({{ asset('assets/images/noimage.png') }});">

                                                <label for="image-upload" class="img-label" id="image-label"><i
                                                        class="icofont-upload-alt"></i>{{ __('Upload Image') }}</label>
                                                <input type="file" name="photo" class="img-upload" id="image-upload">

                                            </div>
                                            <p class="text">{{ __('Prefered Size') }}:
                                                {{ __('(600x600) or Square Sized Image') }}</p>
                                        </div>
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="left-area">
                                            <h4 class="heading">{{ __('Select Type') }}*</h4>
                                        </div>
                                    </div>
                                    <div class="col-lg-7">
                                        <select name="type" id="type" class="input-field" required>
                                            <option value="0">{{ __('Private') }}</option>
                                            <option value="1">{{ __('Business') }}</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="left-area">
                                            <h4 class="heading">{{ __('First Name') }}*</h4>
                                        </div>
                                    </div>
                                    <div class="col-lg-7">
                                        <input type="text" class="input-field" name="first_name"
                                            placeholder="{{ __('User First Name') }}" required="" value="">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="left-area">
                                            <h4 class="heading">{{ __('Last Name') }}*</h4>
                                        </div>
                                    </div>
                                    <div class="col-lg-7">
                                        <input type="text" class="input-field" name="last_name"
                                            placeholder="{{ __('User Last Name') }}" required="" value="">
                                    </div>
                                </div>

                                <div class="company d-none">
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <div class="left-area">
                                                <h4 class="heading">{{ __('Company Name') }}*</h4>
                                            </div>
                                        </div>
                                        <div class="col-lg-7">
                                            <input type="text" class="input-field" name="company_name"
                                                placeholder="{{ __('Company Name') }}" value="">
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-4">
                                            <div class="left-area">
                                                <h4 class="heading">{{ __('CVR Number') }}*</h4>
                                            </div>
                                        </div>
                                        <div class="col-lg-7">
                                            <input type="text" class="input-field" name="cvr_number"
                                                placeholder="{{ __('CVR Number') }}" value="">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="left-area">
                                            <h4 class="heading">{{ __('Email') }} *</h4>
                                        </div>
                                    </div>
                                    <div class="col-lg-7">
                                        <input type="email" class="input-field" name="email"
                                            placeholder="{{ __('Email Address') }}" value="">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="left-area">
                                            <h4 class="heading">{{ __('Phone') }} *</h4>
                                        </div>
                                    </div>
                                    <div class="col-lg-7">
                                        <input type="text" class="input-field" name="phone"
                                            placeholder="{{ __('Phone Number') }}" required="" value="">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="left-area">
                                            <h4 class="heading">{{ __('Address') }} *</h4>
                                        </div>
                                    </div>
                                    <div class="col-lg-7">
                                        <input type="text" class="input-field" name="address"
                                            placeholder="{{ __('Address') }}" required="" value="">
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="left-area">
                                            <h4 class="heading">{{ __('City') }} </h4>
                                        </div>
                                    </div>
                                    <div class="col-lg-7">
                                        <input type="text" class="input-field" name="city"
                                            placeholder="{{ __('City') }}" value="">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="left-area">
                                            <h4 class="heading">{{ __('Fax') }} </h4>
                                        </div>
                                    </div>
                                    <div class="col-lg-7">
                                        <input type="text" class="input-field" name="fax"
                                            placeholder="{{ __('Fax') }}" value="">
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="left-area">
                                            <h4 class="heading">{{ __('Postal Code') }} </h4>
                                        </div>
                                    </div>
                                    <div class="col-lg-7">
                                        <input type="text" class="input-field" name="zip"
                                            placeholder="{{ __('Postal Code') }}" value="">
                                    </div>
                                </div>



                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="left-area">
                                            <h4 class="heading">{{ __('Password') }} *</h4>
                                        </div>
                                    </div>
                                    <div class="col-lg-7">
                                        <input type="password" class="input-field" name="password"
                                            placeholder="{{ __('Enter Password') }}" value="" required>

                                        <div class="checkbox-wrapper">
                                            <input type="checkbox" name="is_featured" id="is_featured" value="1">
                                            <label for="is_featured">{{ __('Make This Customer To Featured') }}</label>
                                        </div>

                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="left-area">

                                        </div>
                                    </div>
                                    <div class="col-lg-7">

                                        <div class="checkbox-wrapper mt-0">
                                            <input type="checkbox" name="is_charity" id="is_charity" value="1">
                                            <label for="is_charity">{{ __('Add This Customer To Charity') }}</label>
                                        </div>

                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="left-area">

                                        </div>
                                    </div>
                                    <div class="col-lg-7">
                                        <button class="addProductSubmit-btn"
                                            type="submit">{{ __('Create Customer') }}</button>
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

    <script>
        $('#type').on('change', function() {
            var val = $(this).val();

            if (val == 1) {
                $('.company').removeClass('d-none');
                $('input[name="company_name"],input[name="cvr_number"]').prop('required', true);
            } else {
                $('.company').addClass('d-none');
                $('input[name="company_name"],input[name="cvr_number"]').prop('required', false);
            }

        });
    </script>

@endsection
