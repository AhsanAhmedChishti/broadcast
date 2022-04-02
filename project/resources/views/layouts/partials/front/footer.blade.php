{{-- ============ Footer Section Starts Here ============ --}}
<footer class="bg_img padding-top oh" data-background="{{ asset('assets/front-new/images/footer/footer-bg.jpg') }}">
    <div class="footer-top-shape">
        <img src="{{ asset('assets/front-new/css/img/footer-top-shape.png') }}" alt="css">
    </div>
    <div class="anime-wrapper">
        <div class="anime-1 plus-anime">
            <img src="{{ asset('assets/front-new/images/footer/p1.png') }}" alt="footer">
        </div>
        <div class="anime-2 plus-anime">
            <img src="{{ asset('assets/front-new/images/footer/p2.png') }}" alt="footer">
        </div>
        <div class="anime-3 plus-anime">
            <img src="{{ asset('assets/front-new/images/footer/p3.png') }}" alt="footer">
        </div>
        <div class="anime-5 zigzag">
            <img src="{{ asset('assets/front-new/images/footer/c2.png') }}" alt="footer">
        </div>
        <div class="anime-6 zigzag">
            <img src="{{ asset('assets/front-new/images/footer/c3.png') }}" alt="footer">
        </div>
        <div class="anime-7 zigzag">
            <img src="{{ asset('assets/front-new/images/footer/c4.png') }}" alt="footer">
        </div>
    </div>
    <div class="newslater-wrapper">
        <div class="container">
            <div class="newslater-area">
                <div class="newslater-thumb">
                    <img src="{{ asset('assets/front-new/images/footer/newslater.png') }}" alt="footer">
                </div>
                <div class="newslater-content">
                    <div class="section-header left-style mb-low">
                        <h5 class="cate">{{ __('Subscribe to') }} {{ __($gs->title) }}</h5>
                        <h3 class="title">{{ __('To Get Exclusive Benefits') }}</h3>
                    </div>
                    <form id="subscribeform" class="subscribe-form" action="{{ route('front.subscribe') }}"
                        method="POST">
                        {{ csrf_field() }}
                        <input type="email" name="email" placeholder="{{ __('Your email address') }}" required>
                        <button id="sub-btn" type="submit" class="custom-button">{{ __('Subscribe') }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-top padding-bottom padding-top">
        <div class="container">
            <div class="row mb--60">

                @if ($categories = DB::table('categories')->where('status', 1)->orderBy('title')->get())
                    <div class="col-sm-6 col-lg-3">
                        <div class="footer-widget widget-links">
                            <h5 class="title">{{ __('Auction Categories') }}</h5>
                            <ul class="links-list">
                                @foreach ($categories as $category)
                                    <li>
                                        <a
                                            href="{{ route('front.category', $category->slug) }}">{{ __($category->title) }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                @endif

                @if ($pages = DB::table('pages')->where('status', 1)->orderBy('id', 'desc')->get())
                    <div class="col-sm-6 col-lg-3">
                        <div class="footer-widget widget-links">
                            <h5 class="title">{{ __('About Us') }}</h5>
                            <ul class="links-list">
                                @foreach ($pages as $page)
                                    <li>
                                        <a
                                            href="{{ route('front.page', $page->slug) }}">{{ __($page->title) }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                @endif

                <div class="col-sm-6 col-lg-3">
                    <div class="footer-widget widget-links">
                        <h5 class="title">{{ __('We\'re Here to Help') }}</h5>
                        <ul class="links-list">
                            <li>
                                <a href="{{ route('front.faq') }}">{{ __('FAQs') }}</a>
                            </li>
                            <li>
                                <a href="{{ route('front.contact') }}">{{ __('Contact Us') }}</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-3">
                    <div class="footer-widget widget-follow">
                        <h5 class="title">Follow Us</h5>
                        <ul class="links-list">
                            @if (App\Models\Pagesetting::find(1)->phone != null)
                                <li>
                                    <a href="tel:{{ App\Models\Pagesetting::find(1)->phone }}"><i
                                            class="fas fa-phone-alt"></i>{{ App\Models\Pagesetting::find(1)->phone }}</a>
                                </li>
                            @endif

                            @if (App\Models\Pagesetting::find(1)->email != null)
                                <li>
                                    <a href="mailto:{{ App\Models\Pagesetting::find(1)->email }}"><i
                                            class="fas fa-envelope-open-text"></i>{{ Str::substr(App\Models\Pagesetting::find(1)->email, 0, 20) }}&hellip;</a>
                                </li>
                            @endif

                            @if (App\Models\Pagesetting::find(1)->street != null)
                                @php
                                    $street = App\Models\Pagesetting::find(1)->street;
                                    $street = explode(',', $street);
                                @endphp
                                <li>
                                    <a href="#0"><i class="fas fa-location-arrow"></i>{!! __(implode('<br />', $street)) !!}</a>
                                </li>
                            @endif

                        </ul>
                        <ul class="social-icons">
                            @if (App\Models\Socialsetting::find(1)->f_status == 1)
                                <li>
                                    <a href="{{ App\Models\Socialsetting::find(1)->facebook }}" target="_blank"><i
                                            class="fab fa-facebook-f"></i></a>
                                </li>
                            @endif
                            @if (App\Models\Socialsetting::find(1)->t_status == 1)
                                <li>
                                    <a href="{{ App\Models\Socialsetting::find(1)->twitter }}" target="_blank"><i
                                            class="fab fa-twitter"></i></a>
                                </li>
                            @endif
                            @if (App\Models\Socialsetting::find(1)->g_status == 1)
                                <li>
                                    <a href="{{ App\Models\Socialsetting::find(1)->gplus }}" target="_blank"><i
                                            class="fab fa-instagram"></i></a>
                                </li>
                            @endif
                            @if (App\Models\Socialsetting::find(1)->l_status == 1)
                                <li>
                                    <a href="{{ App\Models\Socialsetting::find(1)->linkedin }}" target="_blank"><i
                                            class="fab fa-linkedin-in"></i></a>
                                </li>
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-bottom">
        <div class="container">
            <div class="copyright-area">
                <div class="footer-bottom-wrapper">
                    <div class="logo">
                        <a href="index.html"><img src="{{ asset('assets/images/' . $gs->footer_logo) }}"
                                alt="logo"></a>
                    </div>
                    <ul class="gateway-area">
                        <li>
                            <a href="#0"><img src="{{ asset('assets/front-new/images/footer/paypal.png') }}"
                                    alt="footer"></a>
                        </li>
                        <li>
                            <a href="#0"><img src="{{ asset('assets/front-new/images/footer/visa.png') }}"
                                    alt="footer"></a>
                        </li>
                        <li>
                            <a href="#0"><img src="{{ asset('assets/front-new/images/footer/discover.png') }}"
                                    alt="footer"></a>
                        </li>
                        <li>
                            <a href="#0"><img src="{{ asset('assets/front-new/images/footer/mastercard.png') }}"
                                    alt="footer"></a>
                        </li>
                    </ul>
                    <div class="copyright">
                        <p>{!! Str::replaceFirst('[CURRENT_YEAR]', date('Y'), $gs->copyright) !!}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
{{-- ============ Footer Section Ends Here ============ --}}

<script type="text/javascript">
    var mainurl = "{{ url('/') }}";
    var gs = {!! json_encode($gs) !!};
    var admin_loader = {{ $gs->is_admin_loader }};
</script>

{{-- <script data-cfasync="false" src="../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script> --}}
<script src="{{ asset('assets/front-new/js/jquery-3.3.1.min.js') }}"></script>
<script src="{{ asset('assets/front-new/js/modernizr-3.6.0.min.js') }}"></script>
<script src="{{ asset('assets/front-new/js/plugins.js') }}"></script>
<script src="{{ asset('assets/admin/js/plugin.js') }}"></script>
<script src="{{ asset('assets/front-new/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/front-new/js/isotope.pkgd.min.js') }}"></script>
<script src="{{ asset('assets/front-new/js/wow.min.js') }}"></script>
<script src="{{ asset('assets/front-new/js/waypoints.js') }}"></script>
<script src="{{ asset('assets/front-new/js/nice-select.js') }}"></script>
<script src="{{ asset('assets/admin/js/nicEdit.js') }}"></script>
<script src="{{ asset('assets/front-new/js/counterup.min.js') }}"></script>
<script src="{{ asset('assets/front-new/js/owl.min.js') }}"></script>
<script src="{{ asset('assets/front-new/js/magnific-popup.min.js') }}"></script>
<script src="{{ asset('assets/front-new/js/yscountdown.min.js') }}"></script>
<script src="{{ asset('assets/front-new/js/jquery-ui.min.js') }}"></script>
<script src="{{ asset('assets/front-new/js/toastr.min.js') }}"></script>
<script src="{{ asset('assets/front-new/js/main.js') }}"></script>
<script src="{{ asset('assets/front/js/notify.js') }}"></script>
<script src="{{ asset('assets/front/js/custom.js') }}"></script>
<script src="{{ asset('assets/admin/js/myscript.js') }}"></script>

{!! $seo->google_analytics !!}

@if ($gs->is_talkto == 1)
    <!--Start of Tawk.to Script-->
    {!! $gs->talkto !!}
    <!--End of Tawk.to Script-->
@endif

<script>
    if (document.forms.sort) {
        var sortForm = document.forms.sort;
        $(sortForm).on('change', 'select', function(e) {
            sortForm.submit();
        });
    }

    if (document.forms.show) {
        var showForm = document.forms.show;
        $(showForm).on('change', 'select', function(e) {
            showForm.submit();
        });
    }

    window.addEventListener('load', function() {
        if (-1 !== this.location.search.indexOf('sort_by') || -1 !== this.location.search.indexOf('find')) {
            if (!this.location.hash) {
                this.location.href += '#product-header';
            }
        }
    });
</script>

<script>
    var count = $('.__coundown');

    if (count.length > 0) {
        $(count).each(function() {
            var date = $(this).data('date');
            var countDownDate = new Date(date).getTime();
            var $this = $(this);
            var x = setInterval(function() {
                    var denTime = new Date().toLocaleString("en-US", {
                        timeZone: '{{ $gs->time_zone }}'
                    });

                    // Get today's date and time
                    var now = new Date(denTime).getTime();

                    // Find the distance between now and the count down date
                    var distance = countDownDate - now;

                    // Time calculations for days, hours, minutes and seconds
                    var days = Math.floor(distance / (1000 * 60 * 60 * 24));
                    var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                    var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                    var seconds = Math.floor((distance % (1000 * 60)) / 1000);

                    var text = days + 'd : ' + hours + 'h : ' + minutes + 'm : ' + seconds + 's';

                    $this.html(text);

                    // If the count down is finished, write some text
                    if (distance < 0) {

                        clearInterval(x);

                        var text = 0 + 'd : ' + 0 + 'h : ' + 0 + 'm : ' + 0 + 's';

                        $this.html(text);
                    }
                },
                1000);
        });
    }

    // Nic Editor
    var elementArray = document.getElementsByClassName("nic-edit");
    for (var i = 0; i < elementArray.length; ++i) {
        nicEditors.editors.push(
            new nicEditor({
                fullPanel: true
            }).panelInstance(
                elementArray[i]
            )
        );
        $('.nicEdit-panelContain').parent().width('100%');
        $('.nicEdit-panelContain').parent().next().width('98%');
    }
    // NIC Editor Ends
</script>

@auth
    <script>
        if (document.getElementById('usr-notf-count')) {
            setInterval(getUserNotificationsCount, 1000);

            function getUserNotificationsCount() {
                var xhr = new XMLHttpRequest();
                xhr.open('GET', "{{ route('user-notf-count', Auth::id()) }}")
                xhr.onload = function() {
                    if (!localStorage.getItem('abbasCount')) {
                        localStorage.setItem('abbasCount', this.responseText);
                    }
                    if (localStorage.getItem('abbasCount') && this.responseText > localStorage.getItem('abbasCount')) {
                        console.log('This true');
                        toastr.success('You have one new notification.', '', {
                            positionClass: 'toast-bottom-right'
                        });
                        localStorage.setItem('abbasCount', this.responseText);
                    }
                    document.getElementById('usr-notf-count').innerText = ' ' + this.responseText;
                };
                xhr.send();
            }
        }
    </script>
@endauth

@yield('scripts')
</body>

</html>
