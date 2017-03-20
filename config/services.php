<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Stripe, Mailgun, SparkPost and others. This file provides a sane
    | default location for this type of information, allowing packages
    | to have a conventional place to find your various credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
    ],

    'ses' => [
        'key' => env('SES_KEY'),
        'secret' => env('SES_SECRET'),
        'region' => 'us-east-1',
    ],

    'sparkpost' => [
        'secret' => env('SPARKPOST_SECRET'),
    ],

    'stripe' => [
        'model' => App\User::class,
        'key' => env('STRIPE_KEY'),
        'secret' => env('STRIPE_SECRET'),
    ],
    'twitter' => [
            'consumer_key' => 'lvxRcYIDeISdtCwuFdoAirORm', 
            'consumer_secret' => 'qnb5HnB3XwU6cjaf6Qp4LyGMlehFWcLWLPSiiyC6Q3ICwQnbT6', 
            'acces_token' => '839873928227008513-Vcr9BxYBX1HvVParGmY5come6azN30W',
            'acces_secret' => 'JaFpKNSFnCAr2u00F7yp7hV4dhgDiES9ZLBVZ6dzeEbOT',
    ]
];
