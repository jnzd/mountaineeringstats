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
    $dateTime = [];//important
    $time = [];
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
          array_push($dateTime, $points->time);
          array_push($difference, $points->difference);
        }     
        $lat_js = json_encode($latitude);
        $long_js = json_encode($longitude);
        $elevation_js = json_encode($elevation);
        $distance_js = json_encode($distance);
      }
    }
    foreach($dateTime as $moment){
      $date = $moment->format('Y-m-d H:i:s');
      array_push($time, $date);
    }
    include 'includes/charts.inc.php';
    include 'includes/map.inc.php';
  }
?>

