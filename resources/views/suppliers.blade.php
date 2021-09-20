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
    <button class="export"
            style="border-radius: 50px;width: 300px;max-width: 100%;">{{ __('dashboard.export-invoice') }}</button>
</div>

<div class="table-container" @if(LaravelLocalization::getCurrentLocale() == "en") dir="ltr" @else dir="rtl" @endif>
    <div class="group-search">
        <form method="post">
            <input type="text" name="search" placeholder="{{ __('dashboard.search') }}" autocomplete="off">
        </form>
        <button class="export-pdf"><i class="far fa-file-pdf"></i></button>
    </div>
    @foreach($suppliers as $supplier)
        <a href="supplier/{{ $supplier->id }}">
            <div class="content">
                <div class="circle"
                     style="text-transform: uppercase">{{ mb_substr($supplier->supplier_name, 0, 1, 'utf-8') }}</div>
                <div class="info" style="display: flex;flex-direction: column;gap: 5px;">
                    <span style="font-weight: bold;">{{ $supplier->supplier_name }}</span>
                    <span>{{ $supplier->created_at }}</span>
                </div>
                <div
                    style="display: flex;flex-direction: column;align-items: center;@if(LaravelLocalization::getCurrentLocale() == "en") margin-left @else margin-right @endif: auto;">
                    <span style="color: green;font-weight: bold;">500 {{ __('dashboard.egp') }}</span>
                    <span style="color: #1a202c">{{ __('dashboard.i-got') }}</span>
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
                <h5 class="modal-title" id="addItemLabel">{{ __('dashboard.add-supplier') }}</h5>
            </div>
            <form method="POST" action="{{ route('store-supplier') }}">
                <div class="modal-body" style="display: flex;flex-direction: column;gap: 15px;">
                    @csrf
                    <label>{{ __('dashboard.supplier-name') }} @error('name')
                        <span class="error-feedback" style="color: red">( {!! $message !!} )</span>@enderror</label>
                    <input type="text" name="name" style="padding: 5px;border: 1px solid #CCC;border-radius: 5px;">
                    <label>{{ __('dashboard.supplier-phone') }} @error('phone')
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
