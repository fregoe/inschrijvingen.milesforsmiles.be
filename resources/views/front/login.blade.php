@extends('front.inc.master')

@section('content')
    <h1 class="text-center">Miles for Smiles 2019</h1>
    <div class="row mt-5">
        <div class="col-12">
            <p class="text-center"><strong>Login</strong></p>
            <form method="post" action="{{ route('login.submit') }}">
                @csrf
                <div class="row">
                    <div class="col-lg-4 col-2"></div>
                    <div class="col-lg-4 col-10 text-center">
                        <input class="form-control mb-2" name="email" placeholder="E-mailadres">
                        <input class="form-control mb-2" type="password" name="password" placeholder="Wachtwoord">
                        <button type="submit" class="btn btn-primary btn-block">Login</button>
                        <br>
                        <a href="{{ route('password.forgotten') }}">Wachtwoord vergeten?</a>
                    </div>
                    <div class="col-lg-4 col-2"></div>
                </div>
            </form>
        </div>
    </div>
@stop
