<?php

/**
 * This router uses reflection. In the url, everything after the 
 * base url (example.com) will be used to find the correct function
 * following this pattern:
 * 
 * /controller/method/parameter1/parameter2/...
 * 
 * If there is no controller with the given name the default 
 * controller (home) is used, and the pattern above functions without
 * the "controller"
 * 
 * If there is no function with the expected name, the default
 * function (index) is called, and remaining parameters
 * are passed as parameters
 * 
 * Examples:
 * / => HomeController::index()
 * /user => UserController::index()
 * /user/login/ => UserController::login()
 * /user/login/name/password => UserController::login("name", "password)
 * /name/password => HomeController::index("name", "password")
 * /user/name/password => UserController::index("name", "password")
 * 
 * in these examples, there is a UserController, but no NameController
 * and the UserController has a function named "login", but no function
 * named "name". The HomeController has a function named index, but not
 * one called "user" or "name".
 */
class Router {
	
	//Default controller, method and params set
	//in case of invalid url
	protected $controller = 'HomeController';
	protected $method = 'index';
	protected $params = [];
	
	/**
	 * Main router function
	 */
	function __construct () {
		$url = $this->get_url_as_array();
		$url = $this->initialize_controller($url);
		$url = $this->prepare_function_call($url);
		
		//prepare remaining url parameters as function parameters
		$this->params = $url ? array_values($url) : [];

		//call prepared method in initialized controller with url parameters
		call_user_func_array([$this->controller, $this->method], $this->params);
		
	}
	
	/**
	 * Gets the Request URI (URL part after the domain)
	 * Returns URI as array separated by forward slashes
	 */
	private function get_url_as_array () {
		
		$url = filter_var($_SERVER['REQUEST_URI'], FILTER_SANITIZE_URL);
		
		//remove last forward-slash if nothing comes after it
		if(substr($url, -1) === "/") {
			$url = substr($url, 0, strlen($url) - 1);
		}

		$url = explode('/', $url);
		return array_slice($url, 1);
	}
	
	/**
	 * If first param is a valid controller, use it and remove
	 * it as parameter. Otherwise, use default controller.
	 */	
	private function initialize_controller($url) {
		//setting default controller
		$controller_path = __DIR__ . '/../controllers/'
							. $this->controller . '.php';
		
		//testing if first param is valid controller
		if(isset($url[0])) {
			$temp_controller_path = __DIR__ . '/../controllers/' 
								. ucfirst($url[0]) 
								. 'Controller.php';
			if(file_exists($temp_controller_path)) {
				$controller_path = $temp_controller_path;
				$this->controller = ucfirst($url[0]) . 'Controller';
				$url = array_slice($url, 1);
			}
		}
		
		//initialize controller
		require_once $controller_path;
		$this->controller = new $this->controller;

		return $url;
	}

	/**
	 * if next param is a function in the controller, use it
	 * otherwise, use the default method
	 */
	private function prepare_function_call($url) {
		if(isset($url[0])) {
			if(method_exists($this->controller, $url[0])) {
				$this->method = $url[0];
				$url = array_slice($url, 1);
			}
		}
		return $url;
	}
}
