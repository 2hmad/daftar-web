<footer>
    <div class="footer-dashboard">
        <ul>
            <a href="/dashboard" @if(Request::path() === "en/dashboard" || Request::path() === "ar/dashboard") class="current" @endif>
                <li>
                    <div>
                        @if(Request::path() === "en/dashboard" || Request::path() === "ar/dashboard")
                            <i class="fas fa-user-chart"></i>
                        @else
                            <i class="fal fa-user-chart"></i>
                        @endif
                        <label>{{ __('dashboard.clients') }}</label>
                    </div>
                </li>
            </a>
            <a href="/suppliers" @if(Request::path() === "en/suppliers" || Request::path() === "ar/suppliers") class="current" @endif>
                <li>
                    <div>
                        @if(Request::path() === "en/suppliers" || Request::path() === "ar/suppliers")
                            <i class="fas fa-parachute-box"></i>
                        @else
                            <i class="fal fa-parachute-box"></i>
                        @endif
                        <label>{{ __('dashboard.suppliers') }}</label>
                    </div>
                </li>
            </a>
            <a href="#">
                <li>
                    <div>
                        <i class="fal fa-cog"></i>
                        <label>{{ __('dashboard.settings') }}</label>
                    </div>
                </li>
            </a>
        </ul>
    </div>
</footer>
