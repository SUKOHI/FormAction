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
            'home.login' => 'home.authenticate'	// When current route is `home.login`, return `route('home.authenticate')`.
        ],
    
        /*
         * Paths
         */
        'paths' => [
            '/login' => 'auth/authenticate'	// When current path is `/login`, return `/auth/authenticate`.
        ]
    
    ];

# Usage

**Basic Usage**

    <form action="{{ FormAction::get() }}">

**with Options**

[Default Path]

    <form action="{{ FormAction::get(['default' => '/default_path']) }}">

[Route Parameters]

    <form action="{{ FormAction::get(['parameters' => [1, 2, 3]]) }}">

# License

This package is licensed under the MIT License.

Copyright 2016 Sukohi Kuhoh