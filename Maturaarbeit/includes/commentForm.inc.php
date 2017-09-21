<div id="commentForm<?php echo $actid; ?>" class="commentForm">
  <textarea class="commentBox" id="comment<?php echo $actid; ?>" placeholder="Kommentar schreiben" rows="1"></textarea>
  <button type="button" onclick="postComment(<?php echo $actid; ?>)">Kommentieren</button>
</div>

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
</script>
<script src="javascript/deleteComment.js"></script>
<script src="javascript/comment.js"></script>