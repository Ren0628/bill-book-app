<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="content-langage" content="ja">

        <title>Laravel</title>

        <!-- Fonts -->
        

        <!-- Styles -->
        @vite(['resources/sass/app.scss', 'resources/js/app.js'])
        <link rel="stylesheet" href="{{ asset('/css/style.css') }}">
    </head>
    <body>
        @yield('content')
    </body>
</html>
