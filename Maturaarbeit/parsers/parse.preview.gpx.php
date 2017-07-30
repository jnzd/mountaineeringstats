<?php
  include 'vendor/autoload.php';
  use phpGPX\phpGPX;
  //include '../vendor/autoload.php';
  function gpx($location){
    $gpx = new phpGPX();
    $file = $gpx->load($location);

    //define empty arrays
    $latitude = [];//imprtant
    $longitude = [];//imprtant
    $elevation = [];//important
    $time = [];//important
    $difference = [];//maybe important
    $distance = [];//important

    foreach ($file->tracks as $track){
      $segment = $track->segments;
        foreach ($segment as $segment) {
        $points = $segment->points;
        //fill data arrays
        foreach ($points as $points) {
          array_push($latitude, $points->latitude);
          array_push($longitude, $points->longitude);
          array_push($elevation, $points->elevation);
          array_push($time, $points->time);
          array_push($difference, $points->difference);
        }
        array_push($distance, $points->distance);
        //php arrays to javascript arrays
        $lat_js = json_encode($latitude);
        $long_js = json_encode($longitude);
        $elvation_js = json_encode($elevation);
        $distance_js = json_encode($distance);
        //echo $lat_js;
        //echo $long_js;
        //include 'includes/map.inc.php';
      }
    }
  }
?>
<script async defer
  src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBh619HIPkaPOW76qYCe5_39VpnJRhWu2s&callback=initMap">
</script>
