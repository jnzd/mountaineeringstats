<?php
	include '../db.php';
	$id = $_POST['id'];
  $actid = $_POST['actid'];
  $commentText = $_POST['commentText'];
	$sql = "INSERT INTO comments (userID, actID, commentText)	VALUES ('$id', '$actid', '$commentText')";
	$result = $conn->query($sql);
?>