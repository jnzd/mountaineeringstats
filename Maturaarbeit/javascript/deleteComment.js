function deleteComment(commentid){
  /**
   * call deleteComment.inc
   */
  console.log(commentid);
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
      console.log(commentid);
    }
  });
  return false;
}