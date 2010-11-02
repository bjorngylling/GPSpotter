<?php 
  echo $this->Html->script('http://maps.google.com/maps/api/js?sensor=false');
  
  $this->Html->scriptStart(array('inline' => false));
?>
  $(document).ready(function(){
    var myOptions = {
      zoom: 14,
      disableDefaultUI: true,
      navigationControl: true,
      center: new google.maps.LatLng(58.408889, 15.5625),
      mapTypeId: google.maps.MapTypeId.ROADMAP
    };

    var map = new google.maps.Map(document.getElementById("map-canvas"),
      myOptions);

    var gps_markers = [
    <?php foreach($gps_coordinates as $coord) { ?>
      new google.maps.Marker({
        position: new google.maps.LatLng(<?php echo $coord['lat'] . ", " 
          . $coord['lng'] ?>),
        map: map,
        title: "Added at: <?php echo $coord['time'] ?>"
      }),
    <?php } ?>
    ];

    var gps_coordinates = [
    <?php foreach($gps_coordinates as $coord) { ?>
      new google.maps.LatLng(<?php echo $coord['lat'] . ", " . $coord['lng'] ?>),
    <?php } ?>
    ];

    var gps_path = new google.maps.Polyline({
      path: gps_coordinates,
      strokeColor: "#00AA00",
      strokeOpacity: 1.0,
      strokeWeight: 2
    });
    gps_path.setMap(map);

    var bounds = new google.maps.Circle({
      center: new google.maps.LatLng(58.405393, 15.56875),
      map: map,
      radius: 1000,
      fillColor: "#00FF00",
      fillOpacity: 0.05,
      strokeColor: "#FF0000",
      strokeWeight: 1,
      strokeOpcaity: 0.1
    });

  });
<?php
  $this->Html->scriptEnd();
?>
<div id="map-canvas"></div>
