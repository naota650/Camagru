<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>this is title</title>
</head>
<body>

<form method="GET">
	<input type="text" name="username" placeholder="username">
	<br>
	<input type="text" name="password" placeholder="password">
	<br>
	<button>SUBMIT</button>
</form>

<?php
	$username = $_GET['username'];
	echo $username. " is the homie <br>";
	$pwd = $_GET['password'];
	echo $pwd. " is the password";
	
?>

</body>
</html>