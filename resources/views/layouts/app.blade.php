<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <title>Final project</title>
    <link rel="stylesheet" href="/css/app.css">
</head>
    <body>
        @include('inc.navbar')
        @include('inc.messages')
        @yield('content')
    </body>
</html>
