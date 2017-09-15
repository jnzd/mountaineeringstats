<?php
  session_start();
	include '../db.php';
	$userID = $_SESSION['id'];
  $actID = $_POST['actID'];
  $commentText = $_POST['commentText'];
  
	$sql = "INSERT INTO comments (userID, actID, text)	VALUES ('$userID', '$actID', '$commentText')";
	$result = $conn->query($sql);
	$url = $_POST['url'];
	//header("location: ..".$url);
?>