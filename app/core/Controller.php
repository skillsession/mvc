<?php
/**
 * All Controller inherit this class
 * It defines convenience methods which allow controllers to
 * call models, services and views.
 */
class Controller {
	
	protected function model($model) {
		require_once __DIR__ . '/../models/' . $model . '.php';
		return new $model();
	}
	
	protected function service($service) {
		require_once __DIR__ . '/../services/' . ucfirst($service) . 'Service.php';
		$service_class = $service . 'Service';
		return new $service_class();
	}

	protected function view($folder, $view, $viewbag = []) {
		$viewpath = __DIR__ . '/../views/' . $folder . '/' . $view . '.php';
		require_once __DIR__ . '/../views/template.php';
	}
	
	//convenience method to see if the request method was post or get
	protected function method ($method) {
		return $_SERVER['REQUEST_METHOD'] === strtoupper($method);
	}
	
	protected function logged_in () {
		if(isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == TRUE) {
			return true;
		} else {
			return false;
		}
	}

}