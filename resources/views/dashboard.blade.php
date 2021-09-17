<html>
<head>
    <title>{{ __('dashboard.dashboard') . " - " . __('dashboard.daftar') }}</title>
    @include('dashboard-layouts.links')
</head>
<body>
@include('dashboard-layouts.navbar')

<div class="got-gave" style="direction: rtl">
    <div>
        <span>{{ __('dashboard.i-got') }}</span>
        <span style="color: green" @if(LaravelLocalization::getCurrentLocale() == "en") dir="ltr" @else dir="rtl" @endif>5000 {{ __('dashboard.egp') }}</span>
    </div>
    <div>
        <span>{{ __('dashboard.i-gave') }}</span>
        <span style="color: red" @if(LaravelLocalization::getCurrentLocale() == "en") dir="ltr"
              @else dir="rtl" @endif>0 {{ __('dashboard.egp') }}</span>
    </div>
</div>
<div class="buttons-group">
    <button class="debt">{{ __('dashboard.debt-collection') }}</button>
    <button class="export">{{ __('dashboard.export-invoice') }}</button>
</div>

<div class="table-container" @if(LaravelLocalization::getCurrentLocale() == "en") dir="ltr" @else dir="rtl" @endif>
    <div class="group-search">
        <form method="post">
            <input type="text" name="search" placeholder="{{ __('dashboard.search') }}" autocomplete="off">
        </form>
        <button class="export-pdf"><i class="far fa-file-pdf"></i></button>
    </div>
    <a href="#">
        <div class="content">
            <div class="circle">أ</div>
            <div class="info" style="display: flex;flex-direction: column;gap: 5px;">
                <span style="font-weight: bold;">احمد محمد ابراهيم</span>
                <span>16-09-2021</span>
            </div>
            <div style="display: flex;flex-direction: column;align-items: center;margin-right: auto;">
                <span style="color: green;font-weight: bold;">500 {{ __('dashboard.egp') }}</span>
                <span style="color: #1a202c">{{ __('dashboard.i-got') }}</span>
            </div>
        </div>
    </a>
</div>

@include('dashboard-layouts.footer')
</body>
@include('dashboard-layouts.scripts')
</html>
