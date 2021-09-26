<html>

<head>
    <title>{{ __('dashboard.dashboard') . ' - ' . __('dashboard.daftar') }}</title>
    @include('dashboard-layouts.links')
</head>

<body>
    @include('dashboard-layouts.navbar')
    <div class="loading"></div>

    <div class="settings" @if (LaravelLocalization::getCurrentLocale() == 'en') dir="ltr" @else dir="rtl" @endif>
        <form method="POST" id="form" action="{{ route('add-users') }}">
            @csrf
            <div style="display: flex;flex-direction: row;gap: 10px;">
                <div style="display: flex;flex-direction: column;width: 100%;">
                    <label>{{ __('register.first-name') }}</label>
                    <input type="text" class="input" name="first_name">
                </div>
                <div style="display: flex;flex-direction: column;width: 100%;">
                    <label>{{ __('register.last-name') }}</label>
                    <input type="text" class="input" name="last_name">
                </div>
            </div>
            <div style="display: flex;flex-direction: column;gap: 10px;margin-top: 3%;">
                <label>{{ __('register.phone') }}</label>
                <input type="text" class="input" name="phone">
            </div>
            <input type="submit" name="save-changes" class="save hide" value="{{ __('dashboard.save-changes') }}">
        </form>
    </div>

    @include('dashboard-layouts.footer')
</body>
@include('dashboard-layouts.scripts')
</html>
