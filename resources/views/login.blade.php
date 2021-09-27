<html>
<head>
    <title>{{ __('main.title') }}</title>
    @include('layouts.links')
</head>
<body style="background: #f5f5f5">
@include('layouts.navbar')

<div class="container-login">
    <div class="container-pic"></div>
    @if(LaravelLocalization::getCurrentLocale() == "en")
        <div style="direction: ltr;margin-top: 3%;padding: 10px">
            @else
                <div style="direction: rtl;margin-top: 3%;padding: 10px">
                    @endif
                    <h1>{{ __('login.welcome')}} <span>{{ __('login.daftar') }}</span></h1>
                    <p>{{ __('login.login-p') }}</p>
                    <div class="steps">
                        <a href="/login">
                            <div class="completed"></div>
                        </a>
                        <a href="/register">
                            <div class="incompleted"></div>
                        </a>
                    </div>
                    <form method="post" action="{{ route('login') }}" role="form">
                        @csrf
                        <div class="form-group has-feedback has-feedback-left">
                            <label class="control-label">{{ __('login.email') }} @if(Session::has('fail-email'))
                                    <span class="error-feedback"
                                          style="font-size: 13px">( {{ Session::get('fail-email') }} )</span>
                                @endif
                            </label>
                            <input type="email" name="email" class="form-control">
                        </div>
                        <div class="form-group has-feedback has-feedback-left">
                            <label>{{ __('login.password') }} @if(Session::has('fail-password'))
                                    <span class="error-feedback"
                                          style="font-size: 13px">( {{ Session::get('fail-password') }} )</span>
                                @endif</label>
                            <input type="password" name="password" class="form-control">
                        </div>
                        <div class="forget-remember">
                            <div class="checkbox"><input type="checkbox" name="remember" id="remember"><label
                                    for="remember" style="user-select: none;">{{ __('login.remember_me') }}</label>
                            </div>
                            <a href="{{ url('forget-password') }}"
                               class="forget-password"><span>{{ __('login.forget-password') }}</span></a>
                        </div>
                        <div class="login-buttons">
                            <input type="submit" name="login" value="{{ __('login.login') }}">
                            <a href="register"><input type="button" value="{{ __('login.register') }}"></a>
                        </div>
                    </form>
                </div>
        </div>
</body>
@extends('layouts.scripts')
</html>
