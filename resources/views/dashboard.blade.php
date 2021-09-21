<html>
<head>
    <title>{{ __('dashboard.dashboard') . " - " . __('dashboard.daftar') }}</title>
    @include('dashboard-layouts.links')
</head>
<body>
@include('dashboard-layouts.navbar')
<div class="loading"></div>


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
    @foreach($customers as $customer)
        <a href="customer/{{ $customer->id }}">
            <div class="content">
                <div class="circle"
                     style="text-transform: uppercase">{{ mb_substr($customer->customer_name, 0, 1, 'utf-8') }}</div>
                <div class="info" style="display: flex;flex-direction: column;gap: 5px;">
                    <span style="font-weight: bold;">{{ $customer->customer_name }}</span>
                    <span>{{ $customer->created_at }}</span>
                </div>
            </div>
        </a>
    @endforeach
</div>

<button class="add-item" data-bs-toggle="modal" data-bs-target="#addItem"><i class="fal fa-plus"></i></button>
<div class="modal fade" id="addItem" tabindex="-1" aria-labelledby="addItemLabel" aria-hidden="true"
     @if(LaravelLocalization::getCurrentLocale() == "en") dir="ltr"
     @else dir="rtl" @endif>
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addItemLabel">{{ __('dashboard.add-customer') }}</h5>
            </div>
            <form method="POST" action="{{ route('store-customer') }}">
                <div class="modal-body" style="display: flex;flex-direction: column;gap: 15px;">
                    @csrf
                    <label>{{ __('dashboard.customer-name') }} @error('name')
                        <span class="error-feedback" style="color: red">( {!! $message !!} )</span>@enderror</label>
                    <input type="text" name="name" style="padding: 5px;border: 1px solid #CCC;border-radius: 5px;">
                    <label>{{ __('dashboard.customer-phone') }} @error('phone')
                        <span class="error-feedback" style="color: red">( {!! $message !!} )</span>@enderror</label>
                    <input type="text" name="phone" style="padding: 5px;border: 1px solid #CCC;border-radius: 5px;">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary"
                            data-bs-dismiss="modal">{{ __('dashboard.close') }}</button>
                    <button type="submit" name="insert" class="btn btn-primary">{{ __('dashboard.insert') }}</button>
                </div>
            </form>
        </div>
    </div>
</div>

@include('dashboard-layouts.footer')
</body>
@include('dashboard-layouts.scripts')
</html>
