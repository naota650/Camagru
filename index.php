<?php
	session_start();

	include_once 'includes/dbh.php';
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Title of the Document</title>
</head>
<body>
	$conn;
	<u1>
		<li><a href="hello.php">Home</a></li>
	</u1>
<?php
	$_SESSION['username'] = "user_name";
	echo $_SESSION['username'] ."<br>";

	if (!isset($_SESSION['username'])){
		echo "Not logged in";
	}else{
		echo "You are logged in";
	}
?>
</body>
</html>
