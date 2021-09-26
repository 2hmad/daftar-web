<nav class="navbar navbar-expand-lg navbar-light bg-light" @if (LaravelLocalization::getCurrentLocale() == 'en') dir="ltr" @else dir="rtl" @endif style="z-index:99;background-color: transparent !important;">
    <div class="container-fluid">
        <a class="navbar-brand" href="/">Daftar</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav" style="justify-content: flex-end;">
            <ul class="navbar-nav">
                <li class="nav-item">
                    @if (Session::has('email'))
                        <a class="nav-link" href="dashboard">
                            <button style="border: none;background: transparent;outline:none" title="{{ __('main.dashboard') }}">
                                <img src="{{ asset('pics/user.png') }}" style="width: 50px;height: 50px;border-radius: 50%;object-fit: contain;border: 1px solid #CCC;">
                            </button>
                        </a>
                    @else
                        <a class="nav-link" href="login">
                            <button class="nav-login">{{ __('main.Sign in') }}</button>
                        </a>
                    @endif
                </li>
                <li class="nav-item" style="font-weight: bold;font-size: 17px;">
                    @if (LaravelLocalization::getCurrentLocale() == 'en')
                        <a class="nav-link" href="{{ LaravelLocalization::getLocalizedURL('ar') }}">العربية</a>
                    @else
                        <a class="nav-link" href="{{ LaravelLocalization::getLocalizedURL('en') }}">English</a>
                    @endif
                </li>
            </ul>
        </div>
    </div>
</nav>
