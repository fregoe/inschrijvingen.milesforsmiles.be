Beste {{ $inschrijver->email }},<br><br>
U heeft volgende deelnemers ingeschreven:<br>
@foreach($deelnemers as $key => $deelnemer)
    {{ $key+1.'. '.$deelnemer->voornaam.' '.$deelnemer->naam.' '.$deelnemer->email.' '.$deelnemer->referentienr }}<br>
@endforeach
<br>
Nu uw deelnemers ingeschreven zijn, kunnen ze met hun vrienden een team vormen en samen voor een goed doel lopen. Ze hebben daarenboven op het opgegeven mailadres individueel hun lopercode ontvangen.<br><br>
Wil je zelf een team samenstellen of je deelnemers aan een team toevoegen?<br>
Maak een gebruiker aan en meld deze aan op de <a href="http://inschrijvingen.milesforsmiles.be">site</a>. Eénmaal aangemeld kan je lopers toevoegen aan de hand van hun lopercode.<br><br>
Met sportieve groeten,<br><br>
Miles For Smiles
