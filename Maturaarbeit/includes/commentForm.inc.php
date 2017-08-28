<div id="comment">
  <form id="comment" action="javascript:comment()" method="post" enctype="multipart/form-data">
    <input type="text" name="comment" placeholder="Kommentar hinzufügen"><br>
    <input type="hidden" name="" value=""><br> 
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
          //comment: '<?php echo $_POST['comment']; ?>'
        }
      });
      return false;
    }
  </script>