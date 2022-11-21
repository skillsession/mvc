<?php

/** Default Controller */
class HomeController extends Controller {
	
	/**
	 * Default function for HomeController
	 * 
	 * Collects info in "viewbag":
	 * - using functino parameters
	 * - using services
	 * - using models
	 * and sending it to the view
	 */
	public function index ($param_a = null, $param_b = null) {
		
		$viewbag['passed'] = [$param_a, $param_b];
		$viewbag['math_result'] = $this->service('math')->add_random_number(2);
		$viewbag['dog_fact'] = $this->service('dog')->get_fact();
		$viewbag['model'] = $this->model('home')->x_string("joe");
		
		$this->view('home', 'index', $viewbag);
	}
	
	/**
	 * Example of function that must only be called when user is logged in
	 */
	public function restricted () {
		if($this->logged_in()) {
			$this->view('home', 'restricted');
		} else {
			header('Location: /user/login');
		}
	}
	
}