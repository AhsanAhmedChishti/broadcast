<div class="modal fade modal-log-reg" id="log-reg" tabindex="-1" role="dialog" aria-hidden="true">
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
                                {{ __('Login') }}
                            </a>
                            <a class="nav-item nav-link" id="nav-reg-tab" data-toggle="tab" href="#nav-reg" role="tab"
                                aria-controls="nav-reg" aria-selected="false">
                                {{ __('Register') }}
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
                                <form id="mloginform" action="{{ route('user-login-submit') }}" method="POST">
                                    {{ csrf_field() }}
                                    <div class="form-input">
                                        <input type="email" name="email" placeholder="{{ __('Type Email Address') }}"
                                            required="">
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
                                    <button type="submit" class="submit-btn custom-button">{{ __('Login') }}</button>
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
                            <form id="mregisterform" action="{{ route('user-register-submit') }}" method="POST">
                                {{ csrf_field() }}

                                <div class="d-flex mb-3">

                                    <ul class="radio-btn-list">
                                        <li>
                                            <div class="radio-design">
                                                <input type="radio" class="shipping" id="free-shepping1"
                                                    name="type" value="0" checked>
                                                <span class="checkmark"></span>
                                                <label for="free-shepping1">
                                                    {{ __('Private') }}
                                                </label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="radio-design">
                                                <input type="radio" class="shipping" id="free-shepping2"
                                                    name="type" value="1">
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
                                        <input type="text" class="User Name" name="company_name"
                                            placeholder="{{ __('Company Name') }}">
                                        <i class="fas fa-business-time"></i>
                                    </div>

                                    <div class="form-input">
                                        <input type="text" class="User Name" name="cvr_number"
                                            placeholder="{{ __('CVR Number') }}">
                                        <i class="fas fa-percent"></i>
                                    </div>
                                </div>
                                <div class="form-input">
                                    <input type="text" class="User Name" name="first_name"
                                        placeholder="{{ __('First Name') }}" required="">
                                    <i class="fas fa-user"></i>
                                </div>

                                <div class="form-input">
                                    <input type="text" class="User Name" name="last_name"
                                        placeholder="{{ __('Last Name') }}" required="">
                                    <i class="fas fa-user-tie"></i>
                                </div>

                                <div class="form-input">
                                    <input type="email" class="User Name" name="email"
                                        placeholder="{{ __('Your email address') }}" required="">
                                    <i class="fas fa-envelope"></i>
                                </div>

                                <div class="form-input">
                                    <input type="text" class="User Name" name="phone"
                                        placeholder="{{ __('Phone Number') }}" required="">
                                    <i class="fas fa-phone"></i>
                                </div>

                                <div class="form-input">
                                    <input type="text" class="User Name" name="address"
                                        placeholder="{{ __('ADDRESS') }}" required="">
                                    <i class="fas fa-map-marker-alt"></i>
                                </div>

                                <div class="form-input">
                                    <input type="password" class="Password" name="password"
                                        placeholder="{{ __('Password') }}" required="">
                                    <i class="fas fa-key"></i>
                                </div>

                                <div class="form-input">
                                    <input type="password" class="Password" name="password_confirmation"
                                        placeholder="{{ __('Confirm Password') }}" required="">
                                    <i class="fas fa-key"></i>
                                </div>

                                <input id="mprocessdata" type="hidden" value="{{ __('Processing...') }}">
                                <button type="submit" class="submit-btn custom-button">{{ __('Register') }}</button>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
