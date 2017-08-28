<?php
	include '../db.php';
	$userID = $_POST['userID'];
  $actID = $_POST['actID'];
  $userID00actID = $userID."00".$actID;
  
	$sql = "INSERT INTO likes (userID, actID, userID00actID)	VALUES ('$userID', '$actID', '$userID00actID')";
	$result = $conn->query($sql);
?>