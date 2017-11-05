<?php
define('DB_SERVER','localhost');
define('DB_USER','root');
define('DB_PASSWORD','');
define('DB_NAME','dbtuts');

class DB_con
{
	private $conn;
	function __construct()
	{
		$this->conn = mysqli_connect(DB_SERVER,DB_USER,DB_PASSWORD) or die('error connecting to server'.mysql_error());
		mysqli_select_db($this->conn, DB_NAME) or die('error connecting to database->'.mysqli_error());
	}

	public function getConnection()
	{
		return $this->conn;
	}
}

?>