<?php

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