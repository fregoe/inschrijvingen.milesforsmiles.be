<div id=""breadcrumbs>
    <a>Mijn Account</a>
    @if(Request::is('*teams*'))
        >
        <a>Teams</a>
        @if(Request::is('*teams/aanpassen*'))
        >
        {{ $arr_team->naam }}
        @endif
    @elseif(Request::is('*inschrijvingen*'))
        >
        <a>Inschrijvingen</a>
        @if(Request::is('*inschrijvingen/aanpassen*'))
        {{ $arr_deelnemer->naam.' '.$arr_deelnemer->voornaam }}
        @endif
    @endif
</div>
