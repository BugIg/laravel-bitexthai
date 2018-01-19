<?php
return [
    /*
    |--------------------------------------------------------------------------
    | bx.in.th authentication
    |--------------------------------------------------------------------------
    |
    | Authentication key and secret for bx.in.th API.
    |
     */
    'auth' => [
        'key'    => env('BITEXTHAI_API_KEY', ''),
        'secret' => env('BITEXTHAI_API_SECRET', ''),
    ],
    /*
    |--------------------------------------------------------------------------
    | Api URLS
    |--------------------------------------------------------------------------
    |
    | bx.in.th API endpoints
    |
     */
    'urls' => [
        'api'  => 'https://bx.in.th/api',
    ],

    'pairs' => [
        'THB/BTC' => 1,
        'BTC/LTC' => 2,
        'BTC/NMC' => 3,
        'BTC/DOG' => 4,
        'BTC/PPC' => 5,
        'BTC/FTC' => 6,
        'BTC/XPM' => 7,
        'BTC/ZEC' => 8,
        'BTC/HYP' => 13,
        'BTC/PND' => 14,
        'BTC/XCN' => 15,
        'BTC/XPY' => 17,
        'BTC/QRK' => 19,
        'BTC/ETH' => 20,
        'THB/ETH' => 21,
        'THB/DAS' => 22,
        'THB/REP' => 23,
        'THB/GNO' => 24,
        'THB/XRP' => 25,
        'THB/XZC' => 29,
        'THB/LTC' => 30,

    ]
];