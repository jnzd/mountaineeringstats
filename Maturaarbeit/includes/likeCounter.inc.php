<div id="likeCounter<?php echo $actid; ?>" class="likeCounter">
  <?php
    $likes = 0;
    $sql = "SELECT * FROM likes WHERE actID = '$actid'";
    $result = $conn->query($sql);
    $likes = $result->num_rows;
    if($likes>0){
      if($likes>1){
        echo "<b>".$likes."</b> Likes";
      }else{
        echo "<b>".$likes."</b> Like";
      }
    }
  ?>
</div>