@if($alreadyLinked == true)
    <div class="alert alert-danger mt-2">
        De opgegeven deelnemer is reeds gelinkt aan een ander team.
    </div>
@endif
@if($maxTeamleden == true)
    <div class="alert alert-danger mt-2">
        Het team bestaat reeds uit 4 leden.
    </div>
@endif
@if($unknownDeelnemer == true)
    <div class="alert alert-danger mt-2">
        De opgegeven deelnemer werd niet teruggevonden.
    </div>
@endif
<div class="row mb-3 mt-3">
    <div class="col-1 d-none d-lg-block">
        #
    </div>
    <div class="col-3 d-none d-lg-block">
        Naam
    </div>
    <div class="col-3 d-none d-lg-block">
        Voornaam
    </div>
    <div class="col-3 d-none d-lg-block">
        Referentienr
    </div>
</div>
@if (isset($arr_team->relDeelnemers) && count($arr_team->relDeelnemers)>0)
    @foreach ($arr_team->relDeelnemers as $key => $deelnemer)
        <div class="row mb-3">
            <div class="col-lg-1 col-12 mb-1">
                {{ $key+1 }}
            </div>
            <div class="col-lg-3 col-12 mb-1">
                {{ $deelnemer->naam }}
            </div>
            <div class="col-lg-3 col-12 mb-1">
                {{ $deelnemer->voornaam }}
            </div>
            <div class="col-lg-3 col-12 mb-1">
                {{$deelnemer->referentienr }}
            </div>
            <div class="col-lg-1 col-12">
                <a href="" id="remove_teamlid" data-teamid="{{ $arr_team->id }}" data-referentienr="{{ $deelnemer->referentienr }}""><i class="fas fa-trash"></i></a>
            </div>
        </div>
    @endforeach
@endif
@if(count($arr_team->relDeelnemers) < 4)
    <div class="row mb-3">
        <div class="col-lg-7 col-12 mb-1"></div>
        <div class="col-lg-3 col-12 mb-1">
            <input name="referentienr" id="referentienr" class="form-control">
        </div>
        <div class="col-lg-2 col-12">
            <button type="submit" class="btn btn-primary" id="add_teamlid" data-teamid="{{ $arr_team->id }}">Voeg toe</button>
        </div>
    </div>
@endif