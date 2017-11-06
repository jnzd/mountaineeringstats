var discover;
function initMap() {
  map = new google.maps.Map(document.getElementById('discover'), {
    center: {lat: 46.8959, lng: 8.2457},
    zoom: 8
  });
  var i = 0;
  longitude.forEach(function(longitude){
    var marker = new google.maps.Marker({
      position: {lat: latitude[i], lng: longitude},
      map: map,
      url: 'https://mountaineeringstats.com/activity.php?id='+randID[i],
      title: title[i]
    });
    i++;
    google.maps.event.addListener(marker, 'click', function() {
      window.location.href = marker.url;
    });
  });
  
}