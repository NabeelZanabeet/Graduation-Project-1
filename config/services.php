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
    
    'facebook' => [
        'client_id'     => env('FB_ID','162383447742320'),
        'client_secret' => env('FB_SECRET','1f8257c6aec53802ef6922edcb877524'),
        'redirect'      => env('FB_REDIRECT','http://plap.localhost/social/handle/facebook')
    ],

    'twitter' => [
        'client_id'     => env('TW_ID'),
        'client_secret' => env('TW_SECRET'),
        'redirect'      => env('TW_REDIRECT')
    ],

    'google' => [
        'client_id'     => env('GOOGLE_ID','221544077121-lvlpe5v5fhe01von5ql8d77oaqsindop.apps.googleusercontent.com'),
        'client_secret' => env('GOOGLE_SECRET','ov-jZ6a-OhLcwXxK-J-jje3A'),
        'redirect'      => env('GOOGLE_REDIRECT','http://plap.localhost.com/social/handle/google')
    ],

    'github' => [
        'client_id'     => env('GITHUB_ID'),
        'client_secret' => env('GITHUB_SECRET'),
        'redirect'      => env('GITHUB_REDIRECT')
    ]

];
