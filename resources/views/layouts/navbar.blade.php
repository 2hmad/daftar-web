<nav class="navbar navbar-expand-lg navbar-light bg-light" style="background-color: transparent !important;">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Daftar</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav" style="justify-content: flex-end;">
            <ul class="navbar-nav">
                <li class="nav-item">
                    @if (Session::has('email'))
                        <a class="nav-link" href="dashboard">
                            <button><img src="{{ asset('pics/user.png') }}"></button>
                        </a>
                    @else
                        <a class="nav-link" href="login">
                            <button class="nav-login">{{ __('main.Sign in') }}</button>
                        </a>
                    @endif
                </li>
                <li class="nav-item">
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
