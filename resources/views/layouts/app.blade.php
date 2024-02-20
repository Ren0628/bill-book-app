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
        
    </head>
    <body>
        <div class="container">
            @yield('content')
        </div>
        <script src="{{ asset('/js/script.js') }}"></script>
    </body>
</html>
