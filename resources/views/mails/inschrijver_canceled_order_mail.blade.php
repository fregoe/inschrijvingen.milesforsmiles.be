@extends('mails.inc.master')

@section('title')
    Annulatie onafgewerkte inschrijving
@endsection

@section('preview')
    Annulatie onafgewerkte inschrijving
@endsection

@section('content')
    Beste,<br><br>

    Hartelijk bedankt voor uw interesse in Miles For Smiles!<br>
    U probeerde {{ $deelnemer->voornaam.' '.$deelnemer->naam }} in te schrijven maar de inschrijving werd niet voltooid.<br><br>

    Mogelijks heeft u in een nieuwe poging ondernomen de inschrijving kunnen afwerken.<br>
    Indien dat het geval is, dan heeft u een bevestigingsmail ontvangen.<br>
    Mocht u deze mail niet terugvinden – deze kan tussen de ongewenste mails zitten – dan bent u dus niet ingeschreven.<br><br>

    Uw onafgewerkt order wordt nu in ons systeem geannuleerd.<br>
    Indien u probeerde met een vouchercode in te schrijven, wordt de vouchercode bij deze vrijgegeven.<br><br>

    Hopelijk mogen we u alsnog verwelkomen op Miles For Smiles om er samen met u een fantastisch event van te maken.<br>
    Dan kan u meteen naar <a href="https://inschrijvingen.milesforsmiles.be">https://inschrijvingen.milesforsmiles.be</a> om de inschrijving te voltooien.<br><br>

    Mocht u nog vragen hebben, aarzel niet ons te contacteren.<br><br>

    Met sportieve groeten,<br><br>

    Miles For Smiles

@endsection
