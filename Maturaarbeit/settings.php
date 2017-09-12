<?php
	$title="Profil";
	include 'header.php';
	include 'db.php';
	
	$id = $_SESSION['id'];
	$sql = "SELECT * FROM users WHERE id='$id'";
	$result = $conn->query($sql);
	$row = $result->fetch_assoc();
	$username = $row['username'];
	$email = $row['email'];
	$gender = $row['gender'];
	$first = $row['first'];
	$last = $row['last'];
?>
<div class="settings">
	<h1 class="settingsTitle">Einstellungen</h1>
	 <div class="settingsForm">
		<a class="settings" href="profile.php">Zurück</a>
		<form class="settings" action="includes/settings.inc.php" method="post" enctype="multipart/form-data">
			<input type="text" name="username" placeholder="Benutzername" value="<?php echo $username; ?>"><br>
			<input type="email" name="email" placeholder="E-Mail" value="<?php echo $email; ?>"><br>
			<input type="password" name="password" placeholder="Neues Passwort"><br>
			<input type="password" name="confirmpassword" placeholder="Bestätige neues Passwort"><br>
			<input type="text" name="first" placeholder="Vorname" value="<?php echo $first; ?>"><br>
			<input type="text" name="last" placeholder="Nachname" value="<?php echo $last; ?>"><br>
			<select name="gender">
				<option selected="selected" value="<?php echo $gender; ?>">Geschlecht</option>
				<option value="male">männlich</option>
				<option value="female">weiblich</option>
			</select>
			<input type="hidden" name="MAX_FILE_SIZE" value="50000000"><br> <!-- Maximal 50 Megabyte -->
			<input type="file" name="pic" placeholder="Profilbild"><br>
			<input type="submit" name="safe" placeholder="speichern"><br><br>
		</form>
		<a class="delete settings" href="includes/delete.inc.php">Account löschen</a>
	</div>
</div>
<?php
  include 'footer.php';
?>
