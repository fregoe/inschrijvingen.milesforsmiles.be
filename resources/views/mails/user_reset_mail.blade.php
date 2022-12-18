@extends('mails.inc.master')

@section('title')
    Wachtwoord opnieuw instellen
@endsection

@section('preview')
    Wachtwoord opnieuw instellen
@endsection

@section('content')
    Beste {{ $user->email }},<br><br>
    Er werd zopas aan aanvraag gedaan voor het opnieuw instellen van uw wachtwoord. Dit kan je doen via onderstaande link. Let op, deze is slechts 1 dag geldig.<br><br>
    <a href="{{ $passwordLink }}">{{ $passwordLink }}</a><br><br>
    Met sportieve groeten,<br><br>
    Miles for Smiles 2023
@endsection
