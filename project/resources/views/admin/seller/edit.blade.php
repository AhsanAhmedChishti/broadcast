@extends('layouts.load')
@section('content')

    <div class="content-area">
        <div class="add-product-content">
            <div class="row">
                <div class="col-lg-12">
                    <div class="product-description">
                        <div class="body-area">
                            <form id="ghulamabbasformdata" action="{{ route('admin-user-edit', $data->id) }}" method="POST"
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
                                            @if ($data->is_provider == 1)
                                                <div id="image-preview" class="img-preview"
                                                    style="background: url({{ $data->photo ? asset($data->photo) : asset('assets/images/noimage.png') }});">
                                                @else
                                                    <div id="image-preview" class="img-preview"
                                                        style="background: url({{ $data->photo ? asset('assets/images/users/' . $data->photo) : asset('assets/images/noimage.png') }});">
                                            @endif
                                            @if ($data->is_provider != 1)
                                                <label for="image-upload" class="img-label" id="image-label"><i
                                                        class="icofont-upload-alt"></i>{{ __('Upload Image') }}</label>
                                                <input type="file" name="photo" class="img-upload" id="image-upload">
                                            @endif
                                        </div>
                                        <p class="text">{{ __('Prefered Size') }}:
                                            {{ __('(600x600) or Square Sized Image') }}</p>
                                    </div>
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
                                    placeholder="{{ __('User First Name') }}" required="" value="{{ $data->first_name }}">
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
                                    placeholder="{{ __('User Last Name') }}" required="" value="{{ $data->last_name }}">
                            </div>
                        </div>


                        @if ($data->type == 1)

                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="left-area">
                                        <h4 class="heading">{{ __('Company Name') }}*</h4>
                                    </div>
                                </div>
                                <div class="col-lg-7">
                                    <input type="text" class="input-field" name="company_name"
                                        placeholder="{{ __('Company Name') }}" required=""
                                        value="{{ $data->company_name }}">
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
                                        placeholder="{{ __('CVR Number') }}" required="" value="{{ $data->cvr_number }}">
                                </div>
                            </div>

                        @endif



                        <div class="row">
                            <div class="col-lg-4">
                                <div class="left-area">
                                    <h4 class="heading">{{ __('Email') }} *</h4>
                                </div>
                            </div>
                            <div class="col-lg-7">
                                <input type="email" class="input-field" name="email"
                                    placeholder="{{ __('Email Address') }}" value="{{ $data->email }}">
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
                                    placeholder="{{ __('Phone Number') }}" required="" value="{{ $data->phone }}">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-4">
                                <div class="left-area">
                                    <h4 class="heading">{{ __('Address') }} *</h4>
                                </div>
                            </div>
                            <div class="col-lg-7">
                                <input type="text" class="input-field" name="address" placeholder="{{ __('Address') }}"
                                    required="" value="{{ $data->address }}">
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-lg-4">
                                <div class="left-area">
                                    <h4 class="heading">{{ __('City') }} </h4>
                                </div>
                            </div>
                            <div class="col-lg-7">
                                <input type="text" class="input-field" name="city" placeholder="{{ __('City') }}"
                                    value="{{ $data->city }}">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-4">
                                <div class="left-area">
                                    <h4 class="heading">{{ __('Fax') }} </h4>
                                </div>
                            </div>
                            <div class="col-lg-7">
                                <input type="text" class="input-field" name="fax" placeholder="{{ __('Fax') }}"
                                    value="{{ $data->fax }}">
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-lg-4">
                                <div class="left-area">
                                    <h4 class="heading">{{ __('Postal Code') }} </h4>
                                </div>
                            </div>
                            <div class="col-lg-7">
                                <input type="text" class="input-field" name="zip" placeholder="{{ __('Postal Code') }}"
                                    value="{{ $data->zip }}">

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
                                    placeholder="{{ __('Enter Password') }}" value="">

                                <div class="checkbox-wrapper">
                                    <input type="checkbox" name="is_featured" id="is_featured" value="1"
                                        {{ $data->is_featured == 1 ? 'checked' : '' }}>
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

                                <div class="checkbox-wrapper  mt-0">
                                    <input type="checkbox" name="is_charity" id="is_charity" value="1"
                                        {{ $data->is_charity == 1 ? 'checked' : '' }}>
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
