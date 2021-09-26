<html>
<head>
    <title>{{ __('dashboard.dashboard') . " - " . __('dashboard.daftar') }}</title>
    @include('dashboard-layouts.links')
</head>
<body>
@include('dashboard-layouts.navbar')
<div class="loading"></div>

<div class="settings" @if(LaravelLocalization::getCurrentLocale() == "en") dir="ltr" @else dir="rtl" @endif>
    <a href="my-info">
        <div class="option">
            <div style="display: flex;align-items: center;gap: 20px;">
                <i class="far fa-store"></i>
                <span>{{ __('dashboard.my-information') }}</span>
            </div>
            <div>
                <i class="far @if(LaravelLocalization::getCurrentLocale() == "en") fa-chevron-right @else fa-chevron-left @endif"></i>
            </div>
        </div>
    </a>
    <a href="#">
        <div class="option">
            <div style="display: flex;align-items: center;gap: 20px;">
                <i class="far fa-address-card"></i>
                <span>{{ __('dashboard.business-card') }}</span>
            </div>
            <div>
                <i class="far @if(LaravelLocalization::getCurrentLocale() == "en") fa-chevron-right @else fa-chevron-left @endif"></i>
            </div>
        </div>
    </a>
    <a href="{{ url('add-users') }}">
        <div class="option">
            <div style="display: flex;align-items: center;gap: 20px;">
                <i class="far fa-user-plus"></i>
                <span>{{ __('dashboard.add-users') }}</span>
            </div>
            <div>
                <i class="far @if(LaravelLocalization::getCurrentLocale() == "en") fa-chevron-right @else fa-chevron-left @endif"></i>
            </div>
        </div>
    </a>
    <a @if(LaravelLocalization::getCurrentLocale() == "en") href="{{ LaravelLocalization::getLocalizedURL('ar') }}"
       @else href="{{ LaravelLocalization::getLocalizedURL('en') }}" @endif>
        <div class="option">
            <div style="display: flex;align-items: center;gap: 20px;">
                <i class="far fa-language"></i>
                <span>@if(LaravelLocalization::getCurrentLocale() == "en") اللغة العربية @else English @endif</span>
            </div>
        </div>
    </a>
    <a href="{{ route('logout') }}">
        <div class="option">
            <div style="display: flex;align-items: center;gap: 20px;">
                <i class="far fa-sign-out"></i>
                <span>{{ __('dashboard.logout') }}</span>
            </div>
        </div>
    </a>
</div>

@include('dashboard-layouts.footer')
</body>
@include('dashboard-layouts.scripts')
</html>
