<?php
  include '../db.php';
  //deletes xml file
  unlink('../'.$path);
  $sql = "DELETE FROM activities WHERE id='$actid'";
  $result = mysqli_query($conn, $sql);
  header("location: ../profile.php");
?>
