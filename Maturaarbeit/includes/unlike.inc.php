<?php
  include '../db.php';
	$userID = $_POST['userID'];
	$actID = $_POST['actID'];
  
  $sql = "DELETE FROM likes WHERE userID='$userID' AND actID='$actID'";
  $result = mysqli_query($conn, $sql);
?>