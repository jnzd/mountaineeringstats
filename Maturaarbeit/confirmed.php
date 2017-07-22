<?php
$title = "Willkommen";
include 'header.php';
?>
<h1>E-Mail Adresse bestätigt</h1>

<div class="outer">
  <div class="middle">
    <div class="inner">
			<div id="login">
				<h1 class="start">Anmelden</h1>
				<div id="error">
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
			</div>
    </div>
  </div>
</div>

<a href="https://www.Mountaineeringstats.com">Startseite</a>

</body>
</html>
