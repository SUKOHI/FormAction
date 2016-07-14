<?php

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