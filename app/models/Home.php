<?php
/**
 * The home model simply exists as proof of concept
 * The model contains the data of an entity which is why
 * it extends the Database so it always has access to the DB connection
 */
class Home extends Database {
	
	public function x_string($string){
		return "x_" . $string;
	}

}