<?php

class DatabaseConnection
{
	private $servername;
	private $username;
	private $password;
	private $dbname;

	protected $conn;

	function __construct()
	{
		$this->servername = "localhost";
		$this->username = "root";
		$this->password = "";
		$this->dbname = "funny_list";

		$this->conn = new mysqli($this->servername, $this->username,$this->password, $this->dbname);

		if (!$this->conn) {
    die("Connection failed1: " . mysqli_connect_error());
		}

	}

	public function connection()
	{
		if (!$this->conn) {
    die("Connection failed2: " . mysqli_connect_error());
		}

		return $this->conn;
	}
}