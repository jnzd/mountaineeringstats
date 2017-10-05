function profileSettings(){
  $.ajax({
    type:'post',
    url:'includes/profileSettings.inc.php',
    datatype: 'json',
    success: function(data){
      $('#settingsAside').html(data);
    }
  });
}
function profilepic(){
  $.ajax({
    type:'post',
    url:'includes/changeProfilePicForm.inc.php',
    datatype: 'json',
    success: function(data){
      $('#settingsAside').html(data);
    }
  });
}
function password(){
  $.ajax({
    type:'post',
    url:'includes/changePasswordForm.inc.php',
    datatype: 'json',
    success: function(data){
      $('#settingsAside').html(data);
    }
  });
}