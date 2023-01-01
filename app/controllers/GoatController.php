<?php

class GoatController extends Controller {
	
	public function index ($param) {
		echo 'baaah';
	}
	
    public function add_goat () {
        if($this->method("post")) {
            $this->model('goat')->new_goat();
            header('Location: /goat/add_goat');
        } else {
            $viewbag['goats'] = $this->model('goat')->get_goats();
            $this->view('goat', 'add', $viewbag);
        }
    }

    public function all_goats () {
        $viewbag['goats'] = $this->model('goat')->get_goats();
        $this->view('goat', 'all', $viewbag);
    }
	
}