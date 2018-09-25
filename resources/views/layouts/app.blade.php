<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <title>Final project</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="{{ 'js/app.js' }}"></script>
    <link rel="stylesheet" href= {{ asset("/datetimepicker/jquery.datetimepicker.css") }} >
    <script src={{ asset("/datetimepicker/jquery.datetimepicker.full.js") }}></script>
</head>
    <body>
        @include('inc.navbar')
        @include('inc.messages')
        @yield('content')
    </body>
</html>
