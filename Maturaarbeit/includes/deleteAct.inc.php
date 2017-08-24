<?php
  include '../db.php';
  //deletes xml file
  $name = $_GET['name'];
  $sql = "SELECT * FROM activities WHERE filename='$name'";
  $result = mysqli_query($conn, $sql);
  $row = mysqli_fetch_assoc($result);

  $path = "../".$row['actPath'];
  echo $path;
  unlink($path);

  $sql = "DELETE FROM activities WHERE filename='$name'";
  $result = mysqli_query($conn, $sql);
  header("location: ../profile.php");
?>
