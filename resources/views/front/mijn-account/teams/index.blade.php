@extends('front.inc.master')

@section('content')
    <div class="container container-milesforsmiles">
        @include('front.mijn-account.breadcrumbs')
        <div class="row mt-2">
            @include('front.inc.mijn-account-menu')
            <div class="col-7">
                @if(session('status') && session('status') == "teamnotempty")
                    <div class="error">
                        U kunt geen team verwijderen waar nog deelnemers in zitten.
                    </div>
                @endif
                <div class="row mb-3">
                    <div class="col-4 d-none d-lg-block">
                        Naam
                    </div>
                    <div class="col-3 d-none d-lg-block">
                        Goed Doel
                    </div>
                    <div class="col-3 d-none d-lg-block">
                        Aantal leden
                    </div>
                </div>
                @if (isset($user->relTeams) && count($user->relTeams)>0)
                    @foreach ($user->relTeams as $key => $team)
                        <div class="row mb-3">
                            <div class="col-lg-4 col-12 mb-1">
                                {{ $team->naam }}
                            </div>
                            <div class="col-lg-3 col-12 mb-1">
                                {{ $team->goed_doel }}
                            </div>
                            <div class="col-lg-3 col-12 mb-1">
                                {{ count($team->relDeelnemers) }}
                            </div>
                            <div class="col-lg-1 col-12">
                                <a href="{{ route('mijn-account.teams.edit',['id' => $team->id]) }}" ><i class="fas fa-edit"></i></i></a>
                            </div>
                            <div class="col-lg-1 col-12">
                                <a href="{{ route('mijn-account.teams.destroy',['id' => $team->id]) }}" ><i class="fas fa-trash"></i></a>
                            </div>
                        </div>
                    @endforeach
                @else
                    Er werden nog geen teams aangemaakt.
                @endif
                <div class="row mt-5">
                    <div class="col-12">
                        <a href="{{ route('mijn-account.teams.create') }}" class="btn btn-primary btn-submit">Nieuw team</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
