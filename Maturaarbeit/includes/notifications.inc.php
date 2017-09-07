<?php
  $id = $_SESSION['id'];
  $sqlNotifications = "SELECT * FROM followers WHERE followedID='$id' AND messageChecked='0'";
  $result = $conn->query($sql);
  $rownr = $result->num_rows;
  if($rownr>0){
    $rows = resultToArray($result);
    $result->free();
    foreach($rows as $row) {
      echo $row['message'];
      echo "<br>";
    }
  }
?>