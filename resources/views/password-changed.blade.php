<html>
<head>
    <title>{{ __('main.title') }}</title>
    @include('layouts.links')
</head>
<body style="background: #f5f5f5">
@include('layouts.navbar')

<div class="container-login">
    @if(LaravelLocalization::getCurrentLocale() == "en")
        <div style="direction: ltr;margin-top: 3%;padding: 10px">
            @else
                <div style="direction: rtl;margin-top: 3%;padding: 10px">
                    @endif
                    <img src="{{ asset('pics/password-changed.png') }}"
                         style="max-width: 200px;margin-left: auto;margin-right: auto;display: block;">
                    <span
                        style="margin-top: 4%;text-align: center;display: block;font-size: 35px;font-weight: bold;color: #2f294f;">{{ __('messages.password-changed') }} !</span>
                    <a href="login" style="text-decoration: none">
                        <button
                            style="width: 200px;padding: 10px;background: #2865ea;color: white;font-weight: bold;border: 1px solid #2865ea;outline: none;border-radius: 5px;margin-left: auto;margin-right: auto;display:block;margin-top: 3%;margin-bottom: 5%;">
                            {{ __('login.login') }}
                        </button>
                    </a>
                </div>
        </div>
</div>
</body>
@extends('layouts.scripts')
</html>
