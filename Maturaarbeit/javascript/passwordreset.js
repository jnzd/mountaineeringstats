function passwordreset(){
  $.ajax({
    type:'post',
    url: 'includes/settingsPasswordReset.inc.php',
    datatype: 'json',
    success: function(data){
      $('#settingsAside').html(data);
      window.history.pushState("", "mountaineeringstats", "/settings.php?sub=password&x=reset");
    }
  });
}