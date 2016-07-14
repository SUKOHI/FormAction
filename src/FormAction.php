<?php namespace Sukohi\FormAction;

class FormAction {

	public static function get($options = []) {

		$current_route = \Route::currentRouteName();
		$routes = config('formaction.routes');

		if(is_array($routes)) {

			foreach ($routes as $route => $next_route) {

				if($current_route == $route) {

					$params = array_get($options, 'parameters', []);
					return route($next_route, $params);

				}

			}

		}

		$current_path = \Request::path();
		$paths = config('formaction.paths');

		if(is_array($paths)) {

			foreach ($paths as $path => $action) {

				if (starts_with($path, '/')) {

					$path = substr($path, 1);

				}

				if ($current_path == $path) {

					return $action;

				}

			}

		}

		return array_get($options, 'default', '');

	}

}