<div class="commentForm<?php echo $actid; ?>">
  <textarea></textarea>
  <button type="button" onclick="postComment()">Kommentieren</button>
</div>
<script>
  function postComment(){
    $.ajax({
      type:'post',
      url:'includes/comment.inc.php',
      datatype: 'json',
      data: {
        id: '<?php echo $_SESSION['id']; ?>',
        actid: '<?php echo $actid; ?>',
        //commentText: 
        username: '<?php 
          $id=$_SESSION['id'];
          $sql="SELECT * FROM users WHERE id='$id'";
          $result=$conn->query($sql);
          $rowUser=$result->fetch_assoc();
          $usernam=$rowUser['username'];
          echo $username; 
        ?>',
      },
      complete: function (response) {
        $("#comments").append("<div id='commentLine'><p class='comment'><b>"+username+"</b>"+commentText);
      },
    });
  }
</script>