<?php

/*
* 
* 
*/

require_once "common.php";

session_start();

if ( !isset($_SESSION['money']) ) {
	$_SESSION['money'] = 2000;
}

/**************/
/* Clickjacking */
//header('X-Frame-Options: deny');
//header('X-Frame-Options: SAMEORIGIN');
//header('X-Frame-Options: ALLOW-FROM https://localhost:2080/');

?>

<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>CSRF Example</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/main.css">

	<script type="text/javascript" src="js/jquery.min.js"></script>
	<script type="text/javascript">
	function login() {
		$.ajax({
			type: 'GET',
			url: 'http://localhost:2080/secure/api.php',
			data: {
				type: 3
			},
			dataType: 'json',
			success: function( data ) {
				if( data.result ) {
					window.location.href = "http://localhost:2080/secure/csrf.php";
				}
			}
		});
	}

	function throwAwayMoney() {
		$.ajax({
			type: 'GET',
			url: 'http://localhost:2080/secure/api.php',
			data: {
				type: 2,
				withdraw: 200,
				key: '<?php echo md5( session_id() ) ?>'
			},
			dataType: 'json',
			success: function( data ) {
				if( data.result ) {
					window.location.href = "http://localhost:2080/secure/csrf.php";
				}
			}
		});
	}
	</script>
</head>

<body>

<h1>http://localhost:2080</h1>
<h2>Cross-Site Request Forgery</h2>

<?php if ( !isset($_SESSION['login']) || $_SESSION['login'] !== true ) { ?>
<button onclick="login()" class="btn btn-default">Login</button>
<?php } else { ?>

<div id="result">
<h2>I have $<?php echo $_SESSION['money'] ?>!!</h2>
<br />Throw Away $200? <button onclick="throwAwayMoney()" class="btn btn-default">Go</button>
</div>
<?php } ?>

</body>
</html>