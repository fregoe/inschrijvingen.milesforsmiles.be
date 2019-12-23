@extends('mails.inc.master')

@section('title')
    Praktische informatie voor Miles For Smiles.
@endsection

@section('preview')
    Praktische informatie voor Miles For Smiles.
@endsection

@section('content')
    Beste {{ $deelnemer->voornaam.' '.$deelnemer->naam }},<br><br>

    Nog twee keer slapen en het is zover! Zaterdag zetten we eindelijk het sportiefste feestje van het jaar in! Om het feest zo goed mogelijk te laten verlopen, zouden we je graag een aantal zaken doorgeven.<br><br>

    Je bent ingeschreven in <b>team {{ $deelnemer->relTeam->naam }} met als nummer {{ $deelnemer->relTeam->relTracking->tracking_id }}</b><br><br>

    We hebben een hoge opkomst van lopers en we verwachten ook veel supporters. <b>Vertrek tijdig</b> zodat je je auto in de buurt kunt plaatsen. Het adres is: Dorpstraat 188 Sijsele<br><br>

    De deuren gaan <b>open om 17u</b>. De borstnummers, polsbandjes en estafettestok hebben we per team klaargelegd op nummer.<br><br>

    Vlak achter de inkom zijn er omkleedruimtes voorzien voor de dames alsook voor de heren. Er is ook een <b>gratis vestiaire</b> waar je tassen en kleren kunt achterlaten. Om <b>18u15</b> vindt de grote <b>warm-up</b> onder deskundige leiding van het team van Health Point plaats in de wisselzone. Deze wil je zeker niet missen!<br><br>

    Het <b>startschot</b> wordt om <b>18u30</b> gegeven. Je loopt in estafette met je teamgenoten. Er zijn twee looptrajecten voorzien: de mile en de halve mile. Beide hebben echter een ander decor. Je wil ze ongetwijfeld alle twee verkend hebben. Intussentijd trapt DJ Olivier Lemaire al het feestje op gang in de wisselzone in de centrale hal. Deze hal is verwarmd, aangekleed en volledig ingericht met food-stands en bar.<br><br>

    We sluiten de wedstrijd af om 20u30. Hoe meer miles je team gelopen heeft voor jullie goede doel, hoe hoger het aandeel van dat doel in de opbrengst. Na de wedstrijd worden de tickets voor The Jane en de VIP tickets voor Tommorowland verloot.<br><br>

    Maar al die miles verdienen de nodige smiles. Jef Neve trakteert ons om <b>21u30</b> op een exclusief pianoconcert. Daarna zetten DJ's Hermanos Inglesos, Olivier Lemaire en Sakso de zaal in lictherlaaie.<br><br>

    Je goodie bag haal je op aan de uitgang bij de vestiare.<br>
    Supporters die in de partyhal willen, vragen we een partyticket voor het goede doel te kopen. Supporters onder 12 jaar kunnen binnen zonder bijdrage.<br><br>

    Met sportieve groeten<br><br>

    Miles For Smiles
@endsection
