<?php
	session_start();
	session_destroy();

	//removing cookies
	setcookie('PHPSESSID', '', time() - 3600, '/');
	setcookie('sessionID', '', time() - 3600, '/');

	header('location:index.php');

?>