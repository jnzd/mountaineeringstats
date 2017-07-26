<?php
  include '../db.php';
  unlink('../'.$path);
  $sql = "DELETE FROM activities WHERE id='$actid'";
  $result = mysqli_query($conn, $sql);
  header("location: ../profile.php");
?>
