<?php
  include '../db.php';
	$followingID00followedID = $_POST['followingID00followedID'];
  
  $sql = "DELETE FROM followers WHERE followingID00followedID='$followingID00followedID'";
  $result = mysqli_query($conn, $sql);
?>
