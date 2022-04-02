{{-- ============ Client Section Starts Here ============ --}}
@if (isset($reviews) && $reviews->count())
    <section class="client-section padding-top padding-bottom">
        <div class="container">
            <div class="section-header">
                <h2 class="title">{{ __($ps->review_title) }}</h2>
                <p>{{ __($ps->review_text) }}</p>
            </div>
            <div class="m--15">
                <div class="client-slider owl-theme owl-carousel">
                    @foreach ($reviews as $review)
                        <div class="client-item">
                            <div class="client-content">
                                <p>{{ __($review->details) }}</p>
                            </div>
                            <div class="client-author">
                                <div class="thumb">
                                    <a href="#0">
                                        <img src="{{ asset('assets/images/reviews/' . $review->photo) }}"
                                            alt="{{ __($review->title) }}">
                                    </a>
                                </div>
                                <div class="content">
                                    <h6 class="title"><a href="#0">{{ __($review->title) }}</a></h6>
                                    <div class="ratings">
                                        <span><i class="fas fa-star"></i></span>
                                        <span><i class="fas fa-star"></i></span>
                                        <span><i class="fas fa-star"></i></span>
                                        <span><i class="fas fa-star"></i></span>
                                        <span><i class="fas fa-star"></i></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
@endif
{{-- ============ Client Section Ends Here ============ --}}
