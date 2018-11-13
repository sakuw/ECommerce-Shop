<?php
session_start();

// na githuba:

define('MYSQL_USER', 'root');
define('MYSQL_PASSWORD', 'password');
define('MYSQL_HOST', 'localhost');
define('MYSQL_DATABASE', 'my db');






 /*
 PDO object; 
 
 Dane z SQL 
 host, database, user, passsword 
 */
 
function __getConnect__()
{
 
	try
	{
		$pdo = new PDO(
			"mysql:host=" . MYSQL_HOST . ";dbname=" . MYSQL_DATABASE,
			MYSQL_USER, 
			MYSQL_PASSWORD,
			
			array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
		  // die(json_encode(array('outcome' => true)));
		return $pdo;
	}

	catch(PDOException $error) 
	{
		  //   die(json_encode(array('outcome' => false, 'message' => 'Unable to connect')));
			 
		return $error->getMessage();
	}
}

?>