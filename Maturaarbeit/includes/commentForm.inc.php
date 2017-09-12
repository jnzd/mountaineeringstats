<div class="commentForm<?php //echo $actid; ?>">
  <form class="commentForm" action="includes/comment.inc.php" method="post" enctype="multipart/form-data">
    <input type="text" id="commentText" name="commentText" placeholder="Kommentar hinzufügen" autocomplete="off"><br>
    <input type="hidden" id="actID" name="actID" value="<?php echo $actid;?>">
    <input type="hidden" id="url" name="url" value="<?php echo $_SERVER['REQUEST_URI'];?>">
  </form>
</div>