<?php
namespace App\core;

class Model{
	protected static $connection;

	public function __construct(){
		$host = "localhost";
		$DBName = "wikiProject";
		$username = "root";
		$password = "";

		//connect to the database
		self::$connection = new \PDO("mysql:host=$host;dbname=$DBName;charset=utf8;", $username, $password);
		//set what happens when there are errors
		self::$connection->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
	}
}
?>