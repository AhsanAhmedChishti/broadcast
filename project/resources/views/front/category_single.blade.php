@extends('layouts.front')

@section('content')

  <!-- Breadcrumb Area Start -->
  <div class="breadcrumb-area" style="background: url({{ $gs->breadcumb_banner ? asset('assets/images/'.$gs->breadcumb_banner):asset('assets/images/noimage.png') }});">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <h1 class="pagetitle">
            {{ $langg->lang5 }}
          </h1>

          <ul class="pages">
                
              <li>
                <a href="{{ route('front.index') }}">
                  {{ $langg->lang2 }}
                </a>
              </li>
              <li>
                <a href="{{ route('front.faq') }}">
                  {{ $langg->lang5 }}
                </a>
              </li>

          </ul>
        </div>
      </div>
    </div>
  </div>
  <!-- Breadcrumb Area End -->

	<!-- Categori Area Start -->
	<section class="categori-page">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-8">
                        <div class="left-area">
                            <div class="filter-result-area">
                            <div class="header-area">
                                <h4 class="title">
                                    {{__('Filter Results By')}}
                                </h4>
                            </div>
                            <div class="body-area">
                                <form action="#">
                                    <div class="price-range-block">
                                            <div id="slider-range" class="price-filter-range" name="rangeInput"></div>
                                            <div class="livecount">
                                                <input type="number" min=0 max="9900" oninput="validity.valid||(value='0');" id="min_price" class="price-range-field" /> 
                                                <span>To</span>
                                                <input type="number" min=0 max="10000" oninput="validity.valid||(value='10000');" id="max_price" class="price-range-field" />
                                            </div>
                                        </div>
                                        
                                        <button class="filter-btn" type="submit">{{__('Search')}}</button>
                                </form>
                            </div>
                            </div>
                            <div class="all-categories-area">
                                        <div class="header-area">
                                            <h4 class="title">
                                            {{$category->title}} {{__('Category')}}
                                            </h4>
                                        </div>
                                        <div class="body-area">
                                            <div class="accordion" id="accordionExample">
                                                <div class="card">
                                                
                                                    <div class="card-header" id="headingOne">
                                                        <h4 class="button collapsed" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                                <i class="icofont-thin-double-right"></i>{{$category->title}}
                                                        </h4>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                            </div>
                            <div class="latest_auction_area">
                                <div class="header-area">
                                    <h4 class="title">
                                            {{__('Latest Auction')}}
                                    </h4>
                                </div>
                                <div class="body-area">
                                    <ul class="filter-list">

                                        @foreach ($latestAuctions as $latestAuction)
                                            <li>
                                                <div class="content">
                                                    <div class="left mr-1">
                                                        <img src="{{ asset('assets/images/auction/'.$latestAuction->photo) }}" alt="">
                                                    </div>
                                                    <div class="right">
                                                        <p class="price">${{$latestAuction->start_bid}}</p>
                                                        <p class="title">{{$latestAuction->title}}</p>
                                                    </div>
                                                </div>
                                            </li>
                                        @endforeach
                                        
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-9 order-first order-lg-last">
                        <div class="row">
                            @foreach ($category->auctions as $auction)
                            <div class="col-lg-6 col-md-6">
                                    <a href="{{route('front.details',$auction->slug)}}" class="single-auction">
                                        <div class="img">
                                            <img src="{{ asset('assets/images/auction/'.$auction->photo) }}" alt="">
                                        </div>
                                        <div class="content">
                                            
                                                <div class="price-area">
                                                        <span class="number left">
                                                                ${{$auction->start_bid}}
                                                                
                                                            <small class="label">{{__('lowest')}} :</small>
                                                        </span>
                                                        <span class="number right">
                                                                $24000
                                                                
                                                            <small class="label">{{__('Higest')}} :</small>
                                                        </span>
                                                    </div>
                                            <h5 class="title">
                                                {{__('title')}}
                                            </h5>
                                            <ul class="bids-info">
                                                <li>
                                                    <h6>10</h6>
                                                    <p>{{__('Bids')}}</p>
                                                </li>
                                                <li>
                                                    <h6>New</h6>
                                                    <p>{{$auction->conditions}}</p>
                                                </li>
                                                <li>
                                                    <h6>{{$auction->time_left}}</h6>
                                                    <p>{{__('Days Left')}}</p>
                                                </li>
                                            </ul>
                                        </div>
                                    </a>
                                </div>
                            @endforeach
                            
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--  Categori Area End -->




@endsection

@section('scripts')



@endsection