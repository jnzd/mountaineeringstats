<?php
  session_start();
	include '../db.php';
	$id = $_SESSION['id'];
  $actID = $_POST['actID'];
  $commentText = $_POST['commentText'];
	$sql = "INSERT INTO comments (userID, actID, commentText)	VALUES ('$id', '$actID', '$commentText')";
	$result = $conn->query($sql);
	$url = $_POST['url'];
	//header("location: ..".$url);
?>