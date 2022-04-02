{{-- Header --}}
@include('layouts.partials.front.header')

{{-- Cart Sidebar --}}
@include('layouts.partials.front.cart-sidebar')

{{-- Main Content --}}
@yield('content')

{{-- Registration and Login Forms --}}
{{-- @include('layouts.partials.front.auth') --}}

{{-- Footer --}}
@include('layouts.partials.front.footer')
