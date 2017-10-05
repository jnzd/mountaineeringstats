<?php
  include '../db.php';
  //deletes xml file
  $name = $_GET['name'];
  $sql = "SELECT * FROM activities WHERE filename='$name'";
  $result = $conn->query($sql);
  $row = $result->fetch_assoc();
  $path = "../".$row['actPath'];
  echo $path;
  unlink($path);
  $sql = "DELETE FROM activities WHERE filename='$name'";
  $result = $conn->query($sql);
  header("location: ../profile.php");
?>
