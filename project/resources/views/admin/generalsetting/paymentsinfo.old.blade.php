@extends('layouts.admin')

@section('content')

    <div class="content-area">
        <div class="mr-breadcrumb">
            <div class="row">
                <div class="col-lg-12">
                    <h4 class="heading">{{ __('Payment Informations') }}</h4>
                    <ul class="links">
                        <li>
                            <a href="{{ route('admin.dashboard') }}">{{ __('Dashboard') }} </a>
                        </li>
                        <li>
                            <a href="javascript:;">{{ __('Payment Settings') }}</a>
                        </li>
                        <li>
                            <a href="{{ route('admin-gs-payments') }}">{{ __('Payment Informations') }}</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="add-product-content social-links-area">
            <div class="row">
                <div class="col-lg-12">
                    <div class="product-description">
                        <div class="body-area">
                            <div class="gocover"
                                style="background: url({{ asset('assets/images/' . $gs->admin_loader) }}) no-repeat scroll center center rgba(45, 45, 45, 0.5);">
                            </div>
                            <form action="{{ route('admin-gs-update') }}" id="ghulamabbasform" method="POST"
                                enctype="multipart/form-data">
                                {{ csrf_field() }}

                                @include('includes.admin.form-both')


                                <div class="row justify-content-center">
                                    <div class="col-lg-3">
                                        <div class="left-area">
                                            <h4 class="heading">
                                                {{ __('Stripe') }}
                                            </h4>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="action-list">
                                            <select
                                                class="process select droplinks {{ $gs->stripe_check == 1 ? 'drop-success' : 'drop-danger' }}">
                                                <option data-val="1" value="{{ route('admin-gs-stripe', 1) }}"
                                                    {{ $gs->stripe_check == 1 ? 'selected' : '' }}>
                                                    {{ __('Activated') }}
                                                </option>
                                                <option data-val="0" value="{{ route('admin-gs-stripe', 0) }}"
                                                    {{ $gs->stripe_check == 0 ? 'selected' : '' }}>
                                                    {{ __('Deactivated') }}</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>



                                <div class="row justify-content-center">
                                    <div class="col-lg-3">
                                        <div class="left-area">
                                            <h4 class="heading">{{ __('Stripe Key') }} *
                                            </h4>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <input type="text" class="input-field" placeholder="{{ __('Stripe Key') }}"
                                            name="stripe_key" value="{{ $gs->stripe_key }}" required="">
                                    </div>
                                </div>

                                <div class="row justify-content-center">
                                    <div class="col-lg-3">
                                        <div class="left-area">
                                            <h4 class="heading">{{ __('Stripe Secret') }} *
                                            </h4>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <input type="text" class="input-field" placeholder="{{ __('Stripe Secret') }}"
                                            name="stripe_secret" value="{{ $gs->stripe_secret }}" required="">
                                    </div>
                                </div>

                                <hr>


                                <div class="row justify-content-center">
                                    <div class="col-lg-3">
                                        <div class="left-area">
                                            <h4 class="heading">
                                                {{ __('Paypal') }}
                                            </h4>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="action-list">
                                            <select
                                                class="process select droplinks {{ $gs->paypal_check == 1 ? 'drop-success' : 'drop-danger' }}">
                                                <option data-val="1" value="{{ route('admin-gs-paypal', 1) }}"
                                                    {{ $gs->paypal_check == 1 ? 'selected' : '' }}>
                                                    {{ __('Activated') }}
                                                </option>
                                                <option data-val="0" value="{{ route('admin-gs-paypal', 0) }}"
                                                    {{ $gs->paypal_check == 0 ? 'selected' : '' }}>
                                                    {{ __('Deactivated') }}</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="row justify-content-center">
                                    <div class="col-lg-3">
                                        <div class="left-area">
                                            <h4 class="heading">{{ __('Paypal Business Email') }} *
                                            </h4>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <input type="text" class="input-field"
                                            placeholder="{{ __('Paypal Business Email') }}" name="paypal_business"
                                            value="{{ $gs->paypal_business }}" required="">
                                    </div>
                                </div>


                                <hr>



                                <div class="row justify-content-center">
                                    <div class="col-lg-3">
                                        <div class="left-area">
                                            <h4 class="heading">{{ __('Withdraw Fee') }} *</h4>
                                            <p class="sub-heading">({{ __('set 0 if you don,t want to add') }})</p>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <input type="text" class="input-field" placeholder="{{ __('Withdraw Fee') }}"
                                            name="withdraw_fee" value="{{ $gs->withdraw_fee }}" required="">
                                    </div>
                                </div>

                                <div class="row justify-content-center">
                                    <div class="col-lg-3">
                                        <div class="left-area">
                                            <h4 class="heading">{{ __('Withdraw Charge') }}(%) *</h4>
                                            <p class="sub-heading">({{ __('set 0 if you don,t want to add') }})</p>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <input type="text" class="input-field"
                                            placeholder="{{ __('Withdraw Charge') }}(%)" name="withdraw_charge"
                                            value="{{ $gs->withdraw_charge }}" required="">
                                    </div>
                                </div>

                                <div class="row justify-content-center">
                                    <div class="col-lg-3">
                                        <div class="left-area">
                                            <h4 class="heading">{{ __('VAT(%)') }} *</h4>
                                            <p class="sub-heading">({{ __('In Percentage') }})</p>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <input type="text" class="input-field" placeholder="{{ __('VAT') }}"
                                            name="auction_vat" value="{{ $gs->auction_vat }}" required="">
                                    </div>
                                </div>

                                <hr>

                                <h3 class="text-center">{{ __('For Seller') }}</h3>

                                <hr>


                                <div class="row justify-content-center">
                                    <div class="col-lg-3">
                                        <div class="left-area">
                                            <h4 class="heading">{{ __('Auction Pay Amount') }} *</h4>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <input type="text" class="input-field"
                                            placeholder="{{ __('Auction Pay Amount') }}" name="auction_pay"
                                            value="{{ $gs->auction_pay }}" required="">
                                    </div>
                                </div>

                                <div class="row justify-content-center">
                                    <div class="col-lg-3">
                                        <div class="left-area">
                                            <h4 class="heading">{{ __('Feature Auction Amount') }} *</h4>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <input type="text" class="input-field"
                                            placeholder="{{ __('Feature Auction Amount') }}" name="feature_price"
                                            value="{{ $gs->feature_price }}" required="">
                                    </div>
                                </div>

                                <div class="row justify-content-center">
                                    <div class="col-lg-3">
                                        <div class="left-area">
                                            <h4 class="heading">{{ __('Payment Fee(%)') }} *</h4>
                                            <p class="sub-heading">({{ __('In Percentage') }})</p>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <input type="text" class="input-field" placeholder="{{ __('Payment Fee') }}"
                                            name="payment_fee" value="{{ $gs->payment_fee }}" required="">
                                    </div>
                                </div>


                                <div class="row justify-content-center">
                                    <div class="col-lg-3">
                                        <div class="left-area">
                                            <h4 class="heading">{{ __('Featured Customer Discount Fee(%)') }} *
                                            </h4>
                                            <p class="sub-heading">({{ __('In Percentage') }})</p>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <input type="text" class="input-field"
                                            placeholder="{{ __('Featured Customer Discount Fee') }}"
                                            name="feature_discount" value="{{ $gs->feature_discount }}" required="">
                                    </div>
                                </div>


                                <div class="row justify-content-center">
                                    <div class="col-lg-3">
                                        <div class="left-area">
                                            <h4 class="heading">{{ __('Charity Customer Discount Fee(%)') }} *
                                            </h4>
                                            <p class="sub-heading">({{ __('In Percentage') }})</p>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <input type="text" class="input-field"
                                            placeholder="{{ __('Charity Customer Discount Fee') }}"
                                            name="charity_discount" value="{{ $gs->charity_discount }}" required="">
                                    </div>
                                </div>



                                <hr>

                                <h3 class="text-center">{{ __('For Buyer') }}</h3>

                                <hr>

                                <div class="row justify-content-center">
                                    <div class="col-lg-3">
                                        <div class="left-area">
                                            <h4 class="heading">{{ __('Pay Fee') }} *</h4>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <input type="text" class="input-field" placeholder="{{ __('Pay Fee') }}"
                                            name="buyer_pay_fee" value="{{ $gs->buyer_pay_fee }}" required="">
                                    </div>
                                </div>

                                <div class="row justify-content-center">
                                    <div class="col-lg-3">
                                        <div class="left-area">
                                            <h4 class="heading">{{ __('Fee(%)') }} *</h4>
                                            <p class="sub-heading">({{ __('In Percentage') }})</p>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <input type="text" class="input-field" placeholder="{{ __('Fee') }}"
                                            name="buyer_fee" value="{{ $gs->buyer_fee }}" required="">
                                    </div>
                                </div>

                                <div class="row justify-content-center">
                                    <div class="col-lg-3">
                                        <div class="left-area">
                                            <h4 class="heading">{{ __('Payment Fee(%)') }} *</h4>
                                            <p class="sub-heading">({{ __('In Percentage') }})</p>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <input type="text" class="input-field" placeholder="{{ __('Payment Fee') }}"
                                            name="buyer_payment_fee" value="{{ $gs->buyer_payment_fee }}" required="">
                                    </div>
                                </div>


                                <div class="row justify-content-center">
                                    <div class="col-lg-3">
                                        <div class="left-area">

                                        </div>
                                    </div>
                                    <div class="col-lg-6">
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
