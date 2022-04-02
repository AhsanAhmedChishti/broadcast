<!doctype html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="author" content="GeniusOcean">
    <!-- Title -->
    <title>{{ $gs->title }}</title>
    <!-- favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/images/' . $gs->favicon) }}" />
    <!-- Bootstrap -->
    <link href="{{ asset('assets/admin/css/bootstrap.min.css') }}" rel="stylesheet" />
    <!-- Fontawesome -->
    <link rel="stylesheet" href="{{ asset('assets/admin/css/fontawesome.css') }}">
    <!-- icofont -->
    <link rel="stylesheet" href="{{ asset('assets/admin/css/icofont.min.css') }}">
    <!-- Sidemenu Css -->
    <link href="{{ asset('assets/admin/plugins/fullside-menu/css/dark-side-style.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/admin/plugins/fullside-menu/waves.min.css') }}" rel="stylesheet" />

    <link href="{{ asset('assets/admin/css/plugin.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/admin/css/jquery.tagit.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('assets/admin/css/bootstrap-coloroicker.css') }}">
    <!-- Main Css -->
    <link href="{{ asset('assets/admin/css/style.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/admin/css/custom.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/admin/css/responsive.css') }}" rel="stylesheet" />
    @yield('styles')

</head>

<body>
    <div class="page">
        <div class="page-main">
            <!-- Header Menu Area Start -->
            <div class="header">
                <div class="container-fluid">
                    <div class="d-flex justify-content-between">
                        <div class="menu-toggle-button">
                            <a class="nav-link" href="javascript:;" id="sidebarCollapse">
                                <div class="my-toggl-icon">
                                    <span class="bar1"></span>
                                    <span class="bar2"></span>
                                    <span class="bar3"></span>
                                </div>
                            </a>
                        </div>

                        <div class="right-eliment">
                            <ul class="list">

                                <li class="bell-area">
                                    <a id="user-notf" class="dropdown-toggle-1" href="javascript:;">
                                        <i class="far fa-newspaper"></i>
                                        <span data-href="{{ route('user-notf-count', Auth::user()->id) }}"
                                            id="user-notf-count">{{ App\Models\UserNotification::countNotification(Auth::user()->id) }}</span>
                                    </a>
                                    <div class="dropdown-menu">
                                        <div class="dropdownmenu-wrapper"
                                            data-href="{{ route('user-notf-show', Auth::user()->id) }}"
                                            id="user-notf-show">
                                        </div>
                                    </div>
                                </li>

                                <li class="login-profile-area">
                                    <a class="dropdown-toggle-1" href="javascript:;">
                                        <div class="user-img">
                                            <img src="{{ Auth::user()->photo? asset('assets/images/users/' . Auth::user()->photo): asset('assets/images/noimage.png') }}"
                                                alt="">
                                        </div>
                                    </a>
                                    <div class="dropdown-menu">
                                        <div class="dropdownmenu-wrapper">
                                            <ul>
                                                <h5>{{ __('Welcome') }}! {{ Auth::user()->name }}</h5>
                                                <li>
                                                    <a href="{{ route('user.myprofile') }}"><i
                                                            class="fas fa-user"></i> {{ __('Edit Profile') }}</a>
                                                </li>
                                                <li>
                                                    <a href="{{ route('user.password') }}"><i
                                                            class="fas fa-cog"></i>
                                                        {{ __('Change Password') }}</a>
                                                </li>
                                                <li>
                                                    <a href="{{ route('user.logout') }}"><i
                                                            class="fas fa-power-off"></i> {{ __('Logout') }}</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Header Menu Area End -->
            <div class="wrapper">
                <!-- Side Menu Area Start -->
                <nav id="sidebar" class="nav-sidebar">
                    <ul class="list-unstyled components" id="accordion">
                        <li>
                            <a href="{{ route('user.dashboard') }}" class="wave-effect active"><i
                                    class="fa fa-home mr-2"></i>{{ __('Dashbord') }}</a>
                        </li>

                        <li>
                            <a href="{{ route('user-order-index') }}" class="wave-effect"><i
                                    class="fas fa-hand-holding-usd"></i>{{ __('My Payments') }}</a>
                        </li>


                        <li>
                            <a href="#auction" class="accordion-toggle wave-effect" data-toggle="collapse"
                                aria-expanded="false"><i class="fas fa-gavel"></i>{{ __('Auctions') }}</a>
                            <ul class="collapse list-unstyled" id="auction" data-parent="#accordion">
                                <li>
                                    <a href="{{ route('user-auction-index') }}"> {{ __('All Auctions List') }}</a>
                                </li>

                                <li>
                                    <a href="{{ route('user-auction-create') }}">{{ __('Create Auction') }}</a>
                                </li>

                                <li>
                                    <a href="{{ route('user-auction-pending') }}">
                                        {{ __('Pending Auctions') }}</a>
                                </li>

                            </ul>
                        </li>

                        <li>
                            <a href="{{ route('user-bid-index') }}" class="wave-effect "><i
                                    class="fas fa-check"></i>{{ __('My Bids') }}</a>
                        </li>


                        <li>
                            <a href="{{ route('user-wt-index') }}" class="wave-effect "><i
                                    class="fas fa-dollar-sign"></i>{{ __('Withdraws') }}</a>
                        </li>




                </nav>
                <!-- Main Content Area Start -->
                @yield('content')
                <!-- Main Content Area End -->
            </div>
        </div>
    </div>

    <script type="text/javascript">
        var mainurl = "{{ url('/') }}";
        var admin_loader = {{ $gs->is_admin_loader }};
    </script>

    <!-- Dashboard Core -->
    <script src="{{ asset('assets/admin/js/vendors/jquery-1.12.4.min.js') }}"></script>
    <script src="{{ asset('assets/admin/js/vendors/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/admin/js/jqueryui.min.js') }}"></script>
    <!-- Fullside-menu Js-->
    <script src="{{ asset('assets/admin/plugins/fullside-menu/jquery.slimscroll.min.js') }}"></script>
    <script src="{{ asset('assets/admin/plugins/fullside-menu/waves.min.js') }}"></script>

    <script src="{{ asset('assets/admin/js/plugin.js') }}"></script>
    <script src="{{ asset('assets/admin/js/Chart.min.js') }}"></script>
    <script src="{{ asset('assets/admin/js/tag-it.js') }}"></script>
    <script src="{{ asset('assets/admin/js/nicEdit.js') }}"></script>
    <script src="{{ asset('assets/admin/js/bootstrap-colorpicker.min.js') }}"></script>
    <script src="{{ asset('assets/admin/js/notify.js') }}"></script>

    <script src="{{ asset('assets/admin/js/jquery.canvasjs.min.js') }}"></script>

    <script src="{{ asset('assets/admin/js/load.js') }}"></script>
    <!-- Custom Js-->
    <script src="{{ asset('assets/admin/js/custom.js') }}"></script>
    <!-- AJAX Js-->
    <script src="{{ asset('assets/admin/js/myscript.js') }}"></script>

    @yield('scripts')

    @if ($gs->is_admin_loader == 0)
        <style>
            div#abbasTable_processing {
                display: none !important;
            }

        </style>
    @endif

</body>

</html>
