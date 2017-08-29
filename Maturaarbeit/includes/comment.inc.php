<?php
	include '../db.php';
	$userID = $_POST['userID'];
  $actID = $_POST['actID'];
  $commentText = $_POST['commentText'];
  
	$sql = "INSERT INTO comments (userID, actID, text)	VALUES ('$userID', '$actID', '$commentText')";
	$result = $conn->query($sql);
?>