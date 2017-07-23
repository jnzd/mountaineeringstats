<?php
  include '../db.php';
  $id = $_SESSION['id'];
  $sql = "SELECT * FROM activities WHERE user_id='$id'";
  $result = mysqli_query($conn, $sql);
  $row = mysqli_fetch_assoc($result);

  for($row){
    echo $row['actPath'];
    echo "<br />";
  }

  echo "feed";
?>
