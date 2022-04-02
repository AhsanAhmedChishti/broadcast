@extends('layouts.admin')

@section('content')

    <div class="content-area">
        <div class="mr-breadcrumb">
            <div class="row">
                <div class="col-lg-12">
                    <h4 class="heading">{{ __('Auto Post Configure') }}</h4>
                    <ul class="links">
                        <li>
                            <a href="{{ route('admin.dashboard') }}">{{ __('Dashboard') }} </a>
                        </li>
                        <li>
                            <a href="javascript:;">{{ __('Social Settings') }}</a>
                        </li>
                        <li>
                            <a href="{{ route('admin-social-index') }}">{{ __('Social Links') }}</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="social-links-area">

            <div class="gocover"
                style="background: url({{ asset('assets/images/' . $gs->admin_loader) }}) no-repeat scroll center center rgba(45, 45, 45, 0.5);">
            </div>
            @include('includes.form-success')
            <form id="ghulamabbasform" action="{{ route('facebook.pageid') }}" method="POST"
                enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="row">
                    <div class="col-lg-4">
                        <div class="left-area">
                            <h4 class="heading">{{ __('Enter Your Facebook Page ID') }} *</h4>
                            <p class="sub-heading"><a style="color:blue;" target="_blank"
                                    href="https://www.facebook.com/help/1503421039731588">How to get Page ID</a></p>
                        </div>
                    </div>
                    <div class="col-lg-7">
                        <input type="text" class="input-field" name="fb_page_id"
                            placeholder="{{ __('Enter Your Facebook Page ID') }}" value="{{ $gs->fb_page_id }}"
                            required="">

                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4">
                        <div class="left-area">

                        </div>
                    </div>
                    <div class="col-lg-7">
                        <button class="submit-btn" type="submit">{{ __('Save') }}</button>
                    </div>
                </div>
            </form>


            <br>
            <hr>
            <br>
            @include('includes.admin.form-success')

            <div class="row">
                <label class="control-label col-sm-3" for="facebook">{{ __('Configure Facebook') }} <br>
                    @if ($fbsts != '')
                        <button class="submit-btn" type="button">Connected</button>
                    @endif
                </label>
                <div class="col-sm-6">

                    {!! $fbData !!}
                    @if ($gs->fb_token != null)
                        <br><br>
                        <a href="{{ route('admin-gs-fb-clear') }}" class="submit-btn">Disconnect</a>
                    @endif
                </div>

            </div>


        </div>
    </div>

@endsection
