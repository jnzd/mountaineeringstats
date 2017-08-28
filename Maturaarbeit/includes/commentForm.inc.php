<div id="comment">
  <form id="comment" action="comment()" method="post" enctype="multipart/form-data">
    <input type="text" name="comment" placeholder="Kommentar hinzufügen"><br>
    <input type="hidden" name="" value=""><br> 
    <input type="submit" name="send" placeholder="kommentieren" value="kommentieren"><br>
  </form>
</div>
<?php
  
?>
<script>
    function comment() {
      $.ajax({
        type:'post',
        url:'includes/comment.inc.php',
        datatype: 'json',
        data: {
          userID: '<?php echo $userID; ?>',
          actID: '<?php echo $actid; ?>',
          text: '<?php echo $_POST['comment']; ?>'
        }
      });
      return false;
    }
  </script>