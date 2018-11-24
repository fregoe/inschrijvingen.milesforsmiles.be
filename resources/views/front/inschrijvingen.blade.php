@extends('front.inc.master')

@section('content')
    <h1 class="text-center">Inschrijvingen Miles for Smiles 2019</h1>
    <div class="row mt-5">
        <p class="text-left"><strong>Schrijf hieronder één of meerdere deelnemers in.</strong></p>
        <div class="col-12" id="div_tbl_inschrijvingen">
            @include('front.inc.tbl_inschrijvingen')
        </div>
    </div>
    <div class="row mt-5">
        <p class="text-left"><strong>Gegevens inschrijver</strong></p>
        <div class="col-12">
            <form action="{{ route('inschrijving.submit') }}" method="post">
                @csrf
                <div class="row">
                    <div class="col-12 col-lg-6">
                        <label for="email">E-mailadres</label>
                        <input type="text" id="email-administratief" name="email_administratief" class="form-control" value="{{ $arr_deelnemers[0]->email ?? '' }}">
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-6">
                        <button type="submit" class="btn btn-primary">Bevestig en betaal</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@stop
