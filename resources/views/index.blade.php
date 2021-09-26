<html>

<head>
    <title>{{ __('main.title') }}</title>
    @include('layouts.links')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullPage.js/3.1.2/fullpage.min.css"
        integrity="sha512-4rPgyv5iG0PZw8E+oRdfN/Gq+yilzt9rQ8Yci2jJ15rAyBmF0HBE4wFjBkoB72cxBeg63uobaj1UcNt/scV93w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        #heading-primary-main {
            line-height: 2em;
            font-size: 39px;
            font-weight: bold;
        }

        .google-play:hover,
        .apple-store:hover {
            transform: scale(1.1);
            transition: 0.5s
        }

    </style>
</head>

<body @if (LaravelLocalization::getCurrentLocale() == 'en') dir="ltr" @else dir="rtl" @endif>
    @include('layouts.navbar')

    <section id="fullpage">
        <div class="section" style="padding: 15px;display: flex;">
            <div style="padding: 15px;max-width: 465px;">
                <h1 id="heading-primary-main" class="animate__animated @if (LaravelLocalization::getCurrentLocale() == 'en') animate__fadeInLeft @else animate__fadeInRight @endif">
                    {{ __('main.daftar-desc') }}
                </h1>
                <p style="font-size: 20px;" class="animate__animated @if (LaravelLocalization::getCurrentLocale() == 'en') animate__fadeInLeft @else animate__fadeInRight @endif">
                    {{ __('main.daftar-p') }}
                </p>
                <div style="display: flex;gap:20px" class="animate__animated @if (LaravelLocalization::getCurrentLocale() == 'en') animate__fadeInLeft @else animate__fadeInRight @endif">
                    <a href="#" class="google-play">
                        <img src="@if (LaravelLocalization::getCurrentLocale() == 'en') {{ asset('pics/google play.png') }} @else {{ asset('pics/جوجل بلاي.png') }} @endif" style="max-width: 185px;">
                    </a>
                    <a href="#" class="apple-store">
                        <img src="@if (LaravelLocalization::getCurrentLocale() == 'en') {{ asset('pics/apple store.png') }} @else {{ asset('pics/ابل ستور.png') }} @endif" style="max-width: 185px;">
                    </a>
                </div>
            </div>
            <div>
            </div>
        </div>
        <div class="section">

        </div>
    </section>

</body>
@include('layouts.scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/fullPage.js/3.1.2/vendors/scrolloverflow.min.js"
integrity="sha512-pYyQWhzi2lV+RM4GmaUA56VPL48oLVvsHmP9tuQ8MaZMDHomVEDjXXnfSVKXayy+wLclKPte0KbsuVoFImtE7w=="
crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fullPage.js/3.1.2/fullpage.min.js"
integrity="sha512-gSf3NCgs6wWEdztl1e6vUqtRP884ONnCNzCpomdoQ0xXsk06lrxJsR7jX5yM/qAGkPGsps+4bLV5IEjhOZX+gg=="
crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    new fullpage('#fullpage', {
        autoScrolling: true,
        scrollHorizontally: true
    });
    fullpage_api.setAllowScrolling(true);
</script>

</html>
