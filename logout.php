<?php

	require_once("includes/session.php");

$session->logout();
header("location:index.php");

?>