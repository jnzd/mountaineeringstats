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
	<a class="settings" href="profile.php">Zurück</a>
	<div class="settingsForm">
		<div class="settingSelectors">
			<ul class="settingsList">
				<li class="selector">
					<a class="selectionLink" onclick="profileSettings()" href="#">Profileinstellungen</a>
				</li>
				<li class="selector">
					<a class="selectionLink" onclick="profilepic()" href="#">Profilbild ändern</a>
				</li>
				<li class="selector">
					<a class="selectionLink" onclick="password()" href="#">Passwort ändern</a>
				</li>
			</ul>
		</div>
		<script src="javascript/settings.js"></script>
		<div class="settingsAside" id="settingsAside">
			<?php
				include 'includes/profilesettings.inc.php';
			?>
		</div>		
	</div>
</div>
<?php
  include 'footer.php';
?>
