<?php
$title = "Hi";//Titel der Seite
include 'header.php';
if(isset($_SESSION['id'])){
	header("location: main.php");
}

?>
<div id="error">
	<?php
		//$_SESSION['message'] = "test";
		echo $_SESSION['message'];
	?>
</div>
<div id="registration">
	<h1>Registrieren</h1>
	<!-- Registrierungsformular -->
	<form action= "includes/registration.inc.php" method="POST">
		<input type="text" name="username" placeholder="Benutzername"><br>
		<input type="email" name="email" placeholder="E-Mail"><br>
		<input type="password" name="password" placeholder="Passwort"><br>
		<input type="password" name="confirmpassword" placeholder="Passwort bestaetigen"><br>
		<input type="submit" name="registrieren" value="registrieren">
	</form>
</div>

<div id="login">
	<h1>Anmelden</h1>
	<!-- Anmeldeformular -->
	<form action= "includes/login.inc.php" method="post">
		<input type="email" name="email" placeholder="E-Mail"><br>
		<input type="password" name="password" placeholder="Passwort"><br>
		<input type="checkbox" name="remember" value="remmber"><label>Angemeldet bleiben</label><br>
		<input type="submit" name="anmelden" value="anmelden"><br><br>
	</form>
</div>
</body>
</html>
