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
        $("#comments"+actid).append("<div id='commentLine"+commentid+"' class='commentLine><p class='comment'><b>"+username+"</b> "+commentText+"<div id='deleteComment"+commentid+" class='deleteComment'><button type='button' onclick='deleteComment("+commentid+")'>Kommentar löschen</button></div><script src='javascript/deleteComment.js'></script>");
        document.getElementById("comment"+actid).value="";
      }
    });
  }
  return false;
}