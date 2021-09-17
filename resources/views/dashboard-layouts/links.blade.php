<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
@if(LaravelLocalization::getCurrentLocale() == "en")
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Montserrat', sans-serif !important;
        }
    </style>
@else
    <link href="https://fonts.googleapis.com/css2?family=Almarai:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Almarai', sans-serif !important;
        }
    </style>
@endif
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet"
      integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
<link rel="stylesheet" href="{{ asset('sass/main.css') }}">
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
