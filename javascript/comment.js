function postComment(actid){
  var commentText=document.getElementById("comment"+actid).value;
  /**
  * check whether the textbox is empty
  * .trim is needed in case a user only entered spaces, which should not be posted
  */
  if(jQuery.trim(commentText).length>0){
    /**
     * call comment.inc
     */
    $.ajax({
      type: 'post',
      url: 'includes/comment.inc.php',
      datatype: 'json',
      data: {
        id: id,
        actid: actid,
        commentText: commentText
      },
      success: function(data){
        var commentid = data;
        $("#comments"+actid).append("<div id='commentLine"+commentid+"'><div class='commentLine'><p class='comment'><p class='comment'><a class='usernameLink' href='"+username+"'><b class='commentUsername'>"+username+"</b></a>&nbsp;<div class='commentText'> "+commentText+"</div></p><div id='deleteComment"+commentid+"' class='deleteComment'><button class='deleteCommentButton' type='button' onclick='deleteComment("+commentid+")'></button></div></div><script src='javascript/deleteComment.js'></script>");
        document.getElementById("comment"+actid).value="";
      }
    });
  }
  return false;
}