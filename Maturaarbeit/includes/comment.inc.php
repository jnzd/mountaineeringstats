<?php
	include '../db.php';
	// real escape string to prevent mysql injections
	$id = $_POST['id'];
  $actid = $_POST['actid'];
  $commentText = $conn->real_escape_string($_POST['commentText']);
	$sql = "INSERT INTO comments (userID, actID, commentText)	VALUES ('$id', '$actid', '$commentText')";
	$result = $conn->query($sql);
?>