<?php
  include '../db.php';
	$userID = $_POST['userID'];
  $actID = $_POST['actID'];
  $userID00actID = $userID."00".$actID;
  $sql = "DELETE FROM likes WHERE userID00actID='$userID00actID'";
  $result = $conn->query($sql);
?>