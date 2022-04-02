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
    <link rel="stylesheet" href="{{ asset('assets/front-new/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/front-new/css/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/front-new/css/nice-select.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/front-new/css/owl.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/front-new/css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/front-new/css/flaticon.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/front-new/css/jquery-ui.min.css') }}">
    <link href="{{ asset('assets/admin/css/plugin.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('assets/front-new/css/toastr.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/front-new/css/main.css') }}">
    <link rel="stylesheet"
        href="{{ asset('assets/front-new/css/extras.css?ver=') }}{{ filemtime(public_path('assets/front-new/css/extras.css')) }}">

    <link rel="icon" type="image/x-icon" href="{{ asset('assets/images/' . $gs->favicon) }}" />

    {{-- Update CSS --}}
    <link rel="stylesheet"
        href="{{ asset('assets/front/css/styles.php?color=' . str_replace('#', '', $gs->colors)) }}">

    @yield('styles')
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


    {{-- ============ Header Section Starts Here ============ --}}
    <header>
        <div class="header-top">
            <div class="container">
                <div class="header-top-wrapper">
                    <ul class="customer-support">
                        @if (App\Models\Pagesetting::find(1)->phone != null)
                            <li>
                                <a href="tel:{{ App\Models\Pagesetting::find(1)->phone }}" class="mr-3"><i
                                        class="fas fa-phone-alt"></i><span
                                        class="ml-2 d-none d-sm-inline-block">Customer Support</span></a>
                            </li>
                        @endif
                        <li>
                            <i class="fas fa-globe"></i>
                            <div class="language-selector">
                                <select name="language" class="select-bar language">
                                    @foreach (DB::table('admin_languages')->get() as $language)
                                        <option value="{{ route('front.language', $language->id) }}"
                                            {{ Session::has('language')
                                                ? (Session::get('language') == $language->id
                                                    ? 'selected'
                                                    : '')
                                                : (DB::table('admin_languages')->where('is_default', '=', 1)->first()->id == $language->id
                                                    ? 'selected'
                                                    : '') }}>
                                            {{ $language->language }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </li>
                    </ul>
                    <ul class="cart-button-area">
                        {{-- <li>
                            <a href="#0" class="cart-button"><i class="flaticon-shopping-basket"></i><span
                                    class="amount">08</span></a>
                        </li> --}}
                        @if (Auth::check())
                            <li class="c-dropdown-wrapper">
                                <a href="{{ route('user.dashboard') }}" class="text-white">
                                    {{ __('My Account') }}
                                    <span class="user-button"><i class="flaticon-user"></i></span>
                                </a>
                                <ul class="c-dropdown">
                                    <li>
                                        <a href="{{ route('user.logout') }}">{{ __('Logout') }}</a>
                                    </li>
                                </ul>
                            </li>
                        @else
                        <ul class="customer-support">
                                <li>
                                    <a href="{{ route('seller.login') }}" class="mr-3"><i class="fas fa-user"></i><span class="ml-2 d-none d-sm-inline-block">Merchant Login</span></a>
                                </li>

                                <li>
                                    <a href="{{ route('user.login') }}" class="mr-3"><i class="fas fa-user"></i><span class="ml-2 d-none d-sm-inline-block">User Login</span></a>
                                </li>
                                                    
                        </ul>
                        @endif
                    </ul>
                </div>
            </div>
        </div>
        <div class="header-bottom">
            <div class="container">
                <div class="header-wrapper">
                    <div class="logo">
                        <a href="{{ route('front.index') }}">
                            <img src="{{ asset('assets/images/' . $gs->logo) }}" alt="logo">
                        </a>
                    </div>
                    <ul class="menu ml-auto">
                        @if ($gs->is_home == 1)
                            <li>
                                <a href="{{ route('front.index') }}">{{ __('Home') }}</a>
                            </li>
                        @endif

                        @if ($gs->is_auction == 1)
                            <li>
                                <a href="{{ route('front.auctions') }}">{{ __('Auctions') }}</a>
                                <ul class="submenu">
                                    <li>
                                        <a href="{{ route('front.live') }}"> {{ __('Live Auctions') }}</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('front.featured') }}"> {{ __('Featured Auctions') }}</a>
                                    </li>
                                    @foreach (DB::table('categories')->where('status', 1)->get() as $cat)
                                        <li>
                                            <a
                                                href="{{ route('front.category', $cat->slug) }}">{{ __($cat->title) }}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            </li>
                        @endif

                        @if ($gs->is_merchant == 1)
                            <li>
                                <a href="{{ route('front.merchants') }}">{{ __('Merchants') }}</a>
                            </li>
                        @endif

                        @if ($gs->is_blog == 1)
                            <li>
                                <a href="{{ route('front.blog') }}">{{ __('Blog') }}</a>
                            </li>
                        @endif

                        @if ($gs->is_faq == 1)
                            <li>
                                <a href="{{ route('front.faq') }}">{{ __('FAQ') }}</a>
                            </li>
                        @endif

                        @if ($gs->is_page == 1 && DB::table('pages')->count())
                            <li>
                                <a href="javascript:;"> {{ __('Pages') }} </a>
                                <ul class="submenu">
                                    @foreach (DB::table('pages')->where('status', 1)->orderBy('id', 'desc')->get()
    as $page)
                                        <li><a href="{{ route('front.page', $page->slug) }}">
                                                {{ __($page->title) }}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            </li>
                        @endif

                        @if ($gs->is_contact == 1)
                            <li>
                                <a href="{{ route('front.contact') }}">{{ __('Contact Us') }}</a>
                            </li>
                        @endif
                    </ul>
                    <form class="search-form" action="{{ route('front.auctions') }}">
                        <input type="search" name="find" placeholder="Search for brand, model...."
                            value="{{ $_GET['find'] ?? '' }}">
                        <button type="submit"><i class="fas fa-search"></i></button>
                    </form>
                    <div class="search-bar d-md-none">
                        <a href="#0"><i class="fas fa-search"></i></a>
                    </div>
                    <div class="header-bar d-lg-none">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                </div>
            </div>
        </div>
    </header>
    {{-- ============ Header Section Ends Here ============ --}}
