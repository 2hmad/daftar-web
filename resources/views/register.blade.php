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
                    <form method="post" role="form">
                        <div class="form-group has-feedback has-feedback-left" style="display: flex;gap: 20px;">
                            <div>
                                <label class="control-label">{{ __('register.first-name') }}</label>
                                <input type="text" name="first-name" class="form-control">
                            </div>
                            <div>
                                <label class="control-label">{{ __('register.last-name') }}</label>
                                <input type="text" name="last-name" class="form-control">
                            </div>
                        </div>
                        <div class="form-group has-feedback has-feedback-left">
                            <label class="control-label">{{ __('register.email') }}</label>
                            <input type="email" name="email" class="form-control">
                        </div>
                        <div class="form-group has-feedback has-feedback-left">
                            <label class="control-label">{{ __('register.phone') }}</label>
                            <input type="tel" name="phone" class="form-control">
                        </div>
                        <div class="form-group has-feedback has-feedback-left" style="display: flex;gap: 20px;">
                            <div>
                                <label>{{ __('register.password') }}</label>
                                <input type="password" name="password" class="form-control">
                            </div>
                            <div>
                                <label>{{ __('register.confirm-password') }}</label>
                                <input type="password" name="conf-password" class="form-control">
                            </div>
                        </div>
                        <div class="forget-remember">
                            <div class="checkbox">
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
                </div>
        </div>

</body>
@extends('layouts.scripts')
</html>
