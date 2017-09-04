<a href="profile.php"><img class="circle" src="<?php echo $profilepic;?>" height="120" width="120"></a>
<?php
  $sql = "SELECT * FROM users WHERE id='$id'";
  $result = mysqli_query($conn, $sql);
  $row = mysqli_fetch_assoc($result);
  $userID = $row['id'];
  $username = $row['username'];
  include 'includes/followerNumbers.inc.php';
  echo "<h1>".$username."</h1>";
?>
<a href='settings.php'><img src="icons/gear.png" height="24" width="24"></a>
<a href='profileinfo.php'><img src="icons/info.png" height="24" width="24"></a>

<div id="bio">

</div>