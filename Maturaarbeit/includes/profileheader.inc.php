<div class="profileheader">
  <div class="profilepicture">
    <a href="profile.php"><img class="circle" src="<?php echo $profilepic;?>" height="120" width="120"></a>
  </div>
  <div class="profileInfo">
    <?php
      $sql = "SELECT * FROM users WHERE id='$id'";
      $result = mysqli_query($conn, $sql);
      $row = mysqli_fetch_assoc($result);
      $userID = $row['id'];
      $username = $row['username'];
    ?>
    <a href="profile.php" class="profileLink"><h1 class="username"><?php echo $username; ?></h1></a>
    <?php
      include 'includes/followerNumbers.inc.php';
    ?>
    <a href='settings.php'><img src="icons/gear.png" height="24" width="24"></a>
    <?php
      if($profilepic=="profilepics/standard.png"){
        echo "<a href='settings.php?sub=profilepic'>Profilbild hinzufügen</a>";
      }
    ?>
    <div class="bio">

    </div>
  </div>
</div>