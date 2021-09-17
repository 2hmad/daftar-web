<footer>
    <div class="footer-dashboard">
        <ul>
            <a href="#" class="current">
                <li>
                    <div>
                        @if(Request::path() === "en/dashboard")
                            <i class="fas fa-user-chart"></i>
                        @else
                            <i class="fal fa-user-chart"></i>
                        @endif
                        <label>{{ __('dashboard.clients') }}</label>
                    </div>
                </li>
            </a>
            <a href="#">
                <li>
                    <div>
                        @if(Request::path() === "en/dashboard/suppliers")
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
