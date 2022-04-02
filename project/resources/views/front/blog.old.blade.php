@extends('layouts.front')
@section('content')

    <!-- Breadcrumb Area Start -->
    <div class="breadcrumb-area"
        style="background: url({{ $gs->breadcumb_banner ? asset('assets/images/' . $gs->breadcumb_banner) : asset('assets/images/noimage.png') }});">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="pagetitle">
                        {{ __('Blog') }}
                    </h1>

                    <ul class="pages">
                        @if (isset($bcat))

                            <li>
                                <a href="{{ route('front.index') }}">
                                    {{ __('Home') }}
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('front.blog') }}">
                                    {{ __('Blog') }}
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('front.blogcategory', $bcat->slug) }}">
                                    {{ $bcat->name }}
                                </a>
                            </li>

                        @elseif(isset($slug))

                            <li>
                                <a href="{{ route('front.index') }}">
                                    {{ __('Home') }}
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('front.blog') }}">
                                    {{ __('Blog') }}
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('front.blogtags', $slug) }}">
                                    {{ __('Tag') }} : {{ $slug }}
                                </a>
                            </li>

                        @elseif(isset($search))

                            <li>
                                <a href="{{ route('front.index') }}">
                                    {{ __('Home') }}
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('front.blog') }}">
                                    {{ __('Blog') }}
                                </a>
                            </li>
                            <li>
                                <a href="Javascript:;">
                                    {{ __('Search') }}
                                </a>
                            </li>
                            <li>
                                <a href="Javascript:;">
                                    {{ $search }}
                                </a>
                            </li>

                        @elseif(isset($date))


                            <li>
                                <a href="{{ route('front.index') }}">
                                    {{ __('Home') }}
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('front.blog') }}">
                                    {{ __('Blog') }}
                                </a>
                            </li>
                            <li>
                                <a href="Javascript:;">
                                    {{ __('Archive') }}: {{ date('F Y', strtotime($date)) }}
                                </a>
                            </li>

                        @else

                            <li>
                                <a href="{{ route('front.index') }}">
                                    {{ __('Home') }}
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('front.blog') }}">
                                    {{ __('Blog') }}
                                </a>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Area End -->

    <!-- Blog Area Start -->
    <section class="blog blog-page" id="blog">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">


                    @forelse($blogs as $blogg)

                        <div class="blog-box">
                            <div class="blog-images">
                                <div class="img">
                                    <img src="{{ $blogg->photo ? asset('assets/images/blogs/' . $blogg->photo) : asset('assets/images/noimage.png') }}"
                                        class="img-fluid" alt="">
                                </div>
                                <div class="date d-flex justify-content-center">
                                    <div class="box align-self-center">
                                        <p>{{ date('d', strtotime($blogg->created_at)) }}</p>
                                        <p>{{ date('M', strtotime($blogg->created_at)) }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="details">

                                <a href='{{ route('front.blogshow', $blogg->id) }}'>
                                    <h4 class="blog-title">
                                        {{ strlen($blogg->title) > 200 ? substr($blogg->title, 0, 200) . '...' : $blogg->title }}
                                    </h4>
                                </a>

                                <ul class="post-meta">
                                    <li>
                                        <a href="javascript:;">
                                            <i class="fas fa-calendar"></i>
                                            {{ date('d M, Y', strtotime($blogg->created_at)) }}
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:;">
                                            <i class="fas fa-eye"></i>
                                            {{ $blogg->views }} {{ __('Views') }}
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:;">
                                            <i class="fas fa-comments"></i>
                                            {{ __('Source') }} : {{ $blogg->source }}
                                        </a>
                                    </li>
                                </ul>


                                <p class="blog-text">
                                    {{ substr(strip_tags($blogg->details), 0, 350) }}
                                </p>
                            </div>
                        </div>

                    @empty

                        <div class="page-center">
                            <h3 class="text-center"> {{ __('No Blog Found') }}</h3>
                        </div>

                    @endforelse

                    <div class="page-center">
                        @if (isset($_GET['search']))
                            {!! $blogs->appends(['search' => $_GET['search']])->links() !!}
                        @else
                            {!! $blogs->links() !!}
                        @endif
                    </div>

                </div>
                <div class="col-lg-4">
                    <div class="blog-aside">

                        {{-- Search Section --}}

                        <div class="serch-widget">
                            <h4 class="title">
                                {{ __('Search') }}
                            </h4>
                            <form action="{{ route('front.blogsearch') }}">
                                <input type="text" name="search" placeholder=" {{ __('Search Here') }}" required=""
                                    value="{{ isset($search) ? $search : '' }}">
                                <button class="submit" type="submit"> {{ __('Search') }}</button>
                            </form>
                        </div>

                        {{-- Category Section --}}

                        <div class="categori">
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

                        <div class="recent-post-widget">
                            <h4 class="title">{{ __('Recent Post') }}</h4>
                            <span class="separator"></span>
                            <ul class="post-list">

                                @foreach (App\Models\Blog::orderBy('created_at', 'desc')->limit(4)->get()
        as $blog)
                                    <li>
                                        <div class="post">
                                            <div class="post-img">
                                                <img style="width: 73px; height: 59px;"
                                                    src="{{ asset('assets/images/blogs/' . $blog->photo) }}" alt="">
                                            </div>
                                            <div class="post-details">
                                                <a href="{{ route('front.blogshow', $blog->id) }}">
                                                    <h4 class="post-title">
                                                        {{ strlen($blog->title) > 45 ? substr($blog->title, 0, 45) . ' ..' : $blog->title }}
                                                    </h4>
                                                </a>
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

                        <div class="categori">
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

                        <div class="tags">
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

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Blog Area End-->

@endsection
