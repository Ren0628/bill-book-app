<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="content-langage" content="ja">
        <link rel="shortcut icon" href="{{ asset('/favicon.ico') }}">
        <title>@yield('title')</title>

        <!-- Fonts -->
        <script src="https://kit.fontawesome.com/3443c666dc.js" crossorigin="anonymous"></script>

        <!-- Styles -->
        @vite(['resources/sass/app.scss', 'resources/js/app.js'])
        <link rel="stylesheet" href="{{ asset('/css/style.css') }}">
    </head>
    <body>
        @yield('content')
    </body>
</html>
