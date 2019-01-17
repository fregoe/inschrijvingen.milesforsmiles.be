<!doctype html>

<html lang="nl">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <title>Inschrijvingen Miles For Smiles 2019</title>

        <base href="/" />

        <meta name="description" content="Inschrijvingen Miles For Smiles 2019">
        <meta name="author" content="Miles For Smiles">
        <meta name="csrf-token" content="{{ csrf_token() }}" />

        <link rel="stylesheet" href="{{ mix('css/main.css') }}">

    </head>

    <body>
        {{--<div class="container mb-2">
            <div class="row">
                <div class="col-4 text-center mt-3 pt-2  d-none d-lg-block">
                    <h1><a href="{{ route('index') }}">Inschrijven</a></h1>
                </div>
                <div class="col-4 text-center mt-3  d-none d-lg-block">
                    <img src="images/logo.svg">
                </div>
                <div class="col-4 text-center mt-3 pt-2  d-none d-lg-block">
                    <h1><a href="{{ route('mijn-account.index') }}">Teams</a></h1>
                </div>
                <div class="col-6 text-center d-lg-none mt-2">
                    <img src="images/logo.svg">
                </div>
                <div class="col-6 text-center d-lg-none mt-2">
                    <div class="row">
                        <div class="col-12">
                            <h1><a href="{{ route('index') }}">Inschrijven</a></h1>
                        </div>
                        <div class="col-12">
                            <h1><a href="{{ route('mijn-account.index') }}">Teams</a></h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>--}}
        <div class="container">
            <div class="row">
                <div class="col-12 text-center mt-3 mb-3">
                    <a href="https://www.milesforsmiles.be" target="_blank"><img src="images/logo.svg"></a>
                </div>
            </div>
        </div>
        <div class="container container-milesforsmiles">
            <div class="row mt-0 mb-3">
                <div class="col-6 text-center pt-2 {{  Route::is('index') ? 'step-active':'step-not-active' }}">
                    <h1><a href="{{ route('index') }}">@lang('front.menu.subscription')</a></h1>
                </div>
                {{--<div class="col-4 text-center pt-2 {{  Route::is('login') ? 'step-active':'step-not-active' }}">
                    <h1><a href="{{ route('login') }}">@lang('front.menu.logon')</a></h1>
                </div>--}}
                <div class="col-6 text-center pt-2 {{ Route::is('*mijn-account*') || Route::is('login') ? 'step-active':'step-not-active' }}">
                    <h1><a href="{{ route('mijn-account.teams') }}">@lang('front.menu.teams')</a></h1>
                </div>
            </div>

            @yield('content')
        </div>
        <div class="container">
            <div class="row">
                <div class="col small-text text-center mt-2">
                    &copy;{{ \Carbon\Carbon::now()->format('Y') }} Miles for Smiles - <a href="mailto:info@milesforsmiles.be">info@milesforsmiles.be</a> - made by <a href="http://www.gocos.be" target="_blank">GoCoS</a>
                </div>
            </div>
        </div>

        <script src="/js/jquery-3.3.1.min.js"></script>
        <script src="/js/main.js"></script>
        @yield('extrajs')
    </body>
</html>
