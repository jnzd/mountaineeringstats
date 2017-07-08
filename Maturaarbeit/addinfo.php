<?php
$title="Profil";
include 'header.php';
include 'db.php';

$sql = "SELECT * FROM users WHERE id='$id'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

//Speichert die jetzigen Angaben aus der Datenbank
$username = $row['username'];
$email = $row['email'];
$password = $row['password'];
$first = $row['first'];
$last = $row['last'];
$ort = $row['ort'];
$plz = $row['plz'];
$gender = $row['gender'];
$street = $row['street'];
$strnr = $row['strnr'];
$pic_path = $row['pic_path'];
$country = $row['country'];
$birthdate = $row['birthdate'];

?>
<div id="settings">
	<section class="settings">
		<form id="settings" action="includes/moreinfo.inc.php" method="post">
			<?php
				if(!isset($first))
				{
					echo "<input type='text' name='first' placeholder='Vorname'><br>";
				}
				if(!isset($last))
				{
					echo "<input type='text' name='last' placeholder='Nachname'><br>";
				}
				if(!isset($ort))
				{
					echo "<input type='text' name='ort' placeholder='Wohnort'><br>";
				}
				if(!isset($plz))
				{
					echo "<input type='number' name='plz' placeholder='PLZ'><br>";
				}
				if(!isset($street))
				{
					echo "<input type='text' name='street' placeholder='Strasse'><br>";
				}
				if(!isset($streetnumber))
				{
					echo "<input type='number' name='streetnumber' placeholder='Hausnummer'><br>";
				}
				if(!isset($gender))
				{
					echo "<input type='text' name='gender' placeholder='Geschlecht'><br>";
				}
				if(!isset($profilepic))
				{
					echo "<input type='file' name='profilepic' placeholder='Profilbild'><br>";
				}
			?>
			<input type='submit' name='safe' value='speichern'><br><br>
		</form>
	</section>
</div>
</body>
</html>
