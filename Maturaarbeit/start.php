<?php
	$title = "mountaineeringstats | Wilkommen";//Titel der Seite
	include 'header.php';
	if(isset($_SESSION['id'])){
		header("location: index.php");
	}
?>
<div class="startBackground">
	<div class="outer">
		<div class="middle">
			<div class="inner">
				<h1 class="start">Mountaineeringstats</h1>
				<h1 class="start">Registrieren</h1>
				<div id="error">
					<?php
					if(isset($_SESSION['registrationError'])){
						echo $_SESSION['registrationError'];
					}
					?>
				</div>
				<div class="registration">
					<!-- Registrierungsformular -->
					<form class="start" action= "includes/registration.inc.php" method="POST">
						<input class="start" type="text" name="username" placeholder="Benutzername"><br>
						<input class="start" type="email" name="email" placeholder="E-Mail"><br>
						<input class="start" type="password" name="password" placeholder="Passwort"><br>
						<input class="start" type="password" name="confirmpassword" placeholder="Passwort bestätigen"><br>
						<input class="start" type="submit" name="registrieren" value="registrieren">
					</form>
				</div>
				<br><br>
				<div id="login">
					<h1 class="start bright">Anmelden</h1>
					<div class="error">
						<?php
						if(isset($_SESSION['loginError'])){
							echo $_SESSION['loginError'];
						}
						?>
					</div>
					<!-- Anmeldeformular -->
					<form action= "includes/login.inc.php" method="post">
						<input class="start" type="email" name="email" placeholder="E-Mail"><br>
						<input class="start" type="password" name="password" placeholder="Passwort"><br>
						<!--<input type="checkbox" name="remember" value="remmber"><label>Angemeldet bleiben</label><br>-->
						<input class="start" type="submit" name="anmelden" value="anmelden"><br><br>
					</form>
					<a class="start" href="passwordReset.php">Passwort vergessen</a>
				</div>
			</div>
		</div>
	</div>
</div>
</body>
</html>
