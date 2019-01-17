@extends('front.inc.master')

@section('content')
    <div class="row mt-2">
        @include('front.inc.mijn-account-menu')
        <div class="col-7">
            @if (session('status') && session('status') == 'no_doel')
                <div class="error mb-3">
                    @lang('front.teams.messages.no_doel')
                </div>
            @endif
            <form action="{{ isset($arr_team) ? route('mijn-account.teams.update',['team' => $arr_team->id]) : route('mijn-account.teams.store') }}" method="post">
                @csrf
                {!! isset($arr_team) ? '<input name="_method" type="hidden" value="PUT">':'' !!}
                <label for="naam">Naam:</label>
                <input class="form-control input-text" value="{{ old('naam') ?? ($arr_team->naam ?? '') }}" name="naam">
                <label for="goed_doel" class="mt-2">Goed doel:</label>
                <select name="goed_doel" class="form-control input-text">
                    <option value="0" {{ (isset($arr_team) && $arr_team->goed_doel == 0) ? 'selected=selected':'' }}>Kies een doel</option>
                    <option value="1" {{ (isset($arr_team) && $arr_team->goed_doel == 1) ? 'selected=selected':'' }}>{{ config('constants.goede_doelen.1') }}</option>
                    <option value="2" {{ (isset($arr_team) && $arr_team->goed_doel == 2) ? 'selected=selected':'' }}>{{ config('constants.goede_doelen.2') }}</option>
                    <option value="3" {{ (isset($arr_team) && $arr_team->goed_doel == 3) ? 'selected=selected':'' }}>{{ config('constants.goede_doelen.3') }}</option>
                    <option value="4" {{ (isset($arr_team) && $arr_team->goed_doel == 4) ? 'selected=selected':'' }}>{{ config('constants.goede_doelen.4') }}</option>
                </select>
                <button type="submit" class="btn btn-primary btn-submit mt-3">Bewaar</button>
            </form>
            @if(isset($arr_team))
                <div id="div_tbl_teamleden">
                    @include('front.mijn-account.teams.teamleden')
                </div>
            @endif
        </div>
    </div>
@stop
