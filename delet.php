<?php
	error_reporting( ~E_NOTICE );
	require("includes/header.php");
	require_once("includes/conDb.php");
	require_once("includes/session.php");
	require_once("includes/functions.php");
	require_once("crud.php");
 
	if ($_GET['delete']) {
		$id = $_SESSION['user_id'];
		if ($session->check_session()==true) {
				$de = $crud->delete($id);
				// $dele = $crud-> update_id($de);
				echo $dele;
				$session->logout();
				header("Location: index.php");
			}elseif ($session->check_session()==false) {
				echo "<script> alert('Login First');</script>";
				header("Location: index.php");
			}
		}
?>