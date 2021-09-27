<html>

<head>
    <title>{{ __('dashboard.dashboard') . ' - ' . __('dashboard.daftar') }}</title>
    @include('dashboard-layouts.links')
</head>

<body>
@include('dashboard-layouts.navbar')
<div class="loading"></div>

<div class="add-users-page" @if (LaravelLocalization::getCurrentLocale() == 'en') dir="ltr" @else dir="rtl" @endif>
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
    <h4 style="text-align: center;margin-top: 5%;margin-bottom: 5%;font-weight: bold;text-decoration: underline;">{{ __('dashboard.releated-users') }}</h4>
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
            <tr>
                <th scope="col">{{ __('register.name') }}</th>
                <th scope="col">{{ __('register.email') }}</th>
                <th scope="col">{{ __('register.phone') }}</th>
                <th scope="col"></th>
            </tr>
            </thead>
            <tbody>
            @foreach($table as $item)
                <tr>
                    <td>{{ $item->first_name }} {{ $item->last_name }}</td>
                    <td>{{ $item->email }}</td>
                    <td>{{ $item->phone }}</td>
                    <td>
                        <a href="/delete-releated-users/{{ $item->id }}">
                            <button class="delete-releated-user btn btn-danger">{{ __('dashboard.delete') }}</button>
                        </a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>

@include('dashboard-layouts.footer')
</body>
@include('dashboard-layouts.scripts')
</html>
