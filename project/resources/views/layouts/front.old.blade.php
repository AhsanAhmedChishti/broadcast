<!DOCTYPE html>
<html lang="en">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	@if(isset($page->meta_tag) && isset($page->meta_description))
	<meta name="keywords" content="{{ $page->meta_tag }}">
	<meta name="description" content="{{ $page->meta_description }}">
	@elseif(isset($blog->meta_tag) && isset($blog->meta_description))
	<meta name="keywords" content="{{ $blog->meta_tag }}">
	<meta name="description" content="{{ $blog->meta_description }}">
	@else
	<meta name="keywords" content="{{ $seo->meta_keys }}">
	<meta name="author" content="GeniusOcean">
	@endif
	<title>{{$gs->title}}</title>
	<!-- favicon -->
	<link rel="icon" type="image/x-icon" href="{{asset('assets/images/'.$gs->favicon)}}" />
	<!-- bootstrap -->
	<link rel="stylesheet" href="{{ asset('assets/front/css/bootstrap.min.css') }}">
	<!-- Plugin css -->
	<link rel="stylesheet" href="{{ asset('assets/front/css/plugin.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/front/css/animate.css') }}">
	<!-- stylesheet -->
	<link rel="stylesheet" href="{{ asset('assets/front/css/style.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/front/css/custom.css') }}">
	<!-- responsive -->
	<link rel="stylesheet" href="{{ asset('assets/front/css/responsive.css') }}">

	<!--Updated CSS-->
	<link rel="stylesheet" href="{{ asset('assets/front/css/styles.php?color='.str_replace('#','',$gs->colors)) }}">


	@yield('styles')

</head>

<body>

@if($gs->is_loader == 1)
	<div class="preloader" id="preloader" style="background: url({{asset('assets/images/'.$gs->loader)}}) no-repeat scroll center center #FFF;"></div>
@endif

	<!--Main-Menu Area Start-->
	<div class="mainmenu-area">
		<!-- Top Header Area Start -->
		<div class="top-header">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="content">
							<div class="left-content">
								<p class="title">{{ __('Follow Us') }}:</p>
								<ul class="social-link">
									@if(App\Models\Socialsetting::find(1)->f_status == 1)
										<li>
											<a href="{{ App\Models\Socialsetting::find(1)->facebook }}" target="_blank">
												<i class="fab fa-facebook-f"></i>
											</a>
										</li>
									@endif
									@if(App\Models\Socialsetting::find(1)->t_status == 1)
									<li>
										<a href="{{ App\Models\Socialsetting::find(1)->twitter }}" target="_blank">
											<i class="fab fa-twitter"></i>
										</a>
									</li>
									@endif
									@if(App\Models\Socialsetting::find(1)->l_status == 1)
									<li>
										<a href="{{ App\Models\Socialsetting::find(1)->linkedin }}" target="_blank">
											<i class="fab fa-linkedin-in"></i>
										</a>
									</li>
									@endif
									@if(App\Models\Socialsetting::find(1)->g_status == 1)
									<li>
										<a href="{{ App\Models\Socialsetting::find(1)->gplus }}" target="_blank">
											<i class="fab fa-instagram"></i>
										</a>
									</li>
									@endif
								</ul>
							</div>
							<div class="right-content">
								<div class="language-selector">
									<i class="fas fa-globe-americas"></i>
									<select name="language" class="language">
										@foreach(DB::table('admin_languages')->get() as $language)
											<option value="{{route('front.language',$language->id)}}" {{ Session::has('language') ? ( Session::get('language') == $language->id ? 'selected' : '' ) : (DB::table('admin_languages')->where('is_default','=',1)->first()->id == $language->id ? 'selected' : '') }} >{{$language->language}}</option>
										@endforeach
									</select>
								</div>

								@if(Auth::check())
								<div class="language-selector">
										<i class="far fa-user-circle"></i>
										<select name="language" class="language">

												<option value="{{route('user.dashboard')}}" class="d-none" selected>{{ __('My Account') }}</option>
												<option value="{{route('user.dashboard')}}">{{ __('Dashboard') }}</option>
												<option value="{{route('user.logout')}}">{{ __('Logout') }}</option>
										</select>
								</div>
								@else 
								<div class="sign-log">
									<div class="links">
										<a class="sign-in" href="#" data-toggle="modal" data-target="#log-reg">{{ __('Sign in') }}</a> <span>|</span>
										<a class="join" href="" data-toggle="modal"
											data-target="#log-reg">{{ __('Join') }}</a>
									</div>
								</div>
								@endif
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- Top Header Area End -->
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<nav class="navbar navbar-expand-lg navbar-light">
						<a class="navbar-brand" href="{{ route('front.index') }}">
							<img src="{{ asset('assets/images/'.$gs->logo) }}" alt="">
						</a>
						<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main_menu"
							aria-controls="main_menu" aria-expanded="false" aria-label="Toggle navigation">
							<span class="navbar-toggler-icon"></span>
						</button>
						<div class="collapse navbar-collapse fixed-height" id="main_menu">
							<ul class="navbar-nav ml-auto">
								@if($gs->is_home == 1)
								<li class="nav-item">
									<a class="nav-link" href="{{ route('front.index') }}">{{ __('Home') }}</a>
								</li>
								@endif
								@if($gs->is_blog == 1)
								<li class="nav-item">
									<a class="nav-link" href="{{ route('front.blog') }}">{{ __('Blog') }}</a>
								</li>
								@endif
								@if($gs->is_auction == 1)
								<li class="nav-item dropdown">
									<a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown"
										aria-haspopup="true" aria-expanded="false">
										{{ __('Auctions') }}
									</a>
									<ul class="dropdown-menu">
										<li>
											<a class="dropdown-item" href="{{ route('front.featured') }}"> <i class="fa fa-angle-double-right"></i>{{ __('Featured Auctions') }}</a>
										</li>
										@foreach(DB::table('categories')->where('status',1)->get() as $data)
										<li>
											<a class="dropdown-item" href="{{ route('front.category',$data->slug) }}"> <i class="fa fa-angle-double-right"></i>{{ $data->title }}</a>
										</li>
										@endforeach
									</ul>
								</li>
								@endif
								@if($gs->is_faq == 1)
								<li class="nav-item">
									<a class="nav-link" href="{{ route('front.faq') }}">{{ __('FAQ') }}</a>
								</li>
								@endif
								@if($gs->is_page == 1)
								@if(DB::table('pages')->count() > 0)
								<li class="nav-item dropdown">
									<a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown"
										aria-haspopup="true" aria-expanded="false">
										{{ __('Pages') }}
									</a>
									<ul class="dropdown-menu">
										@foreach(DB::table('pages')->where('status',1)->orderBy('id','desc')->get() as $data)
										<li><a class="dropdown-item" href="{{ route('front.page',$data->slug) }}"> <i
													class="fa fa-angle-double-right"></i>{{ $data->title }}</a></li>
										@endforeach
									</ul>
								</li>
								@endif
								@endif
								@if($gs->is_contact == 1)
								<li class="nav-item">
									<a class="nav-link" href="{{ route('front.contact') }}">{{ __('Contact Us') }}</a>
								</li>
								@endif
							</ul>
						</div>
						<!-- <a class="mybtn1 donet-btn" href="#">
							Donate Now!
						</a> -->
					</nav>
				</div>
			</div>
		</div>
	</div>
	<!--Main-Menu Area Start-->

	@yield('content')

	<!-- Footer Area Start -->
	<footer class="footer" id="footer">
		<div class="container">
			<div class="row">
				<div class="col-md-6 col-lg-4">
					<div class="footer-widget about-widget">
						<div class="footer-logo">
							<a href="{{ route('front.index') }}">
								<img src="{{ asset('assets/images/'.$gs->footer_logo) }}" alt="">
							</a>
						</div>
						<div class="text">
							<p>
								{{ $gs->footer }}
							</p>
						</div>

					</div>
				</div>
				<div class="col-md-6 col-lg-4">
					<div class="footer-widget address-widget">
						<h4 class="title">
							{{ __('ADDRESS') }}
						</h4>
						<ul class="about-info">
							@if(App\Models\Pagesetting::find(1)->street != null)
							<li>
								<p>
									<i class="fas fa-globe"></i>
									{{ App\Models\Pagesetting::find(1)->street }}
								</p>
							</li>
							@endif
							@if(App\Models\Pagesetting::find(1)->phone != null)
							<li>
								<p>
									<a href="tel:{{App\Models\Pagesetting::find(1)->phone}}">
										<i class="fas fa-phone"></i>
										{{ App\Models\Pagesetting::find(1)->phone }}
									</a>
								</p>
							</li>
							@endif
							@if(App\Models\Pagesetting::find(1)->email != null)
							<li>
								<p>
									<i class="far fa-envelope"></i>
									<a href="mailto:{{App\Models\Pagesetting::find(1)->emaill}}">
										{{ App\Models\Pagesetting::find(1)->email }}
									</a>
								</p>
							</li>
							@endif
						</ul>
					</div>
				</div>
				<div class="col-md-6 col-lg-4">
					<div class="footer-widget  footer-newsletter-widget">
						<h4 class="title">
							{{ __('NEWSLETTER') }}
						</h4>
						<div class="newsletter-form-area">
							<form id="subscribeform" action="{{ route('front.subscribe') }}" method="POST">
								{{ csrf_field() }}
								<input type="email" id="subemail" required="" name="email"
									placeholder="{{ __('Your email address') }}">
								<button id="sub-btn" type="submit">
									<i class="far fa-paper-plane"></i>
								</button>
							</form>
						</div>
						<div class="social-links">
							<h4 class="title">
								{{ __("We're social, connect with us") }}:
							</h4>
							<div class="fotter-social-links">
								<ul>
									@if(App\Models\Socialsetting::find(1)->f_status == 1)
									<li>
										<a href="{{ App\Models\Socialsetting::find(1)->facebook }}" class="facebook"
											target="_blank">
											<i class="fab fa-facebook-f"></i>
										</a>
									</li>
									@endif

									@if(App\Models\Socialsetting::find(1)->g_status == 1)
									<li>
										<a href="{{ App\Models\Socialsetting::find(1)->gplus }}" class="google-plus"
											target="_blank">
											<i class="fab fa-instagram"></i>
										</a>
									</li>
									@endif

									@if(App\Models\Socialsetting::find(1)->t_status == 1)
									<li>
										<a href="{{ App\Models\Socialsetting::find(1)->twitter }}" class="twitter"
											target="_blank">
											<i class="fab fa-twitter"></i>
										</a>
									</li>
									@endif

									@if(App\Models\Socialsetting::find(1)->l_status == 1)
									<li>
										<a href="{{ App\Models\Socialsetting::find(1)->linkedin }}" class="linkedin"
											target="_blank">
											<i class="fab fa-linkedin-in"></i>
										</a>
									</li>
									@endif

									@if(App\Models\Socialsetting::find(1)->d_status == 1)
									<li>
										<a href="{{ App\Models\Socialsetting::find(1)->dribble }}" class="dribble"
											target="_blank">
											<i class="fab fa-dribbble"></i>
										</a>
									</li>
									@endif

								</ul>
							</div>
						</div>

					</div>
				</div>
			</div>
		</div>
		<div class="copy-bg">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="content">
							<div class="content">
								<p>{!! $gs->copyright !!}</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</footer>
	<!-- Footer Area End -->



	<!-- Back to Top Start -->
	<div class="bottomtotop">
		<i class="fas fa-chevron-right"></i>
	</div>
	<!-- Back to Top End -->

	<!-- LOgin Register Form Start -->

	<div class="modal fade" id="log-reg" tabindex="-1" role="dialog" 
		aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
					<button type="button" class="modal-close" data-dismiss="modal" aria-label="Close">
							<i class="fas fa-times"></i>
					</button>
				<div class="modal-body">
						<nav class="comment-log-reg-tabmenu core-nav">
							<div class="full-container">
								<div class="nav nav-tabs" id="nav-tab" role="tablist">
									<a class="nav-item nav-link login active" id="nav-log-tab" data-toggle="tab" href="#nav-log"
										role="tab" aria-controls="nav-log" aria-selected="true">
										{{__('Login')}}
									</a>
									<a class="nav-item nav-link" id="nav-reg-tab" data-toggle="tab" href="#nav-reg" role="tab"
										aria-controls="nav-reg" aria-selected="false">
										{{__('Register')}}
									</a>
								</div>
							</div>
						</nav>
						<div class="dropdown-overlay"></div>
						<div class="tab-content" id="nav-tabContent">
							<div class="tab-pane fade active show" id="nav-log" role="tabpanel" aria-labelledby="nav-log-tab">
								<div class="login-area">
									<div class="header-area">
										<h4 class="title">{{ __('Login Now') }}</h4>
									</div>
									<div class="login-form signin-form">
										@include('includes.admin.form-login')
										<form id="mloginform" action="{{route('user-login-submit')}}"
											method="POST">
											{{ csrf_field() }}
											<div class="form-input">
												<input type="email" name="email" placeholder="{{ __('Type Email Address') }}" required="">
												<i class="fas fa-envelope"></i>
											</div>
											<div class="form-input">
												<input type="password" class="Password" name="password"
													placeholder="{{ __('Type Password') }}" required="">
												<i class="fas fa-key"></i>
											</div>
											<div class="form-forgot-pass">
												<div class="left">
													<input type="hidden" id="modal-hidden" name="modal" value="0">
													<input type="checkbox" name="remember" id="mrp">
													<label for="mrp">{{ __('Remember Password') }}</label>
												</div>
												<div class="right">
													<a href="javascript:;" id="show-forgot">
														{{ __('Forgot Password') }}?
													</a>
												</div>
											</div>
											<input id="mauthdata" type="hidden" value="{{ __('Authenticating') }}...">
											<button type="submit" class="submit-btn">{{ __('Login') }}</button>
										</form>
									</div>
								</div>
							</div>
							<div class="tab-pane fade" id="nav-reg" role="tabpanel" aria-labelledby="nav-reg-tab">
								<div class="login-area signup-area">
									<div class="header-area">
										<h4 class="title">{{ __('Signup Now') }}</h4>
									</div>
									@include('includes.admin.form-login')
									<form id="mregisterform"
										action="{{route('user-register-submit')}}" method="POST">
										{{ csrf_field() }}
										
										<div class="d-flex mb-3">

											<ul class="radio-btn-list">
												<li>
													<div class="radio-design">
														<input type="radio" class="shipping" id="free-shepping1" name="type" value="0" checked > 
														<span class="checkmark"></span>
														<label for="free-shepping1"> 
														{{ __('Private') }}
														</label>
													</div>
												</li>
												<li>
													<div class="radio-design">
														<input type="radio" class="shipping" id="free-shepping2" name="type" value="1"> 
														<span class="checkmark"></span>
														<label for="free-shepping2"> 
														{{ __('Business') }}
														</label>
													</div>
												</li>
											</ul>
										</div>
										<div id="company" class="d-none">
										<div class="form-input">
											<input type="text" class="User Name" name="company_name" placeholder="{{ __('Company Name') }}">
											<i class="fas fa-business-time"></i>
										</div>
	
										<div class="form-input">
											<input type="text" class="User Name" name="cvr_number" placeholder="{{ __('CVR Number') }}">
											<i class="fas fa-percent"></i>
										</div>
									</div>
										<div class="form-input">
											<input type="text" class="User Name" name="first_name" placeholder="{{ __('First Name') }}"
												required="">
											<i class="fas fa-user"></i>
										</div>
	
										<div class="form-input">
											<input type="text" class="User Name" name="last_name" placeholder="{{ __('Last Name') }}"
												required="">
											<i class="fas fa-user-tie"></i>
										</div>

										<div class="form-input">
											<input type="email" class="User Name" name="email" placeholder="{{ __('Your email address') }}"
												required="">
											<i class="fas fa-envelope"></i>
										</div>
	
										<div class="form-input">
											<input type="text" class="User Name" name="phone" placeholder="{{ __('Phone Number') }}"
												required="">
											<i class="fas fa-phone"></i>
										</div>
	
										<div class="form-input">
											<input type="text" class="User Name" name="address" placeholder="{{ __('ADDRESS') }}"
												required="">
											<i class="fas fa-map-marker-alt"></i>
										</div>
	
										<div class="form-input">
											<input type="password" class="Password" name="password" placeholder="{{ __('Password') }}"
												required="">
											<i class="fas fa-key"></i>
										</div>
	
										<div class="form-input">
											<input type="password" class="Password" name="password_confirmation"
												placeholder="{{ __('Confirm Password') }}" required="">
											<i class="fas fa-key"></i>
										</div>
	
										<input id="mprocessdata" type="hidden" value="{{ __('Processing...') }}">
										<button type="submit" class="submit-btn">{{ __('Register') }}</button>
	
									</form>
									</div>
								</div>
							</div>
						</div>
					</div>
			</div>
		</div>
	</div>

	<!-- LOgin Register Form End -->




	<script type="text/javascript">
		var mainurl = "{{url('/')}}";
		var gs = {!!json_encode($gs) !!};
	</script>

	<!-- jquery -->
	<script src="{{ asset('assets/front/js/jquery.js') }}"></script>
	<!-- bootstrap -->
	<script src="{{ asset('assets/front/js/bootstrap.min.js') }}"></script>
	<!-- popper -->
	<script src="{{ asset('assets/front/js/popper.min.js') }}"></script>
	<!-- plugin js-->
	<script src="{{ asset('assets/front/js/plugin.js') }}"></script>
	<!-- notify js-->
	<script src="{{ asset('assets/front/js/notify.js') }}"></script>
	<!-- notify js-->
	<script src="{{ asset('assets/front/js/price-range.js') }}"></script>
	<!-- main -->
	<script src="{{ asset('assets/front/js/main.js') }}"></script>
	<!-- custom -->
	<script src="{{ asset('assets/front/js/custom.js') }}"></script>

	{!! $seo->google_analytics !!}

	@if($gs->is_talkto == 1)
	<!--Start of Tawk.to Script-->
	{!! $gs->talkto !!}
	<!--End of Tawk.to Script-->
	@endif

	@yield('scripts')

</body>



<script type="text/javascript">


if($('.countdown').length > 0)
{
		$('.countdown').each(function(){
		var date = $(this).data('date');
		var countDownDate = new Date(date).getTime();
		var $this = $(this);
		var x = setInterval(function() {

		var denTime = new Date().toLocaleString("en-US", {timeZone: '{{ $gs->time_zone }}'});

		  // Get today's date and time
		  var now = new Date(denTime).getTime();

		  // Find the distance between now and the count down date
		  var distance = countDownDate - now;

		  // Time calculations for days, hours, minutes and seconds
		  var days = Math.floor(distance / (1000 * 60 * 60 * 24));
		  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
		  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
		  var seconds = Math.floor((distance % (1000 * 60)) / 1000);

		  // Display the result in the element with id="demo"
		  var text = days + " {{__('Days')}} " + hours + ":"
		  + minutes + ":" + seconds;
		  $this.html(text);

		  // If the count down is finished, write some text 
		  if (distance < 0) {
			$this.parent().parent().parent().parent().parent().hide();
		    clearInterval(x);
		  var text = 0 + " {{__('Days')}} " + 0 + ":"
		  + 0 + ":" + 0;
		  $this.html(text);
		  }
		}, 1000);
	});
}



$('.shipping').on('change',function(){
	var val = $(this).val();
	if( val == 1) {
		$('#company').removeClass('d-none');
	}
	else{
		$('#company').addClass('d-none');
	}
});


$('.featured_auction_slider').on('changed.owl.carousel', function () {
		 //   debugger;
		var count = $(this).find('.countdown');
		 if(count.length > 0)
{
		$(count).each(function(){
		var date = $(this).data('date');

		var countDownDate = new Date(date).getTime();
		var $this = $(this);
		var x = setInterval(function() {
			var denTime = new Date().toLocaleString("en-US", {timeZone: '{{ $gs->time_zone }}'});

		// Get today's date and time
		var now = new Date(denTime).getTime();

		  // Find the distance between now and the count down date
		  var distance = countDownDate - now;

		  // Time calculations for days, hours, minutes and seconds
		  var days = Math.floor(distance / (1000 * 60 * 60 * 24));
		  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
		  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
		  var seconds = Math.floor((distance % (1000 * 60)) / 1000);

		  // Display the result in the element with id="demo"
		  var text = days + " {{__('Days')}} " + hours + ":"
		  + minutes + ":" + seconds;
		  $this.html(text);

		  // If the count down is finished, write some text 
		  if (distance < 0) {
			$this.parent().parent().parent().parent().parent().parent().hide();
		    clearInterval(x);
		  var text = 0 + " {{__('Days')}} " + 0 + ":"
		  + 0 + ":" + 0;
		  $this.html(text);
		  }
		}, 1000);
	});
}

        });



		$('.latest_auction_slider').on('changed.owl.carousel', function () {
		 //   debugger;
		var count = $(this).find('.countdown');
		 if(count.length > 0)
{
		$(count).each(function(){
		var date = $(this).data('date');
		var countDownDate = new Date(date).getTime();
		var $this = $(this);
		var x = setInterval(function() {
			var denTime = new Date().toLocaleString("en-US", {timeZone: '{{ $gs->time_zone }}'});

			// Get today's date and time
			var now = new Date(denTime).getTime();

		  // Find the distance between now and the count down date
		  var distance = countDownDate - now;

		  // Time calculations for days, hours, minutes and seconds
		  var days = Math.floor(distance / (1000 * 60 * 60 * 24));
		  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
		  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
		  var seconds = Math.floor((distance % (1000 * 60)) / 1000);

		  // Display the result in the element with id="demo"
		  var text = days + " {{__('Days')}} " + hours + ":"
		  + minutes + ":" + seconds;
		  $this.html(text);

		  // If the count down is finished, write some text 
		  if (distance < 0) {

			$this.parent().parent().parent().parent().parent().parent().hide();
		    clearInterval(x);
		  var text = 0 + " {{__('Days')}} " + 0 + ":"
		  + 0 + ":" + 0;
		  $this.html(text);
		  }
		}, 1000);
	});
}

        });

</script>

</html>