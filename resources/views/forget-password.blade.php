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
                    <form method="post" action="{{ route('send-message-forget') }}">
                        @csrf
                        <div style="width: 500px;max-width: 90%;margin-left: auto;margin-right: auto;">
                            <input type="email" name="email" class="form-control" placeholder="{{ __('login.email') }}">
                        </div>
                        <div class="login-buttons" style="margin-top: 2%;margin-left: auto;margin-right: auto;">
                            <input type="submit" name="login" value="{{ __('login.reset') }}">
                        </div>
                    </form>
                    @if($errors->any())
                        <div class="alert alert-danger">
                            @foreach($errors->all() as $error)
                                {!! $error !!}
                            @endforeach
                        </div>
                    @endif
                    @if (Session::has('success'))
                        <div class="alert alert-success">
                            {!! Session::get('success') !!}
                        </div>
                    @elseif(Session::has('error'))
                        <div class="alert alert-danger">
                            {!! \Session::get('error') !!}
                        </div>
                    @endif
                </div>
        </div>
</body>
@extends('layouts.scripts')
</html>
