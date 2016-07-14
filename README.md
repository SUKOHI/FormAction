# FormAction
A Laravel package to manage action URL of form tag.
(This package is for Laravel 5+)

# Installation

Execute composer command.

    composer require sukohi/form-action:2.*

Register the service provider in app.php

    'providers' => [
        ...Others...,
        Sukohi\FormAction\FormActionServiceProvider::class,
    ]

Also alias

    'aliases' => [
        ...Others...,
        'FormAction' => Sukohi\FormAction\Facades\FormAction::class,
    ]

# Preparation

First of all, execute `migrate` command from the package.

    php artisan vendor:publish --provider="Sukohi\FormAction\FormActionServiceProvider"

Now, you have `formaction.php` in your config folder.
So you need to set route or path there like so.

    return [
    
        /*
         * Routes
         */
        'routes' => [
            'home.login' => '/auth/authenticate'	// When current route is `home.login`, return `/auth/authenticate`.
        ],
    
        /*
         * Paths
         */
        'paths' => [
            '/login' => 'auth/authenticate'	// When current path is `/login`, return `/auth/authenticate`.
        ]
    
    ];

# Usage

(in View)  

    <form action="{{ FormAction::get() }}">

or you can set default path like so.

    <form action="{{ FormAction::get('/default_path') }}">

# License

This package is licensed under the MIT License.

Copyright 2016 Sukohi Kuhoh