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
			<div class="settingsBlock">
				<label class="settingsLabel" for="username">Benutzername</label>
				<input type="text" id="username" name="username" placeholder="Benutzername" value="<?php echo $username; ?>"><br>
			</div>
			<div class="settingsBlock">
				<label class="settingsLabel" for="email">E-Mail</label>
				<input type="email" id="email" name="email" placeholder="E-Mail" value="<?php echo $email; ?>"><br>
			</div>
			<div class="settingsBlock">
				<label class="settingsLabel" for="password">Passwort</label>
				<input type="password" id="password" name="password" placeholder="Neues Passwort"><br>
			</div>
			<div class="settingsBlock">
				<label class="settingsLabel" for="confirmpassword">Passwort bestätigen</label>
				<input type="password" id="confirmpassword" name="confirmpassword" placeholder="Bestätige neues Passwort"><br>
			</div>
			<div class="settingsBlock">
				<label class="settingsLabel" for="first">Vorname</label>
				<input type="text" name="first" id="first" placeholder="Vorname" value="<?php echo $first; ?>"><br>
			</div>
			<div class="settingsBlock">
				<label class="settingsLabel" for="last">Nachname</label>
				<input type="text" name="last" id="last" placeholder="Nachname" value="<?php echo $last; ?>"><br>
			</div>
			<div class="settingsBlock">
				<label class="settingsLabel" for="gender">Geschlecht</label>
				<select id="gender" name="gender">
					<option selected="selected" value="<?php echo $gender; ?>">Bitte wählen</option>
					<option value="male">männlich</option>
					<option value="female">weiblich</option>
				</select>
			</div>
			<div class="settingsBlock">
				<input type="hidden" name="MAX_FILE_SIZE" value="50000000"><br> <!-- Maximal 50 Megabyte -->
				<label class="settingsLabel" for="pic">Profilbild</label>
				<input type="file" id="pic" name="pic" placeholder="Profilbild"><br>
			</div>
			<input type="submit" name="safe" placeholder="speichern"><br><br>
		</form>
		<a class="delete settings" href="includes/delete.inc.php">Account löschen</a>
	</div>
</div>
<?php
  include 'footer.php';
?>
