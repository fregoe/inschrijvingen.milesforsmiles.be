@extends('front.inc.master')

@section('content')
    <div class="row mt-5">
        <div class="col-lg-3 col-1"></div>
        <div class="col-lg-6 col-10 login">
            <p class="text-center"><strong>Wachtwoord opnieuw instellen</strong></p>
            <form method="post" action="{{ route('password.resetmail') }}">
                @csrf
                <div class="row">
                    <div class="col-12">
                        @if (session('status') && session('status') == 'error')
                            <div class="error mb-3">
                                Er werd geen gebruiker gevonden met dit e-mailadres.
                            </div>
                        @endif
                            @if (session('status') && session('status') == 'ok')
                                <div class="error mb-3">
                                    Een mail met de nodige instructies is onderweg.
                                </div>
                            @endif
                        <input class="form-control mb-2 input-text" name="email" placeholder="E-mailadres gebruiker">
                        <button type="submit" class="btn btn-primary btn-block btn-submit">Verstuur</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-lg-3 col-1"></div>
    </div>
@stop
