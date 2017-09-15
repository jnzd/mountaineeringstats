<div class="commentForm<?php echo $actid; ?>">
  <textarea></textarea>
  <button type="button" onclick="postComment()">Kommentieren</button>
  <form class="commentForm" action="includes/comment.inc.php" method="post" enctype="multipart/form-data">
    <input type="text" id="commentText" name="commentText" placeholder="Kommentar hinzufügen" autocomplete="off"><br>
    <input type="hidden" id="actID" name="actID" value="<?php echo $actid;?>">
    <input type="hidden" id="url" name="url" value="<?php echo $_SERVER['REQUEST_URI'];?>">
  </form>
</div>
<script>
  function postComment(){
    $.ajax({
      type:'post',
      url:'includes/comment.inc.php',
      datatype: 'json',
      data: {
        id: '<?php echo $actid; ?>',
        actid: '<?php echo $_SERVER['REQUEST_URI']; ?>',
        commentText: 
        actid: '<?php echo $username; ?>'
      },
      complete: function (response) {
        $("#comments").append("<div id='commentLine'><p class='comment'><b>"+username+"</b>"+commentText);
      },
    });
  }
</script>