function unlike(actid){
  /**
   * call unlike.inc
   */
  $.ajax({
    type:'post',
    url:'includes/unlike.inc.php',
    datatype: 'json',
    data: {
      userid: userid,
      actid: actid
    },
    success: function(data){
      /**
       * switch like button
       */
      $('#likeButton'+actid).html("<button class='like' type='button' onclick='like("+actid+")'></button>");
      $('#likeCounter'+actid).html(data);
    }
  });
  return false;
}