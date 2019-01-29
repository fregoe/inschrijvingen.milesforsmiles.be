@extends('mails.inc.master')

@section('title')
    Welkom bij Miles for Smiles
@endsection

@section('preview')
    Welkom bij Miles for Smiles
@endsection

@section('content')
    Beste {{ $user->email }},<br><br>
    Er werd zopas een gebruiker voor jou aangemaakt waarmee je jouw inschrijvingen kunt bekijken en de teams kunt beheren.<br><br>
    Hiervoor dien je echter eerst jouw wachtwoord in te stellen. Dit kan je doen via onderstaande link. Let op, deze is slechts 1 dag geldig.<br><br>
    {{ $passwordLink }}<br><br>
    Met sportieve groeten,<br><br>
    Miles for Smiles 2019
@endsection
