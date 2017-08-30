<a href="<?php echo $row['username'];?>"><img class="circle" src="<?php echo $row['pic_path'];?>" height="120" width="120"></a>
<h1>
  <?php
    echo $publicUser;
  ?>
</h1>
<div id="followButton">
<?php
  include 'followButton.inc.php';
?>
</div>
<div id="bio">

</div>