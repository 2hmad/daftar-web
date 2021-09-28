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
            style="font-size: 17px;font-weight: 500;text-transform: capitalize;color: #19202c;">{{ __('main.balances') }}</span>
        <span style="color: green;font-size: 22px;" @if(LaravelLocalization::getCurrentLocale() == "en") dir="ltr"
              @else dir="rtl" @endif>
            {{ DB::table('customers_data')->where('user_email', '=', Session::get('email'))->where('customer_id', '=', request()->route('id'))->where('type', '=', 'got')->sum('amount') - DB::table('customers_data')->where('user_email', '=', Session::get('email'))->where('customer_id', '=', request()->route('id'))->where('type', '=', 'gave')->sum('amount') }}
            {{ __('dashboard.egp') }}</span>
    </div>
    <div style="display: flex;flex-direction: row;gap: 15px;">
        <a href="tel:{{ DB::table('customers')->where('id', '=', request()->route('id'))->value('customer_phone') }}">
            <button class="phone"><i class="far fa-phone"></i></button>
        </a>
        <a href="sms:{{ DB::table('customers')->where('id', '=', request()->route('id'))->value('customer_phone') }}">
            <button class="message"><i class="far fa-envelope"></i></button>
        </a>
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
                <form method="POST" action="{{ route('store-customer-data') }}" enctype="multipart/form-data">
                    <div class="modal-body" style="display: flex;flex-direction: column;gap: 15px;">
                        @csrf
                        <div>
                            <span class="input-euro left" style="color: red">
                            <input type="number" name="amount" value="0.00" min="0.50" step='0.01' onwheel="this.blur()"
                                   style="max-width: 100%;padding: 5px;border: none;outline: none;color: green;font-weight: bold;font-size: 28px;text-align: center;">
                            </span>
                        </div>
                        <input name="customer_id" value="{{ request()->route('id') }}" hidden>
                        <input name="type" value="got" hidden>
                        <input type="text" name="name"
                               style="padding: 5px;border: 1px solid #CCC;border-radius: 5px;outline: none"
                               placeholder="{{ __('dashboard.title') }}">
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
                <form method="POST" action="{{ route('store-customer-data') }}" enctype="multipart/form-data">
                    <div class="modal-body" style="display: flex;flex-direction: column;gap: 15px;">
                        @csrf
                        <div>
                            <span class="input-euro left" style="color: red">
                            <input type="number" name="amount" value="0.00" min="0.50" step='0.01' onwheel="this.blur()"
                                   style="max-width: 100%;padding: 5px;border: none;outline: none;color: green;font-weight: bold;font-size: 28px;text-align: center;">
                            </span>
                        </div>
                        <input name="customer_id" value="{{ request()->route('id') }}" hidden>
                        <input name="type" value="gave" hidden>
                        <input type="text" name="name"
                               style="padding: 5px;border: 1px solid #CCC;border-radius: 5px;outline: none"
                               placeholder="{{ __('dashboard.title') }}">
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
    @foreach($gots as $got)
        <div class="content" style="justify-content: space-between;">
            <div class="info" style="display: flex;flex-direction: row;gap: 5px;align-items: center;">
                <div class="circle"
                     style="text-transform: uppercase;background: #a6daff;font-size: 25px;color: #0093ff;">
                    @if($got->type == "got")
                        <i class="far fa-level-up"></i>
                    @else
                        <i class="far fa-level-down-alt"></i>
                    @endif
                </div>
                <div style="display: flex;flex-direction: column;">
                    <span style="font-weight: bold;">{{ $got -> name }}</span>
                    <span>{{ $got->date }}</span>
                </div>
            </div>
            <div><img src="{{ asset($got->pic) }}" style="max-width: 80px;"></div>
            <div style="display: flex;flex-direction: column;align-items: center;">
                <span
                    style="@if($got->type == "got") color:green; @else color:red; @endif font-weight: bold;font-size: 19px;">{{ $got -> amount }} {{ __('dashboard.egp') }}</span>
                <span>{{ __('dashboard.i-'.$got->type) }}</span>
            </div>
        </div>
    @endforeach
</div>


@include('dashboard-layouts.footer')
</body>
@include('dashboard-layouts.scripts')
</html>
