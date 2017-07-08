<!DOCTYPE html>

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
		if($_POST['password'] == $_POST['confirmpassword'])
		{
			$username = $mysqli->real_escape_string($_POST['username']);
			$email = $mysqli->real_escape_string($_POST['email']);
			$password = md5($_POST['password']);
			
			$sql = "INSERT INTO users (username, email, password)" . "VALUES ('$username', '$email', '$password')";
			
			if($mysqli->query($sql)===true)
			{
				$_SESSION['message'] = "erfolgreich registriert! $username zu Datenbank hinzugefuegt";
				header("location: welcome.php");
			}
			else
			{
				$_SESSION['message'] = "Nutzer konnte nicht zur Datenbank hinzugefuegt werden";
			}
		}
		else
		{
			echo "Passwoerter stimmen nicht ueberein";
		}
	}
?>

<html>
<head>
	<link href="CSS/style.css" rel="stylesheet" type="text/css">
	<title>Registrierung</title>
</head>



<body>
	<div>
		<h1>Registrieren</h1>
		<p><?php echo $_SESSION['message']?></p>
		<form action="registration.php" method="post" enctype="multipart/form-data" autocomplete="off">
			<input type="text" placeholder="Benutzername" name="username" required /><br>
			<input type="email" placeholder="E-Mail" name="email" required /><br>
			<input type="password" placeholder="Passwort" name="password" autocomplete="off" required /><br>
     		<input type="password" placeholder="Passwort best&auml;tigen" name="confirmpassword" autocomplete="off" required /><br>
			<input type="submit" value="registrieren" name="registrieren" /><br>
		</form>	
	</div>
	
	<div>	
	<a href=login.php> Anmelden </a>
	</div>
</body>
</html>