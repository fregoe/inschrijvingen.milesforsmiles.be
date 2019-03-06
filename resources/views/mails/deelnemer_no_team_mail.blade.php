@extends('mails.inc.master')

@section('title')
    U behoort nog niet tot een team voor Miles for Smiles
@endsection

@section('preview')
    U behoort nog niet tot een team voor Miles for Smiles
@endsection

@section('content')
    Beste {{ $deelnemer->voornaam.' '.$deelnemer->naam }},<br><br>

    We kijken samen met jou uit naar Miles For Smiles. Ook dit jaar wordt het met jou deelname een top event waar op je samen met je team miles kunnen verzamelen voor de goede doelen.<br><br>

    Momenteel maak je nog geen deel uit van een team.<br><br>

    Wil je <b>zelf een team</b> samenstellen?<br>
    Dan moet je je eerst <b>aanmelden:</b><br>
    <ul>
        <li>Ga naar <a href="https://inschrijvingen.milesforsmiles.be/mijn-account/nieuwe-gebruiker">https://inschrijvingen.milesforsmiles.be/mijn-account/nieuwe-gebruiker</a></li>
        <li>Je vult dit mailadres in: {{ $deelnemer->email }} en klik op verstuur</li>
        <li>Vervolgens krijg je een mail die je toelaat een paswoord te maken en in te loggen.</li>
    </ul>
    Vervolgens kan je <b>teams maken</b> of bewerken:<br>
    <ul>
        <li>Ga naar ‘Mijn Teams’ en kies ‘Nieuw Team’</li>
        <li>Vul een naam in en kies een goed doel</li>
        <li>Bewerk het team om lopers toe te voegen</li>
        <li>Voeg lopers toe door de loperscode in te vullen</li>
    </ul>
    Wil je een <b>team vervoegen</b>?
    <ul>
        <li>Bezorg je loperscode {{ $deelnemer->referentienr }} aan diegene die het team samenstelt</li>
    </ul>
    Loop je <b>alleen</b>?<br>
    <ul>
        <li>Ook dan moet je je toevoegen aan een team, want op basis van de teams wordt de keuze van het goede doel vastgelegd.</li>
    </ul>
    Met sportieve groeten,<br><br>

    Miles For Smiles!

@endsection
