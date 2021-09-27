<html>
<head>
    <title>{{ __('main.title') }}</title>
    @extends('layouts.links')
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
                    <h1>{{ __('register.welcome')}} <span>{{ __('register.daftar') }}</span></h1>
                    <p>{{ __('register.login-p') }}</p>
                    <div class="steps">
                        <a href="/login">
                            <div class="incompleted"></div>
                        </a>
                        <a href="/register">
                            <div class="completed"></div>
                        </a>
                    </div>
                    <form method="POST" action="{{ route('register') }}" role="form">
                        @csrf
                        <div class="form-group has-feedback has-feedback-left" style="display: flex;gap: 20px;">
                            <div>
                                <label class="control-label">{{ __('register.first-name') }} @error('first_name')
                                    <span class="error-feedback" style="color: red">( {!! $message !!} )</span>@enderror
                                </label>
                                <input type="text" name="first_name" class="form-control">
                            </div>
                            <div>
                                <label class="control-label">{{ __('register.last-name') }} @error('last_name')
                                    <span class="error-feedback" style="color: red">( {!! $message !!} )</span>@enderror
                                </label>
                                <input type="text" name="last_name" class="form-control">
                            </div>
                        </div>
                        <div class="form-group has-feedback has-feedback-left">
                            <label class="control-label">{{ __('register.store-name') }} @error('store_name')
                                <span class="error-feedback" style="color: red">( {!! $message !!} )</span>@enderror
                            </label>
                            <input type="text" name="store_name" class="form-control">
                        </div>
                        <div class="form-group has-feedback has-feedback-left">
                            <label class="control-label">{{ __('register.email') }} @error('email')
                                <span class="error-feedback" style="color: red">( {!! $message !!} )</span>@enderror
                            </label>
                            <input type="email" name="email" class="form-control">
                        </div>
                        <div class="form-group has-feedback has-feedback-left">
                            <label class="control-label">{{ __('register.phone') }} @error('phone')
                                <span class="error-feedback" style="color: red">( {!! $message !!} )</span>@enderror
                            </label>
                            <input type="tel" name="phone" class="form-control">
                        </div>
                        <div class="form-group has-feedback has-feedback-left" style="display: flex;gap: 20px;">
                            <div>
                                <label>{{ __('register.password') }} @error('password')
                                    <span class="error-feedback" style="color: red">( {!! $message !!} )</span>@enderror
                                </label>
                                <input type="password" name="password" class="form-control">
                            </div>
                            <div>
                                <label>{{ __('register.confirm-password') }} @error('confirm_password')
                                    <span class="error-feedback" style="color: red">( {!! $message !!} )</span>@enderror
                                </label>
                                <input type="password" name="confirm_password" class="form-control">
                            </div>
                        </div>
                        <div class="forget-remember">
                            <div class="checkbox" @error('agree') style="color: red;" @enderror>
                                <input type="checkbox" name="agree" id="agree">
                                <label for="agree" style="user-select: none;">{{ __('register.agree') }} <a
                                        href="#">{{ __('register.terms') }}</a></label>
                            </div>
                        </div>
                        <div class="login-buttons">
                            <input type="submit" value="{{ __('register.register') }}">
                            <a href="login"><input type="button" name="login" value="{{ __('register.login') }}"></a>
                        </div>
                    </form>

                    @if (Session::has("success"))
                        <div class="alert alert-success" role="alert">
                            {{ __('messages.done-register') }}
                        </div>
                    @endif

                </div>
        </div>

</body>
@extends('layouts.scripts')
</html>
