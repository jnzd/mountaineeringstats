<?php
$conn = mysqli_connect("localhost", "root", "", "maturaarbeit");
if(!$conn)
{
	die("Verbindung gescheitert: ".mysqli_connect_error()); //nur zu Testzwecken
}
?>