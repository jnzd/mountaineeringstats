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
		<div class="settingSelectors">
			<ul class="settingsList">
				<li class="selector">
					<a class="selectionLink" onclick="changeSettings('profilesettingsPrepare', 'profilesettings')" href="#">Profileinstellungen</a>
				</li>
				<li class="selector">
					<a class="selectionLink" onclick="changeSettings('changeProfilePicForm', 'profilepic')" href="#">Profilbild ändern</a>
				</li>
				<li class="selector">
					<a class="selectionLink" onclick="changeSettings('changePasswordForm', 'password')" href="#">Passwort ändern</a>
				</li>
			</ul>
			<script src="javascript/settings.js"></script>
		</div>
		<div class="settingsAside" id="settingsAside">
			<div class="error">
				<?php
					if(isset($_SESSION['error'])){
						echo $_SESSION['error'];
					}
				?>
			</div>
			<?php
				if(isset($_GET['sub'])){
					if($_GET['sub']=="password"){
						if(isset($_GET['x'])){
							if($_GET['x']=="reset"){
								include 'includes/settingsPasswordResetForm.inc.php';
							}else{
								include 'includes/changePasswordForm.inc.php';
							}
						}else{
							include 'includes/changePasswordForm.inc.php';
						}
					}else if($_GET['sub']=="profilepic"){
						include 'includes/changeProfilePicForm.inc.php';
					}else if($_GET['sub']=="profilesettings"){
						include 'includes/profilesettings.inc.php';
					}
				}else{
					include 'includes/profilesettings.inc.php';
				}
			?>
		</div>		
	</div>
</div>
<?php
  include 'footer.php';
?>
