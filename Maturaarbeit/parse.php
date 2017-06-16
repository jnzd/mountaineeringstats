<?php
$title="Parser";
include 'header.php';
include 'db.php';
?>
	<h1>Parser</h1>
	<?php //gpx test;
	use phpGPX\phpGPX;
	$gpx = new phpGPX();
	$file = $gpx->load('activities/gpx/example.gpx');
	foreach ($file->tracks as $track){
		// Statistics for whole track
		$track->stats->toArray();
		print_r($track);
		/*foreach ($track->segments as $segment)
		{
			// Statistics for segment of track
			$segment->stats->toArray();
			print_r($segment);
		}*/
	}
	?>
  
  <table>
    <tr>
      <th>number</th>
      <th>latitude</th>
      <th>longitude</th>
      <th>elevation</th>
      <th>distance</th>
    </tr>
    <tr>
      <td><?php echo $track->segments->stats->points; ?></td>
      <td><?php  ?></td>
      <td><?php  ?></td>
      <td><?php  ?></td>
      <td><?php  ?></td>
    </tr>
    <tr>
      <td><?php  ?></td>
      <td><?php  ?></td>
      <td><?php  ?></td>
      <td><?php  ?></td>
      <td><?php  ?></td>
    </tr>
    <tr>
      <td><?php  ?></td>
      <td><?php  ?></td>
      <td><?php  ?></td>
      <td><?php  ?></td>
      <td><?php  ?></td>
    </tr>
    <tr>
      <td><?php  ?></td>
      <td><?php  ?></td>
      <td><?php  ?></td>
      <td><?php  ?></td>
      <td><?php  ?></td>
    </tr>
    <tr>
      <td><?php  ?></td>
      <td><?php  ?></td>
      <td><?php  ?></td>
      <td><?php  ?></td>
      <td><?php  ?></td>
    </tr>
    <tr>
      <td><?php  ?></td>
      <td><?php  ?></td>
      <td><?php  ?></td>
      <td><?php  ?></td>
      <td><?php  ?></td>
    </tr>
    <tr>
      <td><?php  ?></td>
      <td><?php  ?></td>
      <td><?php  ?></td>
      <td><?php  ?></td>
      <td><?php  ?></td>
    </tr>
    <tr>
      <td><?php  ?></td>
      <td><?php  ?></td>
      <td><?php  ?></td>
      <td><?php  ?></td>
      <td><?php  ?></td>
    </tr>
    <tr>
      <td><?php  ?></td>
      <td><?php  ?></td>
      <td><?php  ?></td>
      <td><?php  ?></td>
      <td><?php  ?></td>
    </tr>
    <tr>
      <td><?php  ?></td>
      <td><?php  ?></td>
      <td><?php  ?></td>
      <td><?php  ?></td>
      <td><?php  ?></td>
    </tr>
  </table>

</body>
</html>
