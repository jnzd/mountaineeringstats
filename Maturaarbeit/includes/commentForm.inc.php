<div class="commentForm<?php echo $actid; ?>">
  <textarea></textarea>
  <button type="button" onclick="postComment()">Kommentieren</button>
</div>
<script>
  function postComment(){
    var username='<?php 
      $id=$_SESSION['id'];
      $sql="SELECT * FROM users WHERE id='$id'";
      $result=$conn->query($sql);
      $rowUser=$result->fetch_assoc();
      $usernam=$rowUser['username'];
      echo $username; 
    ?>';
    var commentText='test';
    var actid='<?php echo $actid; ?>';
    $.ajax({
      type:'post',
      url:'includes/comment.inc.php',
      datatype: 'json',
      data: {
        id: '<?php echo $_SESSION['id']; ?>',
        actid: actid,
        commentText: commentText,
        username: username
      },
      complete: function (response) {
        $("#comments"+actid).append("<div id='commentLine'><p class='comment'><b>"+username+"</b>"+commentText);
      },
    });
  }
</script>