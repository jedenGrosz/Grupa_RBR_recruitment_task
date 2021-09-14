<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="{{ asset('js/app.js') }}" defer></script>
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <title>@yield('title')</title>
    </head>
    <body>
        <div class="d-flex justify-content-center">
            <a href="{{ route('posts.index') }}" type="button" class="m-2 btn btn-outline-success">Posts</a>
            <a href="{{ route('statistics') }}" type="button" class="m-2 btn btn-outline-success">Statistics</a>
        </div>
        <div class="container">
            @yield('content')
        </div>
    </body>
</html>
