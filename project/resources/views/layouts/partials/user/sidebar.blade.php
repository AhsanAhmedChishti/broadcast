<div class="col-sm-10 col-md-7 col-lg-4">
    <div class="dashboard-widget mb-30 mb-lg-0">
        <div class="user">
            <div class="thumb-area">
                <div class="thumb">
                    <img src="{{ Auth::user()->photo? asset('assets/images/users/' . Auth::user()->photo): asset('assets/images/noimage.png') }}"
                        alt="user">
                </div>
                <a href="{{ route('user.myprofile') }}">
                    <label for="profile-pic" class="profile-pic-edit"><i class="flaticon-pencil"></i></label>
                </a>
                {{-- <input type="file" id="profile-pic" class="d-none"> --}}
            </div>
            <div class="content">
                <h5 class="title"><a href="#0">{{ Str::ucfirst(Auth::user()->first_name) }}
                        {{ Str::ucfirst(Auth::user()->last_name) }}</a></h5>
                <span class="username"><a href="http://pixner.net/cdn-cgi/l/email-protection"
                        class="__cf_email__"
                        data-cfemail="771d181f1937101a161e1b5914181a">{{ Auth::user()->email }}</a></span>
            </div>
        </div>
        <ul class="dashboard-menu" id="accordion">
            <li>
                <a href="{{ route('user.dashboard') }}"
                    class="{{ request()->routeIs('user.dashboard') ? 'active' : '' }}"><i
                        class="flaticon-dashboard"></i>{{ __('Dashboard') }}</a>
            </li>
            <li>
                <a href="{{ route('user.myprofile') }}"
                    class="{{ request()->routeIs('user.myprofile') ? 'active' : '' }}"><i
                        class="flaticon-user"></i>{{ __('My Profile') }}</a>
            </li>
            <li>
                <a href="{{ route('user-order-index') }}"
                    class="{{ request()->routeIs('user-order-index') || request()->routeIs('user-order-show') ? 'active' : '' }}"><i
                        class="flaticon-settings"></i>{{ __('My Payments') }}</a>
            </li>
            <li>
                <a href="javascript:;" data-toggle="collapse" data-target="#auction"><i
                        class="flaticon-auction"></i>{{ __('Auctions') }}</a>
                <ul class="collapse list-unstyled {{ request()->is('user/auction') || request()->is('user/auction/*') ? 'show' : '' }}"
                    id="auction" data-parent="#accordion">
                    <li>
                        <a class="{{ request()->routeIs('user-auction-index') ? 'active' : '' }}"
                            href="{{ route('user-auction-index') }}"> {{ __('All Auctions List') }}</a>
                    </li>

                    <li>
                        <a class="{{ request()->routeIs('user-auction-create') ? 'active' : '' }}"
                            href="{{ route('user-auction-create') }}">{{ __('Create Auction') }}</a>
                    </li>

                    <li>
                        <a class="{{ request()->routeIs('user-auction-pending') ? 'active' : '' }}"
                            href="{{ route('user-auction-pending') }}"> {{ __('Pending Auctions') }}</a>
                    </li>

                </ul>
            </li>
            <li>
                <a class="{{ request()->routeIs('user-bid-index') ? 'active' : '' }}" href="
                    {{ route('user-bid-index') }}"><i class="flaticon-best-seller"></i>{{ __('My Bids') }}</a>
            </li>
            <li>
                <a class="{{ request()->routeIs('user-wt-index') ? 'active' : '' }}"
                    href="{{ route('user-wt-index') }}"><i class="flaticon-alarm"></i>{{ __('Withdrawals') }}</a>
            </li>
            <li>
                <a href="{{ route('user-notf-show', Auth::user()->id) }}"><i
                        class="flaticon-alarm"></i>{{ __('My Alerts') }}
                    <span id="usr-notf-count">
                        {{-- {{ App\Models\UserNotification::countNotification(Auth::user()->id) }} --}}
                    </span></a>
            </li>
        </ul>
    </div>
</div>
