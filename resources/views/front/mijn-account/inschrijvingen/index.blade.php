@extends('front.inc.master')

@section('content')
    <div class="container container-milesforsmiles">
        @include('front.mijn-account.breadcrumbs')
        <div class="row mt-2">
            @include('front.inc.mijn-account-menu')
            <div class="col-9">
                <div class="row mb-3">
                    <div class="col-3 d-none d-lg-block">
                        Naam - Voornaam
                    </div>
                    <div class="col-4 d-none d-lg-block">
                        E-mail
                    </div>
                    <div class="col-2 d-none d-lg-block">
                        Referentienr
                    </div>
                    <div class="col-2 d-none d-lg-block">
                        Team
                    </div>
                </div>
                @if (isset($user->relDeelnemers) && count($user->relDeelnemers)>0)
                    @foreach ($user->relDeelnemers as $key => $deelnemer)
                        <div class="row mb-3">
                            <div class="col-lg-3 col-12 mb-1">
                                {{ $deelnemer->naam.' '.$deelnemer->voornaam }}
                            </div>
                            <div class="col-lg-4 col-12 mb-1">
                                {{ $deelnemer->email }}
                            </div>
                            <div class="col-lg-2 col-12 mb-1">
                                {{ $deelnemer->referentienr }}
                            </div>
                            <div class="col-lg-2 col-12">
                                {{ $deelnemer->relTeam->naam ?? '' }}
                            </div>
                            <div class="col-lg-1 col-12">
                                <a href="{{ route('mijn-account.inschrijvingen.edit',['referentie' => $deelnemer->referentienr]) }}" ><i class="fas fa-user-edit"></i></a>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
@stop
