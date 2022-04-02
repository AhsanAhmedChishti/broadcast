@if (isset($_GET['find']))
    @php
        $query = $_GET['find'];
        $msg = 'No results found';
        $msg .= !empty($query) ? ' for ' . $query . '.' : '.';
    @endphp
    <p class="text-white-50">{{ __($msg) }}</p>
@elseif(!empty($_GET['filtered']))
    <p class="text-white-50">{{ __('No active auctions were found in this category, matching your filter query.') }}
    </p>
@else
    @if (request()->is('live'))
        <p class="text-white-50">{{ __('No live auctions were found.') }}</p>
    @else
        <p class="text-white-50">{{ __('No active auctions were found in this category.') }}</p>
    @endif
@endif
