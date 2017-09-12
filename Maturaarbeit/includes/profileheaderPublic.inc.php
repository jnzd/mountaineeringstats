<div class="profileheader">
  <div class="profilepicture">
    <a href="<?php echo $row['username'];?>"><img class="circle" src="<?php echo $row['pic_path'];?>" height="120" width="120"></a>
  </div>
  <div class="profileInfo">
    <?php
      $userID = $row['id'];
      echo "<h1 class='username'>".$publicUser."</h1>";
      include 'includes/followerNumbers.inc.php';
    ?>
    <div class="followButton" id="followButton">
      <?php
        include 'followButton.inc.php';
      ?>
    </div>
    <div class="bio">

    </div>
  </div>
</div>