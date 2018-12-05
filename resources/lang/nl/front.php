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
        'title' => 'Inschrijvingen Miles for Smiles 2019',
        'subtitle' => 'Schrijf hieronder één of meerdere deelnemers in.',
        'section1' => 'Gegevens inschrijver',
        'fields' => [
            'email' => [
                'label' => 'E-mail'
            ],
            'submit' => [
                'text' => 'Bevestig en betaal'
            ]
        ]
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
    ]
];
