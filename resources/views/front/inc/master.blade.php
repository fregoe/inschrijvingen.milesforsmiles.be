<!doctype html>

<html lang="nl">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <title>Inschrijvingen Miles For Smiles 2019</title>

        <base href="" />

        <meta name="description" content="Inschrijvingen Miles For Smiles 2019">
        <meta name="author" content="Miles For Smiles">
        <meta name="csrf-token" content="{{ csrf_token() }}" />

        <link rel="stylesheet" href="{{ mix('css/main.css') }}">
        <div class="container mt-3">
            @yield('content')
        </div>

    </head>

    <body>
        <script src="/js/jquery-3.3.1.min.js"></script>
        <script src="/js/main.js"></script>
        @yield('extrajs')
    </body>
</html>
