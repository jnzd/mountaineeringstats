<a href="<?php echo $row['username'];?>"><img class="circle" src="<?php echo $row['pic_path'];?>" height="120" width="120"></a>
<?php
  $userID = $row['id'];
  include 'includes/followerNumbers.inc.php';
  echo "<h1>".$publicUser."</h1>";
?>
<div id="followButton">
  <?php
    include 'followButton.inc.php';
  ?>
</div>
<div id="bio">

</div>