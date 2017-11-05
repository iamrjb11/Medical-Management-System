<?php
include_once 'dbconfig.php';

class CRUD
{
	private $db;
	private $conn;

	public function __construct()
	{
		$db = new DB_con();
		$this->conn = $db->getConnection();
	}

	// function for create
	public function create($fname,$lname,$city)
	{
		mysqli_query($this->conn,"INSERT INTO users(first_name,last_name,user_city) VALUES('$fname','$lname','$city')");
	}
	// function for create

	// function for read
	public function read()
	{
		return mysqli_query($this->conn,"SELECT * FROM users ORDER BY user_id ASC");
	}
	// function for read

	// function for delete
	public function delete($id)
	{
		mysqli_query($this->conn,"DELETE FROM users WHERE user_id=".$id);
	}
	// function for delete

	// function for update
	public function update($fname,$lname,$city,$id)
	{
		mysqli_query($this->conn,"UPDATE users SET first_name='$fname', last_name='$lname', user_city='$city' WHERE user_id=".$id);
	}
	// function for update

	public function getConnection()
	{
		return $this->conn;
	}
}
?>