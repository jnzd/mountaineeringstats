<div id="deleteComment<?php echo $commentID; ?>" class="deleteComment">
  <button type="button" onclick="deleteComment(<?php echo $commentID; ?>)">Kommentar löschen</button>
</div>
<script>
  function deleteComment(commentid){
    /**
     * call deleteComment.inc
     */
    $.ajax({
      type: 'post',
      url: 'includes/deleteComment.inc.php',
      datatype: 'json',
      data: {
        commentID: commentid
      },
      complete: function(){
        /**
         * delete comment from screen
         */
        $("#commentLine"+commentid).html("");
      }
    });
    return false;
  }
</script>