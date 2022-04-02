@extends('errors.minimal')

@section('content')
    {{-- ============ Error Section Starts Here ============ --}}
    <div class="error-section padding-top padding-bottom bg_img"
        data-background="{{ asset('assets/front-new/images/error-bg.png') }}">
        <div class="container">
            <div class="error-wrapper">
                <div class="error-thumb">
                    <img src="{{ asset('assets/front-new/images/error.png') }}" alt="error">
                </div>
                <h4 class="title">{{ __('Return to the') }} <a
                        href="{{ route('front.index') }}">{{ __('homepage') }}</a></h4>
            </div>
        </div>
    </div>
    {{-- ============ Error Section Ends Here ============ --}}
@endsection
