@if ($paginator->hasPages())
    <nav role="navigation">
        <ul class="pagination">
            {{-- Previous Button --}}
            @if ($paginator->onFirstPage())
                <li> <a disabled><i class="flaticon-left-arrow"></i></a></li>
            @else
                <li><a href="{{ $paginator->previousPageUrl() }}" rel="prev"><i class="flaticon-left-arrow"></i></a>
                </li>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <li><span class="pagination-dots"><span>{{ $element }}</span></span></li>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li><a class="active">{{ $page }}</a></li>
                        @else
                            <li><a href="{{ $url }}">{{ $page }}</a></li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Button --}}
            @if ($paginator->hasMorePages())
                <li> <a href="{{ $paginator->nextPageUrl() }}" rel="next"><i class="flaticon-right-arrow"></i></a></li>
            @else
                <li> <a disabled><i class="flaticon-right-arrow"></i></a></li>
            @endif
        </ul>
    </nav>
@endif
