@extends('mails.inc.master')

@section('title')
    Inschrijvingsbevestiging
@endsection

@section('preview')
    Inschrijvingsbevestiging
@endsection

@section('content')
    Beste {{ $deelnemer->voornaam.' '.$deelnemer->naam }}<br><br>
    Bedankt voor je deelname aan Miles For Smiles. Nu je ingeschreven bent kan je met je vrienden een team vormen en samen voor een goed doel lopen.<br><br>
    Je lopercode is {{ $deelnemer->referentienr }}.<br>
    Wil je zelf een team samenstellen?<br>
    Maak een gebruiker aan en meld deze aan op de <a href="http://inschrijvingen.milesforsmiles.be">site</a>. Eénmaal aangemeld kan je lopers toevoegen aan de hand van hun loperscode.<br><br>
    Wil je aansluiten bij een team? Bezorg dan deze code aan degene die het team samenstelt.
    <br><br>
    Je inschrijving werd verzorgd  door {{ $deelnemer->relUser->email }}. Uw inschrijving kan gewijzigd worden via  inlogcode van {{ $deelnemer->relUser->email }}.<br><br>
    Met sportieve groeten,<br><br>
    Miles For Smiles
@endsection
