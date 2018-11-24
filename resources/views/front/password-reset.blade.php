@extends('front.inc.master')

@section('content')
    <h1 class="text-center">Miles for Smiles 2019</h1>
    <div class="row mt-5">
        <div class="col-12">
            <p class="text-center"><strong>Wachtwoord opnieuw instellen</strong></p>
            <form method="post" action="{{ route('password.resetmail') }}">
                @csrf
                <div class="row">
                    <div class="col-lg-4 col-2"></div>
                    <div class="col-lg-4 col-10">
                        @if (session('status') && session('status') == 'error')
                            <div class="alert alert-danger mb-3">
                                Er werd geen gebruiker gevonden met dit e-mailadres.
                            </div>
                        @endif
                            @if (session('status') && session('status') == 'ok')
                                <div class="alert alert-success mb-3">
                                    Een mail met de nodige instructies is onderweg.
                                </div>
                            @endif
                        <input class="form-control mb-2" name="email" placeholder="E-mailadres">
                        <button type="submit" class="btn btn-primary btn-block">Verstuur</button>
                    </div>
                    <div class="col-lg-4 col-2"></div>
                </div>
            </form>
        </div>
    </div>
@stop
