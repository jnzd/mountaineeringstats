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
		<div class="settingSelectors">
			<ul class="settingsList">
				<li class="selector">
					<a class="selectionLink" href="">Profileinstellungen</a>
				</li>
				<li class="selector">
					<a class="selectionLink" href="">Profilbild ändern</a>
				</li>
				<li class="selector">
					<a class="selectionLink" href="">Passwort ändern</a>
				</li>
			</ul>
		</div>
		<div class="settingsAside">
		 <?php
		 	include 'includes/profilesettings.inc.php';
		 ?>
		</div>		
	</div>
</div>
<?php
  include 'footer.php';
?>
