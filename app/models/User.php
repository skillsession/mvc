<?php
class User extends Database {
	
	/**
	 * Checks if a username and password is correct.
	 * The Session variable that remembers the login is set in the UserController
	 */
	public function login(){
		$sql = "SELECT email, password FROM user WHERE email = :email";
		
		$stmt = $this->conn->prepare($sql);
		$stmt->bindParam(':email', $_POST['email']);
		$stmt->execute();
		$result = $stmt->fetch(); //fetchAll would get multiple rows

		return password_verify($_POST['password'], $result['password']);

	}

	/**
	 * Registers a new user in the database
	 */
	public function register() {

		$email = filter_var ( $_POST['email'], FILTER_SANITIZE_STRING);
		$password = filter_var ( $_POST['password'], FILTER_SANITIZE_STRING);
		$hashed_password = password_hash($password, PASSWORD_DEFAULT);

		$sql = "INSERT INTO user (email, password) VALUES (:email, :password);";

		$stmt = $this->conn->prepare($sql);
		$stmt->bindParam(':email', $email);
		$stmt->bindParam(':password', $hashed_password);
		$stmt->execute();

		return $email;

	}

	/**
	 * Gets all users from the database, but without revealing their password hash
	 */
	public function getAll () {

		$sql = "SELECT user_id, username FROM user";

		$stmt = $this->conn->prepare($sql);
		$stmt->execute();

		$result = $stmt->fetchAll();

		return $result;
	}

}