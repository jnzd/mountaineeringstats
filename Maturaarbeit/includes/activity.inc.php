<?php
include 'db.php';
include 'parsers/parse.gpx.php';
session_start();
$name = $_GET['name'];
$sql = "SELECT * FROM activities WHERE filename='$name'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

$title = $row['title'];
$actid = $row['id'];
$sport = $row['sport'];
$path = $row['path'];
$type = $row['type'];
$actTime = $row['actTime'];
$description = $row['description'];
echo "<h1>".$title."</h1><br />";
echo "<p>".$description."</p><br />";
gpx($row['actPath']);
echo "<a href='includes/deleteAct.inc.php'>Aktivität löschen</a>";
echo "<br />";
?>
