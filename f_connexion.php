<?php
define("host", "192.168.56.10");
define("username", "homestead");
define("password", "secret");
function connect($fhost, $fusername, $fpassword, $fdbname)
{
	// DATA SOURCE NAME DSN
	$dsn = "mysql:dbname=" . $fdbname . ";host=" . $fhost . ";charset=UTF8";
	// CONNEXION A LA BASE DE DONNEE
	try {
		//code...
		$options = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];
		return new PDO($dsn, username, password, $options);
		// $db->exec("SET NAMES utf8");
	} catch (PDOException $error) {
		// die($error->getMessage());
	}
}

?>