@extends('front.inc.master')

@section('content')
    <div class="row mt-5">
        <div class="col-12">
            <form method="post" action="{{ route('login.submit') }}">
                @csrf
                <div class="row">
                    <div class="col-lg-4 col-1"></div>
                    <div class="col-lg-4 col-10 text-center login">
                        <p class="text-center subtitle">Login</p>
                        <input class="form-control mb-2 input-text" name="email" placeholder="E-mailadres">
                        <input class="form-control mb-2 input-text" type="password" name="password" placeholder="Wachtwoord">
                        <button type="submit" class="btn btn-primary btn-block btn-submit">Login</button>
                        <br>
                        <a href="{{ route('password.forgotten') }}">Wachtwoord vergeten?</a>
                    </div>
                    <div class="col-lg-4 col-1"></div>
                </div>
            </form>
        </div>
    </div>
@stop
