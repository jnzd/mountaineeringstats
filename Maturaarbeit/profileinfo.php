<?php
$title="Profil";
include 'header.php';
$id = $_SESSION['id'];
?>
<div id="info">
<?php
$sql = "SELECT * FROM users WHERE id='$id'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

echo "<h1>".$row['username']."</h1>";

echo "<p>".
"Benutzername: ".$row['username']."<br>".
"E-Mail: ".$row['email']."<br>".
"Vorname: ".$row['first']."<br>".
"Nachname: ".$row['last']."<br>".
"Wohnort: ".$row['ort']."<br>".
"PLZ: ".$row['plz']."<br>".
"Geschlecht: ".$row['gender']."<br>".
"Strasse: ".$row['street']."<br>".
"Hausnummer: ".$row['strnr']."<br>".
"Land: ".$row['country']."<br>".
"Geburtsdatum: ".$row['birthdate']."<br>
</p>";
?>
</div>
<p><a href="includes/delete.inc.php">Account loeschen</a></p>

</body>
</html>