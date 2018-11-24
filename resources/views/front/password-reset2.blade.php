@extends('front.inc.master')

@section('content')
    <h1 class="text-center">Miles for Smiles 2019</h1>
    <div class="row mt-5">
        <div class="col-12">
            <p class="text-center"><strong>Wachtwoord opnieuw instellen</strong></p>
            <form method="post" action="{{ route('password.reset.submit') }}">
                <input type="hidden" name="token" value="{{ $_GET['token'] }}">
                @csrf
                <div class="row">
                    <div class="col-lg-4 col-2"></div>
                    <div class="col-lg-4 col-10 text-center">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <p>Er is iets verkeerd gelopen:</p>
                                @foreach ($errors->all() as $error)
                                    <p>{{ $error }}</p>
                                @endforeach
                            </div>
                        @endif
                        <input class="form-control mb-2" name="email" placeholder="E-mailadres">
                        <input class="form-control mb-2" type="password" name="password" placeholder="Wachtwoord">
                        <input class="form-control mb-2" type="password" name="password_confirmation" placeholder="Bevestig wachtwoord">
                        <button type="submit" class="btn btn-primary btn-block">Pas aan</button>
                    </div>
                    <div class="col-lg-4 col-2"></div>
                </div>
            </form>
        </div>
    </div>
@stop
