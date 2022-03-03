<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Ajax Crud</title>

        <link rel="stylesheet" href="{{ mix('/css/app.css') }}">
    </head>
    <body class="font-sans">
        <header class="flex justify-between items-center py-2 px-6 shadow-lg">
            <img src="./assets/logo.svg">
            <a class="py-3 px-4 font-bold leading-none bg-orange hover:bg-orange/90 text-white rounded-lg" href="https://www.linkedin.com/in/robbert-de-vries-252a4a170/" target="_blank">LinkedIn</a>
        </header>
        @yield('content')
        <script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
        <script src="{{ mix('/js/app.js') }}"></script>
        <script src="{{ mix('/js/ajax.js') }}"></script>
    </body>
</html>
