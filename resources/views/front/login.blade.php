@extends('front.inc.master')

@section('content')
    <div class="row mt-5">
        <div class="col-12">
            <form method="post" action="{{ route('login.submit') }}">
                @csrf
                <div class="row">
                    <div class="col-lg-3 col-1"></div>
                    <div class="col-lg-6 col-10 text-center login">
                        <p class="text-center subtitle">@lang('front.inloggen.title')</p>
                        <p class="text-center">@lang('front.inloggen.text')</p>
                        <input class="form-control mb-2 input-text" name="email" placeholder="E-mailadres gebruiker">
                        <input class="form-control mb-2 input-text" type="password" name="password" placeholder="Wachtwoord gebruiker">
                        <a href="{{ route('user.new') }}" class="btn btn-primary btn-block btn-submit">@lang('front.inloggen.buttons.new_user')</a>
                        <button type="submit" class="btn btn-primary btn-block btn-submit">Login</button>
                        <a href="{{ route('password.forgotten') }}" class="btn btn-primary btn-block btn-submit">@lang('front.inloggen.buttons.forgot_password')</a>
                    </div>
                    <div class="col-lg-3 col-1"></div>
                </div>
            </form>
        </div>
    </div>
@stop
