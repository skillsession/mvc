<?php

require_once 'db_config.php';
	
class Database extends DB_Config {

	protected $conn;
	/**
	 * Creates a database connection which can be used in all models
	 */
	public function __construct() {
		try {
			
			$this->conn = new PDO("mysql:host=$this->servername;dbname=$this->dbname",
			$this->username,
			$this->password,
			array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
			
		} catch (PDOException $e) {
			echo "Error: " . $e->getMessage();
			echo "<br><br>Did you run the migrations?";
		}
	}

	/**
	 * Closes database connection when the instance is destroyed
	 */
	public function __destruct() {
		$this->conn = null;
	}
	
	/**
	 * Example of generic database function to simplify code in models
	 */
	protected function get_all($table) {
		$stmt = $this->conn->prepare("SELECT * FROM $table");
		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}

	/**
	 * 
	 */
	protected function select_one ($table, $column, $value) {
		$sql = "SELECT * FROM $table WHERE $column = :value";

		$stmt = $this->conn->prepare($sql);
		$stmt->bindParam(':value', $value);
		$stmt->execute();
		return $stmt->fetch();
	}

}