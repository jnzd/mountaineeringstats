<div id="commentForm<?php echo $actid; ?>" class="commentForm">
  <textarea id="comment<?php echo $actid; ?>"></textarea>
  <button type="button" onclick="postComment(<?php echo $actid; ?>)">Kommentieren</button>
</div>
<script>
  function postComment(actid){
    //define variables
    var username='<?php 
      $id=$_SESSION['id'];
      $sql="SELECT * FROM users WHERE id='$id'";
      $result=$conn->query($sql);
      $rowUser=$result->fetch_assoc();
      $usernam=$rowUser['username'];
      echo $username; 
    ?>';
    var commentText=document.getElementById("comment"+actid).value;
    console.log(commentText);
    var actid=actid;
    console.log(actid);
    //ajax script
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
        $("#comments"+actid).append("<div id='commentLine'><p class='comment'><b>"+username+"</b> "+commentText);
        document.getElementById("comment"+actid).value="";
      },
    });
  }
</script>