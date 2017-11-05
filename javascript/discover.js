var discover;
function initMap() {
  map = new google.maps.Map(document.getElementById('discover'), {
    center: {lat: 46.8959, lng: 8.2457},
    zoom: 8
  });
  foreach(){

  }
  var i = 1;
  markers.forEach(function(activity){
    var marker = new google.maps.Marker({
      position: activity,
      map: map,
      title: i;
    });
    i++;
  });
  
}