<?php
  $likes = 0;
  $sql = "SELECT * FROM likes WHERE actid = '$actid'";
  if($likes>0){
    echo $likes." gefällt das"
  }
?>