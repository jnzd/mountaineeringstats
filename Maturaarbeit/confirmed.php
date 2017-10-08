<?php
$title = "Willkommen";
//include 'header.php';
?>
<html>
<head>
	<title>E-Mail Adresse wurde bestätigt</title>
	<link href="style.css" rel="stylesheet" type="text/css">
</head>

<body>
<div class="startBackground">
	<div class="outer">
		<div class="middle">
			<div class="inner">
			<div id="login">
				<h1 class="start">E-Mail Adresse bestätigt</h1><br>
				<h1 class="start">Anmelden</h1>
					<div class="error">
						<?php
						/**
						* output login error from previous try
						*/
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
<?php
  include 'footerStart.php';
?>
