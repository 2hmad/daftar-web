<html>

<head>
    <title>{{ __('dashboard.dashboard') . ' - ' . __('dashboard.daftar') }}</title>
    @include('dashboard-layouts.links')
    <style>
        form input[type="text"] {
            padding: 5px;
            border: 1px solid #CCC;
            border-radius: 5px;
            outline: none;
        }

        form input[type="submit"] {
            margin-top: 5%;
            margin-right: auto;
            margin-left: auto;
            display: block;
            padding: 12px;
            background: #0a58ca;
            color: white;
            font-weight: bold;
            border: none;
            border-radius: 5px;
            outline: none;
        }

        .hide {
            display: none !important;
        }

    </style>
</head>

<body>
    @include('dashboard-layouts.navbar')
    <div class="loading"></div>

    <div class="settings" @if (LaravelLocalization::getCurrentLocale() == 'en') dir="ltr" @else dir="rtl" @endif>
        <form method="POST" id="form" action="{{ route('update.my-info') }}">
            @csrf
            <div style="display: flex;flex-direction: row;gap: 10px;">
                <div style="display: flex;flex-direction: column;width: 100%;">
                    <label>{{ __('register.first-name') }}</label>
                    <input type="text" class="input" name="first_name" value="{{ $data->first_name }}">
                </div>
                <div style="display: flex;flex-direction: column;width: 100%;">
                    <label>{{ __('register.last-name') }}</label>
                    <input type="text" class="input" name="last_name" value="{{ $data->last_name }}">
                </div>
            </div>
            <div style="display: flex;flex-direction: column;gap: 10px;margin-top: 3%;">
                <label>{{ __('register.phone') }}</label>
                <input type="text" class="input" name="phone" value="{{ $data->phone }}">
            </div>
            <input type="submit" name="save-changes" class="save hide" value="{{ __('dashboard.save-changes') }}">
        </form>
    </div>

    @include('dashboard-layouts.footer')
</body>
@include('dashboard-layouts.scripts')
<script>
    document.querySelectorAll('.input').forEach(inp => {
        const initValue = inp.value;
        inp.addEventListener("keyup", function() {
            if (initValue === inp.value) {
                document.querySelector(".save").classList.add("hide");
            } else {
                document.querySelector(".save").classList.remove("hide");
            }


        });
    })
</script>

</html>
