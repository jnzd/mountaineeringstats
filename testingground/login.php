<<<<<<< HEAD
<!DOCTYPE html>
<html>
<head>
	<link href="CSS/style.css" rel="stylesheet" type="text/css">
	<title>Login</title>
</head>

<?php
	session_start();
	$_SESSION['message']='';
	
	$mysqli = new mysqli('localhost', 'root', '', 'accounts');
	if ($mysqli->connect_errno) {
		echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
	}
	
	else {
		echo "success!";
	}
	echo $mysqli->host_info . "\n";
	
	
	if($_SERVER['REQUEST_METHOD']=='POST')
	{
		echo "hello";
	}
?>

<body>
	
	<div>
		<h1>Anmelden</h1>
		<p><?php echo $_SESSION['message']?></p>
		<form action="login.php" method="post" enctype="multipart/form-data" autocomplete="off">
			<input type="text" placeholder="Benutzername" name="username" required /><br>
			<input type="email" placeholder="E-Mail" name="email" required /><br>
			<input type="password" placeholder="Passwort" name="password" autocomplete="off" required /><br>
			<input type="submit" value="anmelden" name="login" /><br>
		</form>	
	</div>

<div>	
	<a href=registration.php> Registrieren </a>
	</div>
</body>
=======
<!DOCTYPE html>
<html>
<head>
	<link href="CSS/style.css" rel="stylesheet" type="text/css">
	<title>Login</title>
</head>

<?php
	session_start();
	$_SESSION['message']='';
	
	$mysqli = new mysqli('localhost', 'root', '', 'accounts');
	if ($mysqli->connect_errno) {
		echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
	}
	
	else {
		echo "success!";
	}
	echo $mysqli->host_info . "\n";
	
	
	if($_SERVER['REQUEST_METHOD']=='POST')
	{
		echo "hello";
	}
?>

<body>
	
	<div>
		<h1>Anmelden</h1>
		<p><?php echo $_SESSION['message']?></p>
		<form action="login.php" method="post" enctype="multipart/form-data" autocomplete="off">
			<input type="text" placeholder="Benutzername" name="username" required /><br>
			<input type="email" placeholder="E-Mail" name="email" required /><br>
			<input type="password" placeholder="Passwort" name="password" autocomplete="off" required /><br>
			<input type="submit" value="anmelden" name="login" /><br>
		</form>	
	</div>

<div>	
	<a href=registration.php> Registrieren </a>
	</div>
</body>
>>>>>>> a8805867178965b0e6156b6ee5705ccb208c1512
</html>