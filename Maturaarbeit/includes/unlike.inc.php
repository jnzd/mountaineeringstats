<?php
	/**
	 * receive data from likebutton
	 * delete ike from database
	 */
  include '../db.php';
	$userID = $_POST['userid'];
  $actID = $_POST['actid'];
  $userID00actID = $userID."00".$actID;
  $sql = "DELETE FROM likes WHERE userID00actID='$userID00actID'";
  $result = $conn->query($sql);
?>