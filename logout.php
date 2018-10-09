<?php
session_start();

unset($validUser);
	$_SESSION = array();
	$_SESSION['loggedIn'] = 0;
	session_destroy();
	
?>

<!DOCTYPE html>
<html>
	<head>
		<link rel="icon" href="images/favicon.ico" type="image/ico">
		<title>Overwatch Team Finder</title>
		<link rel="stylesheet" type="text/css" href="style.css" />
	</head>
	<meta http-equiv="refresh" content="0; url=index.php" />
</html>