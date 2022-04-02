@extends('layouts.front') 

@section('content')

@if($ps->slider == 1)

@if(count($sliders))

@include('includes.slider-style')

@endif

@endif


	@if($ps->slider == 1)

	<!-- Hero Area Start -->
	<section class="hero-area">
		@if(count($sliders))
			<div class="hero-area-slider">
					@foreach($sliders as $data)
						<div class="intro-content {{$data->position}}" style="background-image: url({{asset('assets/images/sliders/'.$data->photo)}})">
							<div class="container">
								<div class="row">
									<div class="col-lg-12">
										<div class="slider-content">
											<!-- layer 1 -->
											<div class="layer-1">
												<h4 style="font-size: {{$data->subtitle_size}}px; color: {{$data->subtitle_color}}" class="subtitle subtitle{{$data->id}}" data-animation="animated {{$data->subtitle_anime}}">{{$data->subtitle_text}}</h4>
												<h2 style="font-size: {{$data->title_size}}px; color: {{$data->title_color}}" class="title title{{$data->id}}" data-animation="animated {{$data->title_anime}}">{{$data->title_text}}</h2>
											</div>
											<!-- layer 2 -->
											<div class="layer-2">
												<p style="font-size: {{$data->details_size}}px; color: {{$data->details_color}}"  class="text text{{$data->id}}" data-animation="animated {{$data->details_anime}}">{{$data->details_text}}</p>
											</div>
											<!-- layer 3 -->
											<div class="layer-3">
												<a href="{{$data->link}}" target="_blank" class="mybtn1"><span>{{ __('Explore More') }} <i class="fas fa-chevron-right"></i></span></a>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					@endforeach
			</div>
		@endif
	</section>
	<!-- Hero Area End -->

	@endif





	@if($ps->service == 1)

	<!-- Features Area Start-->
	<section class="features">
		<div class="container">
				<div class="row justify-content-center">
					<div class="col-lg-8 col-md-10">
						<div class="section-heading text-center">
							<div class="title">
									{{ $ps->service_title }}
							</div>
							<p class="text">
								{{ $ps->service_text }}
							</p>
						</div>
					</div>
				</div>
			<div class="row">
				<div class="col-lg-12">
					<div class="feature-area">
						<div class="row">
							@foreach($services as $service)	
							<div class="col-lg-4 col-md-6">
								<a href="{{ $service->link }}" target="_blank" class="single-feature">
									<div class="icon">
										<img src="{{ asset('assets/images/services/'.$service->photo) }}" alt="">
									</div>
									<div class="content">
										<h4 class="title">
											{{ $service->title }}
										</h4>
										<p class="text">
											{!! $service->details !!}
										</p>
										<span class="link">
											<i class="fas fa-angle-double-right"></i>
										</span>
									</div>
								</a>
							</div>
							@endforeach

						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- Features Area End-->

	@endif

	
	@if($ps->featured == 1)

	<!-- Categories Area Start -->
	<section class="categories">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-lg-8 col-md-10">
					<div class="section-heading text-center">
						<div class="title">
								{{$category_section_title_text->category_section_title}}
						</div>
						<p class="text">
								{{$category_section_title_text->category_section_text}}
						</p>
					</div>
				</div>
			</div>
			<div class="row categori-items justify-content-center">

				@foreach ($categories as $category)
					<div class="col-lg-3 col-md-4 col-6">
							<a href="{{route('front.category',$category->slug)}}" class="single-categori">
								<div class="img">
									<img src="{{ asset('assets/images/category/'.$category->image) }}" alt="">
								</div>
								<div class="content">
									<h4 class="title">
										
										{{$category->title}}
									</h4>
									<p class="sub-title">
										{{$category->subtitle}}
									</p>
								</div>
							</a>
						</div>
				@endforeach
			</div>
		</div>
	</section>
<!-- Categories Area End -->

@endif


	@if($ps->small_banner == 1)

	<!-- Featured Auction Area Start -->
	<section class="featured_auction">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-lg-8 col-md-10">
					<div class="section-heading text-center">
						<div class="title">
								{{$auction_title_description->title}}
						</div>
						<p class="text">
							{{$auction_title_description->description}}
						</p>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-12">
					<div class="featured_auction_slider">
						@foreach ($auctions as $auction)
						@if(Carbon\Carbon::parse(Carbon\Carbon::now($gs->time_zone)->format('Y-m-d H:i:s'))->lt(Carbon\Carbon::parse($auction->end_date)))
						<div class="item">
						<a href="{{route('front.details',$auction->slug)}}" class="single-auction">
								<div class="img">
									<img src="{{ asset('assets/images/auction/'.$auction->photo) }}" alt="">
								</div>
								<div class="content">
									
										<div class="price-area">
												<span class="number left">
													@if($gs->currency_format == 0)
													  {{ $gs->currency_sign }}{{ number_format($auction->lowBids(), 2, ',', '.') }}
													@else 
													  {{ number_format($auction->lowBids(), 2, ',', '.') }}{{ $gs->currency_sign }}
													@endif
													<small class="label">{{ __('lowest') }} :</small>
												</span>
												<span class="number right">
													@if($gs->currency_format == 0)
													  {{ $auction->highBids() }}
													@else 
													  {{ $auction->highBids() }}
													@endif
													<small class="label">{{ __('Highest') }} :</small>
												</span>
											</div>
									<h5 class="title">
										{{$auction->title}}
									</h5>
									<ul class="bids-info">
										<li>
											<h6>{{ count($auction->bids) }}</h6>
											<p>{{ __('Bids') }}</p>
										</li>
										<li>
											<h6>{{$auction->conditions}}</h6>
											<p>{{ __('Conditions') }}</p>
										</li>
                                         @if(Carbon\Carbon::now($gs->time_zone)->format('Y-m-d') < Carbon\Carbon::parse($auction->start_date)->format('Y-m-d'))
                                            <li>
                                                <h6 class="countdown" data-date="{{ Carbon\Carbon::parse($auction->start_date)->format('M d,Y H:i:s') }}"></h6>
                                                <p>{{ __('To Start') }}</p>
                                            </li>
                                        @else 
                                            <li>
                                                <h6 class="countdown" data-date="{{ Carbon\Carbon::parse($auction->end_date)->format('M d,Y H:i:s') }}"></h6>
                                                <p>{{ __('Left') }}</p>
                                            </li>                                       
                                        @endif
									</ul>
								</div>
							</a>
						</div>
						@endif
						@endforeach
						
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- Featured Auction Area End -->

@endif


@if($ps->contact_section == 1)

<!-- Submit Address Area Start -->
<div class="submit-address"  style="background: url({{ asset('assets/images/'.$ps->c_background) }});">
	<div class="container">
		<div class="row">
			<div class="col-lg-7 col-md-7">
				<h4 class="title">
					{{ $ps->c_title }}
				</h4>
				<p class="text">
					{{ $ps->c_text }}
				</p>
			</div>
			<div class="col-lg-5 col-md-5 d-flex align-self-center j-end">
				<a href="{{ route('front.contact') }}" class="mybtn1">{{ __('Contact Now') }}</a>
			</div>
		</div>
	</div>
</div>
<!-- Submit Address Area End -->

@endif


@if($ps->latest_auction == 1)

<!-- Featured Auction Area Start -->
<section class="featured_auction">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-lg-8 col-md-10">
				<div class="section-heading text-center">
					<div class="title">
							{{ __('Latest Auctions') }}
					</div>
					<p class="text">
						{{ __('Click and bid.') }}
					</p>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-12">
				<div class="latest_auction_slider">
					@foreach ($lauctions as $auction)
					@if(Carbon\Carbon::parse(Carbon\Carbon::now($gs->time_zone)->format('Y-m-d H:i:s'))->lt(Carbon\Carbon::parse($auction->end_date)))
					<div class="item">
					<a href="{{route('front.details',$auction->slug)}}" class="single-auction">
							<div class="img">
								<img src="{{ asset('assets/images/auction/'.$auction->photo) }}" alt="">
							</div>
							<div class="content">
								
									<div class="price-area">
											<span class="number left">
												@if($gs->currency_format == 0)
												  {{ $gs->currency_sign }}{{ number_format($auction->lowBids(), 2, ',', '.') }}
												@else 
												  {{ number_format($auction->lowBids(), 2, ',', '.') }}{{ $gs->currency_sign }}
												@endif
												<small class="label">{{ __('lowest') }} :</small>
											</span>
											<span class="number right">
												@if($gs->currency_format == 0)
												  {{ $auction->highBids() }}
												@else 
												  {{ $auction->highBids() }}
												@endif
												<small class="label">{{ __('Highest') }} :</small>
											</span>
										</div>
								<h5 class="title">
									{{$auction->title}}
								</h5>
								<ul class="bids-info">
									<li>
										<h6>{{ count($auction->bids) }}</h6>
										<p>{{ __('Bids') }}</p>
									</li>
									<li>
										<h6>{{$auction->conditions}}</h6>
										<p>{{ __('Conditions') }}</p>
									</li>
									 @if(Carbon\Carbon::now($gs->time_zone)->format('Y-m-d') < Carbon\Carbon::parse($auction->start_date)->format('Y-m-d'))
										<li>
											<h6 class="countdown" data-date="{{ Carbon\Carbon::parse($auction->start_date)->format('M d,Y H:i:s') }}"></h6>
											<p>{{ __('To Start') }}</p>
										</li>
									@else 
										<li>
											<h6 class="countdown" data-date="{{ Carbon\Carbon::parse($auction->end_date)->format('M d,Y H:i:s') }}"></h6>
											<p>{{ __('Left') }}</p>
										</li>                                       
									@endif
								</ul>
							</div>
						</a>
					</div>
					@endif
					@endforeach
					
				</div>
			</div>
		</div>
	</div>
</section>
<!-- Featured Auction Area End -->

@endif

@if($ps->top_rated == 1)

<!-- Video Area Start -->
<section class="video-section" style="background: url({{ asset('assets/images/'.$ps->p_background) }});">
	<div class="container">
		<div class="row justify-content-between">
			<div class="col-lg-6 align-self-center">
				<div class="section-heading color-white text-left ">
					<h2 class="title">
						{{ $ps->p_subtitle }}
					</h2>
					<p class="text">{{ $ps->p_title }}</p>
				</div>
			</div>
			<div class="col-lg-6">
				<div class="video-box">
					<img src="{{ asset('assets/images/'.$ps->video_image) }}" alt="">
					<div class="play-icon">
						<a href="{{ $ps->p_text }}" class="video-play-btn mfp-iframe">
							<i class="fas fa-play"></i>
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- Video Area End -->

@endif


@if($ps->review_blog == 1)

<!-- Blog Area Start -->
<section class="blog">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-lg-7 col-md-10">
				<div class="section-heading">
					<h5 class="sub-title">
						{{ $ps->blog_subtitle }}
					</h5>
					<h2 class="title">
						{{ $ps->blog_title }}
					</h2>
					<p class="text">
						{{ $ps->blog_text }} 
					</p>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-12">
				<div class="blog-slider">

				@foreach($lblogs as $blog)

				<a href="{{ route('front.blogshow',$blog->id) }}" class="single-blog">
					<div class="img">
						<img src="{{ asset('assets/images/blogs/'.$blog->photo) }}" alt="">
					</div>
					<div class="content">
						<h4 class="title">
							{{ $blog->title }}
						</h4>
						<ul class="top-meta">
							<li>
								<span>
										<i class="far fa-calendar"></i> {{  date('d M, Y',strtotime($blog->created_at)) }}
								</span>
							</li>
							<li>
								<span>
										<i class="far fa-eye"></i> {{ $blog->views }}
								</span>
							</li>
						</ul>
						<div class="text">
							<p>
								{{substr(strip_tags($blog->details),0,120)}}
							</p>
						</div>
						<span class="link">{{ __('Read More') }} <i class="fas fa-chevron-right"></i></span>
					</div>
				</a>

				@endforeach
											
				</div>
			</div>
		</div>
	</div>
</section>
<!-- Blog Area End -->

@endif



	@if($ps->pricing_plan == 1)



	@endif

		@if($ps->hot_sale == 1)

		<!-- Testimonial Area Start -->
		<section class="testimonial">
			<div class="container">
					<div class="row justify-content-center">
						<div class="col-lg-8 col-md-10">
							<div class="section-heading text-center">
								<div class="title">
									{{ $ps->review_title }}
								</div>
								<p class="text">
									{{ $ps->review_text }}
								</p>
							</div>
						</div>
					</div>
				<div class="row justify-content-center">
					<div class="col-lg-12">
						<div class="testimonial-slider">
							@foreach($reviews as $review)
							<div class="item">
								<div class="single-testimonial">
									<div class="review-text">
										<div class="content">
												<p>{{ $review->details }}</p>
													<img src="assets/images/quot.png" alt="">
										</div>
									</div>
									<div class="people">
										<div class="img">
												<img src="{{ asset('assets/images/reviews/'.$review->photo) }}" alt="">
										</div>
										<div class="content">
											<h4 class="title">{{ $review->title }}</h4>
											<p class="designation">{{  $review->subtitle }}</p>
										</div>
									</div>
								</div>
							</div>
							@endforeach
	
	
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- Testimonial Area End -->
	
		@endif

@endsection