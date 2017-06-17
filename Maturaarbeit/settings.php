<?php
$title="Profil";
include 'header.php';
include 'db.php';
?>
<div id="settings">
	<section id="title">
		<h1>Einstellungen</h1>
	</section>
	<section class="settings">
		<form class="settings" action="includes/settings.inc.php" method="post" enctype="multipart/form-data">
			<input type="text" name="username" placeholder="Benutzername"><br>
			<input type="email" name="email" placeholder="E-Mail"><br>
			<input type="password" name="password" placeholder="Neues Passwort"><br>
			<input type="password" name="confirmpassword" placeholder="Bestaetige neues Passwort"><br>
			<input type="text" name="first" placeholder="Vorname"><br>
			<input type="text" name="last" placeholder="Nachname"><br>
			<input type="text" name="ort" placeholder="Wohnort"><br>
			<input type="number" name="plz" placeholder="PLZ"><br>
			<input type="text" name="street" placeholder="Strasse"><br>
			<input type="number" name="strnr" placeholder="Hausnummer"><br>
			<input type="text" name="country" placeholder="Land"><br>
			<select name="gender">
				<option selected="selected" value="null">Geschlecht</option>
				<option value="male">maennlich</option>
				<option value="female">weiblich</option>
			</select>
			<input type="hidden" name="MAX_FILE_SIZE" value="50000000"><br> <!-- Maximal 50 Megabyte -->
			<input type="file" name="pic" placeholder="Profilbild"><br>
			<input type="submit" name="safe" placeholder="speichern"><br><br>
		</form>
		<a href="includes/delete.inc.php">Account loeschen</a>
	</section>
</div>
<?php include 'footer.php'; ?>

</body>
</html>
