
<div id="commentForm<?php echo $actid; ?>" class="commentForm">
  <textarea class="commentBox autogrow-short" id="comment<?php echo $actid; ?>" onkeypress="submitCheck(<?php echo $actid; ?>);" placeholder="Kommentar schreiben" rows="1"></textarea>
</div>
<script src="javascript/autogrow.js" type="text/javascript"></script> 
<script>
    $("#comment"+<?php echo $actid; ?>).autogrow();
</script>
<script>
  var username='<?php 
    $id=$_SESSION['id'];
    $sql="SELECT * FROM users WHERE id='$id'";
    $result=$conn->query($sql);
    $rowUser=$result->fetch_assoc();
    $usernam=$rowUser['username'];
    echo $username;
  ?>';
  var id='<?php echo $_SESSION['id']; ?>';
  function submitCheck(actid) {
    var key = window.event.keyCode;
    // If the user has pressed enter
    if (key === 13) {
      postComment(actid);
    }
  }
</script>
<script src="javascript/deleteComment.js"></script>
<script src="javascript/comment.js"></script>