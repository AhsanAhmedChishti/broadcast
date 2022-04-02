@extends('layouts.front')

@section('content')

    {{-- ============ Hero Section Starts Here ============ --}}
    <div class="hero-section style-2">
        <div class="container">
            <ul class="breadcrumb">
                <li>
                    <a href="{{ route('front.index') }}">{{ __('Home') }}</a>
                </li>
                <li>
                    <span>Blog</span>
                </li>
            </ul>
        </div>
        <div class="bg_img hero-bg bottom_center"
            data-background="{{ asset('assets/front-new/images/banner/hero-bg.png') }}"></div>
    </div>
    {{-- ============ Hero Section Ends Here ============ --}}


    {{-- ============ Blog Section Starts Here ============ --}}
    <section class="blog-section padding-bottom mt--240 mt-lg--440 pos-rel">
        <div class="container">
            <div class="section-header cl-white mw-100 left-style">
                <h2 class="title">{{ __('Blog') }}</h2>
            </div>
            <div class="row mb--50">
                <div class="col-lg-8 mb-50">
                    <div class="faq-wrapper">
                        @forelse ($blogs as $item)
                            <div class="post-item">
                                <div class="image">
                                    <div>
                                        <a href='{{ route('front.blogshow', $item->id) }}'>
                                            <img src="{{ $item->photo ? asset('assets/images/blogs/' . $item->photo) : asset('assets/images/noimage.png') }}"
                                                class="img-fluid" alt="{{ __($item->title) }}">
                                        </a>
                                    </div>
                                    {{-- <div class="date d-flex justify-content-center">
                                        <div class="box align-self-center">
                                            <p>{{ date('d', strtotime($item->created_at)) }}</p>
                                            <p>{{ date('M', strtotime($item->created_at)) }}</p>
                                        </div>
                                    </div> --}}
                                </div>
                                <div class="content">

                                    <h4 class="title">
                                        <a href='{{ route('front.blogshow', $item->id) }}'>
                                            {{ strlen($item->title) > 200 ? substr($item->title, 0, 200) . '...' : $item->title }}
                                        </a>
                                    </h4>

                                    <ul class="meta">
                                        <li>
                                            <a href="javascript:;">
                                                <i class="fas fa-calendar"></i>
                                                {{ date('d M, Y', strtotime($item->created_at)) }}
                                            </a>
                                        </li>
                                        <li>
                                            <a href="javascript:;">
                                                <i class="fas fa-eye"></i>
                                                {{ $item->views }} {{ __('Views') }}
                                            </a>
                                        </li>
                                        <li>
                                            <a href="javascript:;">
                                                <i class="fas fa-comments"></i>
                                                {{ __('Source') }} : {{ $item->source }}
                                            </a>
                                        </li>
                                    </ul>

                                    <p class="excerpt">
                                        {{ substr(strip_tags($item->details), 0, 350) }}
                                    </p>
                                </div>
                            </div>
                        @empty

                            <p class="text-white-50">{{ __('No posts found.') }}</p>

                        @endforelse

                        @if (isset($_GET['search']))
                            {!! $blogs->appends(['search' => $_GET['search']])->links('front.pagination') !!}
                        @else
                            {!! $blogs->links('front.pagination') !!}
                        @endif
                    </div>
                </div>
                <div class="col-lg-4 mb-50">
                    <aside class="sticky-menu">

                        {{-- Search Section --}}
                        <div class="widget search">
                            <h4 class="title">
                                {{ __('Search') }}
                            </h4>
                            <form action="{{ route('front.blogsearch') }}">
                                <input type="text" name="search" placeholder=" {{ __('Search Here') }}" required=""
                                    value="{{ isset($search) ? $search : '' }}">
                                <button class="custom-button" type="submit"> {{ __('Search') }}</button>
                            </form>
                        </div>

                        {{-- Category Section --}}
                        <div class="widget">
                            <h4 class="title">{{ __('Categories') }}</h4>
                            <ul class="categori-list">
                                @foreach ($bcats as $cat)
                                    <li>
                                        <a class="{{ isset($bcat) ? ($bcat->id == $cat->id ? 'active' : '') : '' }}"
                                            href="{{ route('front.blogcategory', $cat->slug) }}">
                                            <span>{{ $cat->name }}</span>
                                            <span>({{ $cat->blogs()->count() }})</span>
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>

                        {{-- Recent Post Section --}}
                        <div class="widget recent-posts">
                            <h4 class="title">{{ __('Recent Post') }}</h4>
                            <span class="separator"></span>
                            <ul class="post-list">

                                @foreach (App\Models\Blog::orderBy('created_at', 'desc')->limit(4)->get()
        as $blog)
                                    <li>
                                        <div class="post">
                                            <div class="post-img">
                                                <a href="{{ route('front.blogshow', $blog->id) }}">
                                                    <img style="width: 73px; height: 59px;"
                                                        src="{{ asset('assets/images/blogs/' . $blog->photo) }}" alt="">
                                                </a>
                                            </div>
                                            <div class="post-details">
                                                <h4 class="post-title">
                                                    <a href="{{ route('front.blogshow', $blog->id) }}">
                                                        {{ strlen($blog->title) > 45 ? substr($blog->title, 0, 45) . ' ..' : $blog->title }}
                                                    </a>
                                                </h4>
                                                <p class="date">
                                                    {{ date('M d - Y', strtotime($blog->created_at)) }}
                                                </p>
                                            </div>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>

                        {{-- Archive Section --}}
                        <div class="widget">
                            <h4 class="title">{{ __('Archives') }}</h4>
                            <ul class="categori-list">
                                @foreach ($archives as $key => $archive)
                                    <li>
                                        <a class="{{ isset($date) ? (date('F Y', strtotime($date)) == $key ? 'active' : '') : '' }}"
                                            href="{{ route('front.blogarchive', $key) }}">
                                            <span>{{ $key }}</span>
                                            <span>({{ count($archive) }})</span>
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>

                        {{-- Tag Section --}}
                        <div class="widget tags">
                            <h4 class="title">{{ __('Tags') }}</h4>
                            <span class="separator"></span>
                            <ul class="tags-list">
                                @foreach ($tags as $tag)
                                    @if (!empty($tag))
                                        <li>
                                            <a class="{{ isset($slug) ? ($slug == $tag ? 'active' : '') : '' }}"
                                                href="{{ route('front.blogtags', $tag) }}">{{ $tag }} </a>
                                        </li>
                                    @endif
                                @endforeach
                            </ul>
                        </div>
                    </aside>
                </div>
            </div>
        </div>
    </section>
    {{-- ============ Blog Section Ends Here ============ --}}

@endsection
