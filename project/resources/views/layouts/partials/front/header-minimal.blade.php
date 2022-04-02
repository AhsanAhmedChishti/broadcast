<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    {{-- SEO --}}
    @if (isset($page->meta_tag) && isset($page->meta_description))
        <meta name="keywords" content="{{ $page->meta_tag }}">
        <meta name="description" content="{{ $page->meta_description }}">
    @elseif(isset($blog->meta_tag) && isset($blog->meta_description))
        <meta name="keywords" content="{{ $blog->meta_tag }}">
        <meta name="description" content="{{ $blog->meta_description }}">
    @else
        <meta name="keywords" content="{{ $seo->meta_keys }}">
    @endif

    <title>{{ $gs->title }}</title>

    <link rel="stylesheet" href="{{ asset('assets/front-new/css/bootstrap.min.css') }}">
    {{-- <link rel="stylesheet" href="{{ asset('assets/front-new/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/front-new/css/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/front-new/css/nice-select.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/front-new/css/owl.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/front-new/css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/front-new/css/flaticon.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/front-new/css/jquery-ui.min.css') }}"> --}}
    <link rel="stylesheet" href="{{ asset('assets/front-new/css/main.css') }}">
    {{-- <link rel="stylesheet" href="{{ asset('assets/front-new/css/extras.css') }}"> --}}

    <link rel="icon" type="image/x-icon" href="{{ asset('assets/images/' . $gs->favicon) }}" />

    {{-- Update CSS --}}
    <link rel="stylesheet"
        href="{{ asset('assets/front/css/styles.php?color=' . str_replace('#', '', $gs->colors)) }}">
</head>

<body>
    {{-- ============ ScrollToTop Section Starts Here ============ --}}
    <div class="overlayer" id="overlayer">
        <div class="loader">
            <div class="loader-inner"></div>
        </div>
    </div>
    <a href="#0" class="scrollToTop"><i class="fas fa-angle-up"></i></a>
    <div class="overlay"></div>
    {{-- ============ ScrollToTop Section Ends Here ============ --}}
