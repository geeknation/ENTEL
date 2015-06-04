<?php

/*
 Database Connector
 *
 */
class EntelDB {
	private $dbName = '';
	private $dbUsername = '';
	private $dbPassword = '';
	static protected $instance;
	public static $conn;
	protected function __construct($dbName, $dbUsername, $dbPassword) {
		$this -> dbName = $dbName;
		$this -> dbUsername = $dbUsername;
		$this -> dbPassword = $dbPassword;
        try {
            self::$conn = new PDO("mysql:host=localhost;dbname=" . $this -> dbName . ";charset=utf8", $this -> dbUsername, $this -> dbPassword);
            self::$conn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        catch (PDOException $e){
            echo $e->getMessage();
        }
	}
}
?>