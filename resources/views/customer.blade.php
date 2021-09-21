<html>
<head>
    <title>{{ __('dashboard.dashboard') . " - " . __('dashboard.daftar') }}</title>
    @include('dashboard-layouts.links')
    <style>
        .input-euro:before {
            position: absolute;
            top: -14px;
            font-weight: bold;
            font-size: 20px;
            color: green;
            content: "{{ __('dashboard.egp') }}";
        }
    </style>
</head>
<body>
@include('dashboard-layouts.navbar')

<div class="got-gave-profile" style="@if(LaravelLocalization::getCurrentLocale() == "en") direction:ltr
@else direction:rtl @endif">
    <div>
        <span
            style="font-size: 17px;font-weight: 500;text-transform: capitalize;color: #19202c;">{{ __('main.balances') }} ( {{ __('dashboard.i-gave') }} )</span>
        <span style="color: green;font-size: 22px;" @if(LaravelLocalization::getCurrentLocale() == "en") dir="ltr"
              @else dir="rtl" @endif>0 {{ __('dashboard.egp') }}</span>
    </div>
    <div style="display: flex;flex-direction: row;gap: 15px;">
        <button class="phone"><i class="far fa-phone"></i></button>
        <button class="message"><i class="far fa-envelope"></i></button>
        <button class="export-pdf"><i class="far fa-file-pdf"></i></button>
    </div>
</div>
<div class="buttons-group-customer">

    <button class="add-got" data-bs-toggle="modal" data-bs-target="#addGot">{{ __('dashboard.i-got') }}</button>
    <div class="modal fade" id="addGot" tabindex="-1" aria-labelledby="addGotLabel" aria-hidden="true"
         @if(LaravelLocalization::getCurrentLocale() == "en") dir="ltr"
         @else dir="rtl" @endif>
        <div class="modal-dialog">
            <div class="modal-content">
                <form method="POST" action="{{ route('store-customer') }}">
                    <div class="modal-body" style="display: flex;flex-direction: column;gap: 15px;">
                        @csrf
                        <div>
                            <span class="input-euro left">
                            <input type="number" name="name" value="0.00" min="0.50" step='0.01' onwheel="this.blur()"
                                   style="max-width: 100%;padding: 5px;border: none;outline: none;color: green;font-weight: bold;font-size: 28px;text-align: center;">
                            </span>
                        </div>
                        <input type="date" name="date"
                               style="padding: 5px;border: 1px solid #CCC;border-radius: 5px;outline: none"
                               value="{{ date('Y-m-d') }}">
                        <textarea name="details" placeholder="{{ __('dashboard.add-details') }}"
                                  style="padding: 5px;border: 1px solid #CCC;border-radius: 5px;outline: none;height: 135px;"></textarea>

                        <label for="file-upload" class="custom-file-upload">
                            <i class="fa fa-cloud-upload"></i> {{ __('dashboard.upload-image') }}
                        </label>
                        <input type="file" name="file-upload" id="file-upload" style="display:none;">

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary"
                                data-bs-dismiss="modal">{{ __('dashboard.close') }}</button>
                        <button type="submit" name="insert"
                                class="btn btn-primary">{{ __('dashboard.insert') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <button class="add-gave" data-bs-toggle="modal" data-bs-target="#addGave">{{ __('dashboard.i-gave') }}</button>
    <div class="modal fade" id="addGave" tabindex="-1" aria-labelledby="addGaveLabel" aria-hidden="true"
         @if(LaravelLocalization::getCurrentLocale() == "en") dir="ltr"
         @else dir="rtl" @endif>
        <div class="modal-dialog">
            <div class="modal-content">
                <form method="POST" action="{{ route('store-customer') }}">
                    <div class="modal-body" style="display: flex;flex-direction: column;gap: 15px;">
                        @csrf
                        <div>
                            <span class="input-euro left">
                            <input type="number" name="name" value="0.00" min="0.50" step='0.01' onwheel="this.blur()"
                                   style="max-width: 100%;padding: 5px;border: none;outline: none;color: green;font-weight: bold;font-size: 28px;text-align: center;">
                            </span>
                        </div>
                        <input type="date" name="date"
                               style="padding: 5px;border: 1px solid #CCC;border-radius: 5px;outline: none"
                               value="{{ date('Y-m-d') }}">
                        <textarea name="details" placeholder="{{ __('dashboard.add-details') }}"
                                  style="padding: 5px;border: 1px solid #CCC;border-radius: 5px;outline: none;height: 135px;"></textarea>

                        <label for="file-upload" class="custom-file-upload">
                            <i class="fa fa-cloud-upload"></i> {{ __('dashboard.upload-image') }}
                        </label>
                        <input type="file" name="file-upload" id="file-upload" style="display:none;">

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary"
                                data-bs-dismiss="modal">{{ __('dashboard.close') }}</button>
                        <button type="submit" name="insert"
                                class="btn btn-primary">{{ __('dashboard.insert') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>

<div class="table-container" @if(LaravelLocalization::getCurrentLocale() == "en") dir="ltr" @else dir="rtl" @endif>
    <div class="content">
        <div class="circle" style="text-transform: uppercase;background: #a6daff"></div>
        <div class="info" style="display: flex;flex-direction: column;gap: 5px;">
            <span style="font-weight: bold;"></span>
            <span></span>
        </div>
    </div>
</div>


@include('dashboard-layouts.footer')
</body>
@include('dashboard-layouts.scripts')
</html>
