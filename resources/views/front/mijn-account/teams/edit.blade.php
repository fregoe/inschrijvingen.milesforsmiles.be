@extends('front.inc.master')

@section('content')
    <h1 class="text-center">Miles for Smiles 2019</h1>
    @include('front.mijn-account.breadcrumbs')
    <div class="row mt-2">
        @include('front.inc.mijn-account-menu')
        <div class="col-7">
            <form action="{{ isset($arr_team) ? route('mijn-account.teams.update',['team' => $arr_team->id]) : route('mijn-account.teams.store') }}" method="post">
                @csrf
                {!! isset($arr_team) ? '<input name="_method" type="hidden" value="PUT">':'' !!}
                <label for="naam">Naam:</label>
                <input class="form-control" value="{{ $arr_team->naam ?? '' }}" name="naam">
                <label for="goed_doel" class="mt-2">Goed doel:</label>
                <select name="goed_doel" class="form-control">
                    <option value="1" {{ (isset($arr_team) && $arr_team->goed_doel == 1) ? 'selected=selected':'' }}>Goed doel 1</option>
                    <option value="2" {{ (isset($arr_team) && $arr_team->goed_doel == 2) ? 'selected=selected':'' }}>Goed doel 2</option>
                    <option value="3" {{ (isset($arr_team) && $arr_team->goed_doel == 3) ? 'selected=selected':'' }}>Goed doel 3</option>
                    <option value="4" {{ (isset($arr_team) && $arr_team->goed_doel == 4) ? 'selected=selected':'' }}>Goed doel 4</option>
                </select>
                <button type="submit" class="btn btn-primary mt-3">Bewaar</button>
            </form>
            @if(isset($arr_team))
                <div id="div_tbl_teamleden">
                    @include('front.mijn-account.teams.teamleden')
                </div>
            @endif
        </div>
    </div>
@stop
