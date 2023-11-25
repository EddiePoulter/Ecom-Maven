<?php

	session_start();
	unset($_SESSION["username"]);
	session_destroy();

?>
 <H2> Logged out now! </H2> 
 <p>Would like to log in again? <a href="index.php">Log in</a>  </p>
 <head>
	<title>Logged Out</title>
</head>
<head>
  <link rel="stylesheet" type="text/css" href="stylesheet.css">
</head>