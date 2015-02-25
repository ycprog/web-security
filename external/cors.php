<?php

/*
* 
* 
*/

require_once "common.php";

header('X-Frame-Options: deny');
//header('X-Frame-Options: SAMEORIGIN');
//header('X-Frame-Options: ALLOW-FROM https://localhost:2080/');
?>

<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>CORS Example</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/main.css">

	<script type="text/javascript" src="js/jquery.min.js"></script>
	<script type="text/javascript">
	function getData() {
		$.ajax({
			type: 'GET',
			url: 'http://localhost:2080/secure/api.php',
			data: {
				type: 1,
				id: $('#personID').val()
			},
			dataType: 'json',
			success: function( data ) {
				if ( !data ) {
					return;
				}
				var person = data['person'];
				var html = '';

				html += 'Name: ' + person.name;
				html += '<br />Phone: ' + person.phone;

				$('#result').html(html);
			}
		});
	}
	</script>
</head>

<body>

<h1>http://sig.yclim.com</h1>
<h2>Cross-Origin Resource Sharing</h2>

<div>
<label for="personID"></label><input id="personID" type="text">
<button onclick="getData()" class="btn btn-default">GetData</button>
</div>

<div id="result">

</div>


</body>
</html>