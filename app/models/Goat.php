<?php
class Goat extends Database {
	
	public function new_goat () {
		$name = filter_var ($_POST['name'], FILTER_SANITIZE_STRING);
		$type = filter_var ($_POST['type'], FILTER_SANITIZE_STRING);

		$sql = "INSERT INTO goat (name, type) VALUES (:name, :type)";
		$stmt = $this->conn->prepare($sql);
		$stmt->bindParam(':name', $name);
		$stmt->bindParam(':type', $type);
		$stmt->execute();

	}

	public function get_goats() {
		return $this->get_all('goat');
	}

}