<?php namespace Sukohi\FormAction;

class FormAction {

	public static function get($options = []) {

		$params = array_get($options, 'parameters', []);
		$action = self::route($params);

		if(!empty($action)) {

			return $action;

		}

		$action = self::path();

		if(!empty($action)) {

			return $action;

		}

		return array_get($options, 'default', '');

	}

	public static function route($parameters = [], $default_path = '') {

		$action = '';
		$current_route = \Route::currentRouteName();
		$routes = config('formaction.routes');

		if(is_array($routes)) {

			foreach ($routes as $route => $next_route) {

				if($current_route == $route) {

					if(!empty($parameters)) {

						$action = route($next_route, $parameters);

					} else {

						$action = route($next_route);

					}

					break;

				}

			}

		}

		if(empty($action)) {

			$action = $default_path;

		}

		return $action;

	}

	public static function path($default_path = '') {

		$action = '';
		$current_path = \Request::path();
		$paths = config('formaction.paths');

		if(is_array($paths)) {

			foreach ($paths as $path => $next_path) {

				if (starts_with($path, '/')) {

					$path = substr($path, 1);

				}

				if ($current_path == $path) {

					$action = url($next_path);
					break;

				}

			}

		}

		if(empty($action)) {

			$action = $default_path;

		}

		return $action;

	}

}