function like(actid){
  /**
   * call like.inc
   */
  $.ajax({
    type:'post',
    url:'includes/like.inc.php',
    datatype: 'json',
    data: {
      userid: userid,
      actid: actid
    },
    success: function(data){
      /**
       * switch like button
       */
      $('#likeButton'+actid).html("<button class='unlike' type='button' onclick='unlike("+actid+")'></button>");
      $('#likeCounter'+actid).html(data);
    }
  });
  return false;
}