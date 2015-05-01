<?php 

class Database {

	private static $db_host = 'localhost';
	private static $db_name = 'test';
	private static $db_user = 'panicUser';
	private static $db_pass = '123';
	private static $conn = null;

	function __construct() {
		die("No Init Applicable");
	}

	public static function connect() {
		if (null == self::$conn) {
			try {
				self::$conn = new PDO("mysql:host=".self::$db_host.";dbname=".self::$db_name, self::$db_user, self::$db_pass);
				self::$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
			} catch(PDOException $e) {
				echo "PDOException Error" .$e->getCode();
			}
		}

		return self::$conn;
	}

	public static function disconnect() {
		self::$conn = null;
	}
}
 ?>