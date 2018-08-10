<?php
class Db {
	// avoid connecting more than once with a static variable
	protected static $connection;

	public function connect() {
		// if no connection yet, try to connect to db
		if ( !isset(self::$connection) ) {
			// load config file as array
			$config = parse_ini_file('../secrets/config.ini');
			self::$connection = new mysqli($config[host], $config[username], $config[password], $config[dbname]);
			self::$connection->set_charset("utf8");
		}

		if (self::$connection === false) {
			// handle error
			return false;
		} else {
			return self::$connection;
		}
	}

	public function query($query) {
		$connection = $this->connect();
		$result = $connection->query($query);
		return $result;
	}

	public function multi_query($query) {
		$connection = $this->connect();
		$result = $connection->multi_query($query);
		return $result;
	}

	public function select($query) {
		$rows = array();
		$result = $this->query($query);

		if($result === false) {
			// Handle failure - log the error, notify administrator, etc.
			return false;
		} else {
			// Fetch all the rows in an array
			while ($row = mysqli_fetch_assoc($result)) {
				$rows[] = $row;
			}
			return $rows;
		}
	}
}
?>

