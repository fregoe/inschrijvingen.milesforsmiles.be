@extends('front.inc.master')

@section('content')
    <div class="row mt-5">
        <div class="col-12">
            <p class="text-center"><strong>Wachtwoord opnieuw instellen</strong></p>
            <form method="post" action="{{ route('password.reset.submit') }}">
                <input type="hidden" name="token" value="{{ $_GET['token'] }}">
                @csrf
                <div class="row">
                    <div class="col-lg-3 col-1"></div>
                    <div class="col-lg-6 col-10 login text-center">
                        @if ($errors->any())
                            <div class="error">
                                <p>Er is iets verkeerd gelopen:</p>
                                @foreach ($errors->all() as $error)
                                    <p>{{ $error }}</p>
                                @endforeach
                            </div>
                        @endif
                        <input class="form-control mb-2 input-text" name="email" placeholder="E-mailadres">
                        <input class="form-control mb-2 input-text" type="password" name="password" placeholder="Wachtwoord">
                        <input class="form-control mb-2 input-text" type="password" name="password_confirmation" placeholder="Bevestig wachtwoord">
                        <button type="submit" class="btn btn-primary btn-block btn-submit">Pas aan</button>
                    </div>
                    <div class="col-lg-3 col-1"></div>
                </div>
            </form>
        </div>
    </div>
@stop
