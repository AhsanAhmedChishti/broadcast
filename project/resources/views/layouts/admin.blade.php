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
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="{{ asset('assets/admin/css/extras.css') }}" rel="stylesheet" />
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
                                    {{-- <span class="bar1"></span>
                                    <span class="bar2"></span>
                                    <span class="bar3"></span> --}}
                                    <i class="material-icons x2 opacity-10">menuopen</i>
                                </div>
                            </a>
                        </div>

                        <div class="right-eliment">
                            <ul class="list">

                                <li class="bell-area">
                                    <a id="notf_order" class="dropdown-toggle-1" href="javascript:;">
                                        <i class="material-icons opacity-10 position-absolute x2"
                                            style="left: 0;">notificationsalert</i>
                                        <span data-href="{{ route('order-notf-count') }}"
                                            id="order-notf-count">{{ App\Models\Notification::countOrder() }}</span>
                                    </a>
                                    <div class="dropdown-menu">
                                        <div class="dropdownmenu-wrapper" data-href="{{ route('order-notf-show') }}"
                                            id="order-notf-show">
                                        </div>
                                    </div>
                                </li>

                                <li class="login-profile-area">
                                    <a class="dropdown-toggle-1" href="javascript:;">
                                        <div class="user-img">
                                            <img src="{{ Auth::guard('admin')->user()->photo? asset('assets/images/admins/' . Auth::guard('admin')->user()->photo): asset('assets/images/noimage.png') }}"
                                                alt="">
                                        </div>
                                    </a>
                                    <div class="dropdown-menu">
                                        <div class="dropdownmenu-wrapper">
                                            <ul>
                                                <h5>{{ __('Welcome') }}!</h5>
                                                <li>
                                                    <a href="{{ route('admin.profile') }}"><i
                                                            class="fas fa-user"></i> {{ __('Edit Profile') }}</a>
                                                </li>
                                                <li>
                                                    <a href="{{ route('admin.password') }}"><i
                                                            class="fas fa-cog"></i>
                                                        {{ __('Change Password') }}</a>
                                                </li>
                                                <li>
                                                    <a href="{{ route('admin.logout') }}"><i
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
                            <a href="{{ route('admin.dashboard') }}" class="wave-effect active"><i
                                    class="fa fa-home mr-2"></i>{{ __('Dashbord') }}</a>
                        </li>
                        <li>
                            <a href="{{ route('admin-order-index') }}" class="wave-effect"><i
                                    class="fas fa-hand-holding-usd"></i>{{ __('Payments') }}</a>
                        </li>
                        <li>
                            <a href="{{ route('admin-category-index') }}" class="wave-effect active"><i
                                    class="fas fa-sitemap"></i>{{ __('Manage Categories') }}</a>
                        </li>


                        <li>
                            <a href="#auction" class="accordion-toggle wave-effect" data-toggle="collapse"
                                aria-expanded="false"><i class="fas fa-gavel"></i>{{ __('Auctions') }}</a>
                            <ul class="collapse list-unstyled" id="auction" data-parent="#accordion">
                                <li>
                                    <a href="{{ route('admin-auction-index') }}">
                                        {{ __('All Auctions List') }}</a>
                                </li>

                                <li>
                                    <a href="{{ route('admin-auction-create') }}"> {{ __('Create Auction') }}</a>
                                </li>

                                <li>
                                    <a href="{{ route('admin-auction-pending') }}">
                                        {{ __('Pending Auctions') }}</a>
                                </li>

                            </ul>
                        </li>


                        <li>
                            <a href="#menu3" class="accordion-toggle wave-effect" data-toggle="collapse"
                                aria-expanded="false">
                                <i class="icofont-user"></i>{{ __('Customers') }}
                            </a>
                            <ul class="collapse list-unstyled" id="menu3" data-parent="#accordion">
                                <li>
                                    <a
                                        href="{{ route('admin-user-index') }}"><span>{{ __('Customers List') }}</span></a>
                                </li>
                                <li>
                                    <a
                                        href="{{ route('admin-withdraw-index') }}"><span>{{ __('Withdraws') }}</span></a>
                                </li>
                            </ul>
                        </li>


                        <li>
                            <a href="#blog" class="accordion-toggle wave-effect" data-toggle="collapse"
                                aria-expanded="false">
                                <i class="fas fa-fw fa-newspaper"></i>{{ __('Blog') }}
                            </a>
                            <ul class="collapse list-unstyled" id="blog" data-parent="#accordion">
                                <li>
                                    <a
                                        href="{{ route('admin-cblog-index') }}"><span>{{ __('Categories') }}</span></a>
                                </li>
                                <li>
                                    <a href="{{ route('admin-blog-index') }}"><span>{{ __('Posts') }}</span></a>
                                </li>
                            </ul>
                        </li>


                        @if (Auth::guard('admin')->user()->IsAdmin())

                            <li>
                                <a href="#general" class="accordion-toggle wave-effect" data-toggle="collapse"
                                    aria-expanded="false">
                                    <i class="fas fa-cogs"></i>{{ __('General Settings') }}
                                </a>
                                <ul class="collapse list-unstyled" id="general" data-parent="#accordion">
                                    <li>
                                        <a href="{{ route('admin-gs-logo') }}"><span>{{ __('Logo') }}</span></a>
                                    </li>
                                    <li>
                                        <a href="{{ route('admin-gs-fav') }}"><span>{{ __('Favicon') }}</span></a>
                                    </li>
                                    <li>
                                        <a href="{{ route('admin-gs-load') }}"><span>{{ __('Loader') }}</span></a>
                                    </li>
                                    <li>
                                        <a
                                            href="{{ route('admin-gs-breadcumb') }}"><span>{{ __('Breadcumb Banner') }}</span></a>
                                    </li>

                                    <li>
                                        <a
                                            href="{{ route('admin-gs-contents') }}"><span>{{ __('Website Contents') }}</span></a>
                                    </li>
                                    <li>
                                        <a
                                            href="{{ route('admin-gs-success') }}"><span>{{ __('Success Messages') }}</span></a>
                                    </li>
                                    <li>
                                        <a
                                            href="{{ route('admin-gs-footer') }}"><span>{{ __('Footer') }}</span></a>
                                    </li>
                                    <li>
                                        <a
                                            href="{{ route('admin-gs-error') }}"><span>{{ __('Error Page') }}</span></a>
                                    </li>
                                    <li>
                                        <a
                                            href="{{ route('admin-gs-maintenance') }}"><span>{{ __('Website Maintenance') }}</span></a>
                                    </li>

                                </ul>
                            </li>

                        @endif


                        <li>
                            <a href="#homepage" class="accordion-toggle wave-effect" data-toggle="collapse"
                                aria-expanded="false">
                                <i class="fas fa-edit"></i>{{ __('Home Page Settings') }}
                            </a>
                            <ul class="collapse list-unstyled" id="homepage" data-parent="#accordion">
                                <li>
                                    <a href="{{ route('admin-sl-index') }}"><span>{{ __('Sliders') }}</span></a>
                                </li>
                                <li>
                                    <a
                                        href="{{ route('admin-service-index') }}"><span>{{ __('Services') }}</span></a>
                                </li>
                                <li>
                                    <a
                                        href="{{ route('admin-category-title-create') }}"><span>{{ __('Auction Categories Section') }}</span></a>
                                </li>
                                <li>
                                    <a
                                        href="{{ route('admin-auction-title-description') }}"><span>{{ __('Featured Auction Section') }}</span></a>
                                </li>
                                <li>
                                    <a
                                        href="{{ route('admin-ps-homecontact') }}"><span>{{ __('Contact Section') }}</span></a>
                                </li>
                                <li>
                                    <a
                                        href="{{ route('admin-ps-present') }}"><span>{{ __('Video Presentation Section') }}</span></a>
                                </li>
                                <li>
                                    <a
                                        href="{{ route('admin-review-index') }}"><span>{{ __('Review Section') }}</span></a>
                                </li>
                                <li>
                                    <a
                                        href="{{ route('admin-ps-blog') }}"><span>{{ __('Latest Blog  Section') }}</span></a>
                                </li>
                                <li>
                                    <a
                                        href="{{ route('admin-ps-customize') }}"><span>{{ __('Home Page Customization') }}</span></a>
                                </li>
                            </ul>
                        </li>


                        @if (Auth::guard('admin')->user()->IsAdmin())

                            <li>
                                <a href="#menu" class="accordion-toggle wave-effect" data-toggle="collapse"
                                    aria-expanded="false">
                                    <i class="fas fa-file-code"></i>{{ __('Menu Page Settings') }}
                                </a>
                                <ul class="collapse list-unstyled" id="menu" data-parent="#accordion">
                                    <li>
                                        <a
                                            href="{{ route('admin-faq-index') }}"><span>{{ __('FAQ Page') }}</span></a>
                                    </li>
                                    <li>
                                        <a
                                            href="{{ route('admin-ps-about') }}"><span>{{ __('About Page') }}</span></a>
                                    </li>
                                    <li>
                                        <a
                                            href="{{ route('admin-ps-contact') }}"><span>{{ __('Contact Us Page') }}</span></a>
                                    </li>
                                    <li>
                                        <a
                                            href="{{ route('admin-page-index') }}"><span>{{ __('Other Pages') }}</span></a>
                                    </li>
                                    <li>
                                        <a
                                            href="{{ route('admin-ps-menu-customize') }}"><span>{{ __('Customize Menu Links') }}</span></a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="#emails" class="accordion-toggle wave-effect" data-toggle="collapse"
                                    aria-expanded="false">
                                    <i class="fas fa-at"></i>{{ __('Email Settings') }}
                                </a>
                                <ul class="collapse list-unstyled" id="emails" data-parent="#accordion">
                                    <li><a
                                            href="{{ route('admin-mail-index') }}"><span>{{ __('Email Templates') }}</span></a>
                                    </li>
                                    <li><a
                                            href="{{ route('admin-mail-config') }}"><span>{{ __('Email Configurations') }}</span></a>
                                    </li>
                                    <li><a
                                            href="{{ route('admin-group-show') }}"><span>{{ __('Group Email') }}</span></a>
                                    </li>
                                </ul>
                            </li>

                            <li>
                                <a href="#payments" class="accordion-toggle wave-effect" data-toggle="collapse"
                                    aria-expanded="false">
                                    <i class="fas fa-file-code"></i>{{ __('Payment Settings') }}
                                </a>
                                <ul class="collapse list-unstyled" id="payments" data-parent="#accordion">
                                    <li><a
                                            href="{{ route('admin-gs-payments') }}"><span>{{ __('Payment Informations') }}</span></a>
                                    </li>
                                    <li><a
                                            href="{{ route('admin-gs-currency') }}"><span>{{ __('Currency') }}</span></a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="#socials" class="accordion-toggle wave-effect" data-toggle="collapse"
                                    aria-expanded="false">
                                    <i class="fas fa-paper-plane"></i>{{ __('Social Settings') }}
                                </a>
                                <ul class="collapse list-unstyled" id="socials" data-parent="#accordion">
                                    <li><a
                                            href="{{ route('admin-social-index') }}"><span>{{ __('Social Links') }}</span></a>
                                    </li>
                                    <li><a
                                            href="{{ route('facebook.auth') }}"><span>{{ __('Configure FB Auto Post') }}</span></a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="{{ route('admin-tlang-index') }}"><i
                                        class="fas fa-language"></i>{{ __('Language Settings') }}</a>
                            </li>
                            <li>
                                <a href="#seoTools" class="accordion-toggle wave-effect" data-toggle="collapse"
                                    aria-expanded="false">
                                    <i class="fas fa-wrench"></i>{{ __('SEO Tools') }}
                                </a>
                                <ul class="collapse list-unstyled" id="seoTools" data-parent="#accordion">
                                    <li>
                                        <a
                                            href="{{ route('admin-seotool-analytics') }}"><span>{{ __('Google Analytics') }}</span></a>
                                    </li>
                                    <li>
                                        <a
                                            href="{{ route('admin-seotool-keywords') }}"><span>{{ __('Website Meta Keywords') }}</span></a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="{{ route('admin-staff-index') }}" class=" wave-effect"><i
                                        class="fas fa-user-secret"></i>{{ __('Manage Staffs') }}</a>
                            </li>




                        @endif

                        <li>
                            <a href="#sactive" class="accordion-toggle wave-effect" data-toggle="collapse"
                                aria-expanded="false">
                                {{-- <i class="fas fa-cog"></i>{{ __('System Activation') }} --}}
                                <i class="fas fa-cog"></i>{{ __('System Backup') }}
                            </a>
                            <ul class="collapse list-unstyled" id="sactive" data-parent="#accordion">

                                {{-- <li><a href="{{ route('admin-activation-form') }}"> {{ __('Activation') }}</a>
                                </li> --}}
                                <li><a href="{{ route('admin-generate-backup') }}">
                                        {{ __('Generate Backup') }}</a></li>
                            </ul>
                        </li>

                        <li>
                            <a href="{{ route('admin-subs-index') }}" class=" wave-effect"><i
                                    class="fas fa-users-cog mr-2"></i>{{ __('Subscribers') }}</a>
                        </li>
                    </ul>
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
