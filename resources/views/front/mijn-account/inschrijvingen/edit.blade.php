@extends('front.inc.master')

@section('content')
    <h1 class="text-center">Miles for Smiles 2019</h1>
    @include('front.mijn-account.breadcrumbs')
    <div class="row mt-2">
        @include('front.inc.mijn-account-menu')
        <div class="col-8">
            <form action="{{ route('mijn-account.inschrijvingen.edit',['referentie' => $arr_deelnemer->referentienr]) }}" method="post">
                {!! isset($arr_deelnemer) ? '<input name="_method" type="hidden" value="PUT">':'' !!}
                @csrf
                <label for="naam">Naam:</label>
                <input class="form-control" value="{{ $arr_deelnemer->naam }}" name="naam">
                <label for="naam">Voornaam:</label>
                <input class="form-control" value="{{ $arr_deelnemer->voornaam }}" name="voornaam">
                <button type="submit" class="btn btn-primary mt-3">Bewaar</button>
            </form>
        </div>
    </div>
@stop
