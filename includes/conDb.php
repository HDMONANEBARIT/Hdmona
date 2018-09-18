<?php 

	 $DB_SERVER = "localhost";
	 $DB_USER = "root";
	 $DB_PASSWORD = "joiedatabase";
	 $DB_NAME = "hdmona";
try
{
 $DB_con = new PDO("mysql:host={$DB_SERVER};dbname={$DB_NAME}", $DB_USER, $DB_PASSWORD);
 $DB_con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e)
{
 echo $e->getMessage();
}

	include_once 'crud.php';

	$crud = new crud($DB_con);
	
	include_once 'includes/admin_crud.php';
	
	$admin_crud = new admin($DB_con);

?>