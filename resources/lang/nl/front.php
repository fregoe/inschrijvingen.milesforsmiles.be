<?php

return [

    /*
    |--------------------------------------------------------------------------
    |Front Language Lines
    |--------------------------------------------------------------------------
    |
    | These language lines are use in the front of the application
    |
    */

    'inschrijvingen' => [
        'title' => 'Deelnemers',
        'description' => 'Schrijf één of meerdere deelnemers in en betaal of gebruik een voucher. Na inschrijving ontvangt elke deelnemer een individuele bevestiging. Er wordt daarenboven een overzicht van alle ingeschreven deelnemers verzonden naar het mailadres van de inschrijver. Na inschrijving kunnen de deelnemers in teams ingedeeld worden.',
        'section1' => 'Gegevens inschrijver',
        'fields' => [
            'email' => [
                'label' => 'E-mail'
            ],
            'submit' => [
                'text' => 'Bevestig en betaal'
            ]
        ],
        'messages' => [
            'no_deelnemers' => 'Gelieve minstens 1 deelnemer toe te voegen. Dit kan door onderstaande velden in te vullen en op + icoontje te klikken.',
            'no_voucher' => 'Momenteel kunnen enkel inschrijvingen plaatsvinden met een voucher. Betalende inschrijvingen zijn momenteel nog niet mogelijk.'
        ]
    ],
    'menu' => [
        'subscription' => 'Inschrijven Run&Party',
        'logon' => 'Aanmelden',
        'teams' => 'Teams vormen'
    ],
    'menu_teams' => [
        'deelnemers' => 'Mijn deelnemers',
        'teams' => 'Mijn teams',
        'logoff' => 'Afmelden'
    ],
    'tbl_inschrijvingen' => [
        'errors' => [
            'vouchererror' => 'Ongeldige of reeds gebruikte voucher code.'
        ],
        'header' => [
            'name' => 'Naam',
            'firstname' => 'Voornaam',
            'email' => 'E-mail',
            'voucher' => 'Voucher'
        ],
        'overview' => [
            'amount' => 'Aantal inschrijvingen',
            'totalprice' => 'Totaal te betalen'
        ],
        'fields' => [
            'add_inschrijving' => 'Voeg toe'
        ]
    ],
    'inloggen' => [
        'title' => 'Login',
        //'text' => 'Meld je aan om één of meerdere teams te vormen voor jezelf of anderen. Heb je nog geen login of ben je de code vergeten? Vul je e-mailadres in en we sturen je meteen een inlogcode.'
        'text' => 'Om teams te vormen voor jezelf of voor anderen moet eerst een gebruiker aangemaakt worden. Maak hier een gebruiker aan of meld je meteen aan.',
        'buttons' => [
            'new_user' => 'Nieuwe gebruiker',
            'forgot_password' => 'Wachtwoord vergeten'
        ]
    ],
    'nieuwe_gebruiker' => [
        'title' => 'Nieuwe gebruiker',
        'messages' => [
            'user_exists' => 'Er bestaat reeds een gebruiker met dit e-mailadres. Er werd een mail verstuurd om het wachtwoord hiervan opnieuw in te stellen.',
            'user_created' => 'Er werd een nieuwe gebruiker aangemaakt. Er is een mail onderweg met de nodige instructies om het wachtwoord hiervan in te stellen.'
        ]
    ],
    'teams' => [
        'text' => 'Vorm hier teams (1 tot en met 4 lopers) voor jezelf of anderen. Kies het goede doel waarvoor het team loopt. Je voegt lopers toe door middel van de lopercode die ze in de mail ontvangen hebben. De inschrijver heeft een overzicht van alle lopercodes ontvangen of kan deze raadplegen onder \'Mijn deelnemers\'',
        'messages' => [
            'no_doel' => 'Er werd geen goed doel gekozen.'
        ]
    ],
    'teamleden' => [
        'select' => 'Kies een deelnemer'
    ]
];
