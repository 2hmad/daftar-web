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
                    <h1 style="text-align: center">{{ __('login.reset')}} <span>{{ __('login.password') }}</span></h1>
                    <form method="post" action="{{ route('change-password', ['email' => $email, 'token' => $token]) }}">
                        @csrf
                        <div style="width: 500px;max-width: 90%;margin-left: auto;margin-right: auto;">
                            <input type="password" name="password" class="form-control"
                                   placeholder="{{ __('login.password') }}">
                        </div>
                        <div style="width: 500px;max-width: 90%;margin-left: auto;margin-right: auto;">
                            <input type="password" name="confirm_password" class="form-control"
                                   placeholder="{{ __('register.confirm-password') }}">
                        </div>
                        <div class="login-buttons" style="margin-top: 2%;margin-left: auto;margin-right: auto;">
                            <input type="submit" name="reset" value="{{ __('dashboard.save-changes') }}">
                        </div>
                    </form>
                    @if($errors->any())
                        @foreach($errors->all() as $error)
                            <div class="alert alert-danger">
                                {!! $error !!}
                            </div>
                        @endforeach
                    @endif
                </div>
        </div>
</div>
</body>
@extends('layouts.scripts')
</html>
