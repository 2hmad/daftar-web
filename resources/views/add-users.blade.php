<html>

<head>
    <title>{{ __('dashboard.dashboard') . ' - ' . __('dashboard.daftar') }}</title>
    @include('dashboard-layouts.links')
</head>
<style>
    input[type='text'],
    input[type='email'],
    input[type='password'] {
        padding: 5px;
        border: 1px solid #CCC;
        border-radius: 3px;
        outline: none;
    }

    .add-users {
        padding: 10px;
        width: 170px;
        background: #0b49a2;
        color: white;
        font-weight: bold;
        border-radius: 5px;
        border: none;
        margin-left: auto;
        margin-right: auto;
        display: block;
        margin-top: 5%;
        outline: none;
    }
</style>
<body>
@include('dashboard-layouts.navbar')
<div class="loading"></div>

<div class="add-users-page" @if (LaravelLocalization::getCurrentLocale() == 'en') dir="ltr" @else dir="rtl" @endif>
    <form method="POST" id="form" action="{{ route('add-users') }}" style="padding: 7px;">
        @csrf
        <div style="display: flex;flex-direction: row;gap: 10px; max-width: 100%;">
            <div style="display: flex;flex-direction: column;width: 100%;">
                <label>
                    {{ __('register.first-name') }}
                    @error('first_name') <span class="error-feedback"
                                               style="color: red">( {!! $message !!} )</span> @enderror
                </label>
                <input type="text" class="input" name="first_name" style="width:100%;max-width: 100%">
            </div>
            <div style="display: flex;flex-direction: column;width: 100%;">
                <label>{{ __('register.last-name') }}
                    @error('last_name') <span class="error-feedback"
                                              style="color: red">( {!! $message !!} )</span> @enderror
                </label>
                <input type="text" class="input" name="last_name" style="width:100%;max-width: 100%">
            </div>
        </div>
        <div style="display: flex;flex-direction: column;gap: 10px;margin-top: 3%;">
            <label>{{ __('register.email') }}
                @error('email') <span class="error-feedback"
                                      style="color: red">( {!! $message !!} )</span> @enderror
            </label>
            <input type="email" class="input" name="email">
        </div>
        <div style="display: flex;flex-direction: column;gap: 10px;margin-top: 3%;">
            <label>{{ __('register.phone') }}
                @error('phone') <span class="error-feedback"
                                      style="color: red">( {!! $message !!} )</span> @enderror
            </label>
            <input type="text" class="input" name="phone">
        </div>
        <div style="display: flex;flex-direction: row;gap: 10px;margin-top: 3%;">
            <div style="display: flex;flex-direction: column;width: 100%;">
                <label>{{ __('register.password') }}
                    @error('password') <span class="error-feedback"
                                             style="color: red">( {!! $message !!} )</span> @enderror
                </label>
                <input type="password" class="input" name="password" style="width:100%;max-width: 100%">
            </div>
            <div style="display: flex;flex-direction: column;width: 100%;">
                <label>{{ __('register.confirm-password') }}
                    @error('confirm_password') <span class="error-feedback"
                                                     style="color: red">( {!! $message !!} )</span> @enderror
                </label>
                <input type="password" class="input" name="confirm_password" style="width:100%;max-width: 100%">
            </div>
        </div>
        <input type="submit" name="add" class="add-users" value="{{ __('dashboard.add-user') }}">
    </form>

    <hr class="dropdown-divider">

    <h4 style="text-align: center;margin-bottom: 5%;font-weight: bold;text-decoration: underline;">{{ __('dashboard.releated-users') }}</h4>
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
                        <a href="{{ url('delete-releated-users', [$item->id]) }}">
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
