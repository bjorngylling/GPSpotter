<?php 
  echo $this->Html->script('http://maps.google.com/maps/api/js?sensor=false');
  
  $this->Html->scriptStart(array('inline' => false));
?>
  var map;
  var markers = new Array();
  var bounds = new Array();
  var path;

  var lastUpdate = false;

  $(document).ready(function(){
    var myOptions = {
      zoom: 14,
      disableDefaultUI: true,
      navigationControl: true,
      center: new google.maps.LatLng(<?php echo $startLat . ", " . $startLng; ?>),
      mapTypeId: google.maps.MapTypeId.ROADMAP
    };

    map = new google.maps.Map(document.getElementById("map-canvas"),
      myOptions);

    $('#auto_update').click(function() {
      loadPositions();
    });
    
    drawMap();
  });

  function drawMap() {
    if($('#auto_update').is(':checked')) {
      clearMap();

      loadPositions(lastUpdate);
      loadBounds(lastUpdate);
    }
    lastUpdate = +new Date();
    setTimeout(drawMap, 10000);
  }

  function loadPositions(lastUpdate) {
    $.getJSON('<?php echo $this->Html->url(array(
        'controller' => 'gps_positions', 
        'action' => 'index', $gpsUnit['GpsUnit']['id'], 
        'ext' => '.json'));?>', 
      { last_update: lastUpdate },
      drawPositions);
  }

  function drawPositions(data) {

    var coordinates = new Array();

    $.each(data, function(i, position) {     
      var latlng = new google.maps.LatLng(position.GpsPosition.latitude, position.GpsPosition.longitude);

      markers.push(
        new google.maps.Marker({
          position: latlng,
          map: map,
          title: "Added at: " + position.GpsPosition.created
        })
      );

      coordinates.push(latlng)
    });
    
    path = new google.maps.Polyline({
      path: coordinates,
      strokeColor: "#00AA00",
      strokeOpacity: 1.0,
      strokeWeight: 2
    });
    path.setMap(map);
  }

  function loadBounds(lastUpdate) {
    $.getJSON('<?php echo $this->Html->url(array(
        'controller' => 'gps_bounds', 
        'action' => 'index', $gpsUnit['GpsUnit']['id'], 
        'ext' => '.json'));?>', 
      { last_update: lastUpdate },
      drawBounds);
  }

  function drawBounds(data) {
    $.each(data, function(i, position) {     
      var latlng = new google.maps.LatLng(position.GpsPosition.latitude, position.GpsPosition.longitude);
      var radius = position.GpsPosition.radius;

      bounds.push(
        new google.maps.Circle({
          center: latlng,
          map: map,
          radius: radius,
          fillColor: "#00FF00",
          fillOpacity: 0.05,
          strokeColor: "#FF0000",
          strokeWeight: 1,
          strokeOpcaity: 0.1
        })
      );
    });
  }

  function clearMap() {
    if(path == null) {
      return false;
    }

    path.setMap(null);

    $.each(markers, function(i, marker) {
      marker.setMap(null);
    });

    $.each(bounds, function(i, bound) {
      bound.setMap(null);
    });
    
  }
<?php
  $this->Html->scriptEnd();
?>

<div id="map-canvas"></div>
<div id="info-pane">
  <label for="auto_update"><input type="checkbox" id="auto_update" name="auto_update" checked="checked" /> Auto-update</label>
  <div class="gpsUnits view">
  <h2><?php  __('Gps Unit');?></h2>
    <dl><?php $i = 0; $class = ' class="altrow"';?>
      <dt<?php if ($i % 2 == 0) echo $class;?>><?php __('User'); ?></dt>
      <dd<?php if ($i++ % 2 == 0) echo $class;?>>
        <?php echo $this->Html->link($gpsUnit['User']['email'], array('controller' => 'users', 'action' => 'view', $gpsUnit['User']['id'])); ?>
        &nbsp;
      </dd>
      <dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Name'); ?></dt>
      <dd<?php if ($i++ % 2 == 0) echo $class;?>>
        <?php echo $gpsUnit['GpsUnit']['name']; ?>
        &nbsp;
      </dd>
      <dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Created'); ?></dt>
      <dd<?php if ($i++ % 2 == 0) echo $class;?>>
        <?php echo $gpsUnit['GpsUnit']['created']; ?>
        &nbsp;
      </dd>
      <dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Modified'); ?></dt>
      <dd<?php if ($i++ % 2 == 0) echo $class;?>>
        <?php echo $gpsUnit['GpsUnit']['modified']; ?>
        &nbsp;
      </dd>
      <dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Number of positions'); ?></dt>
      <dd<?php if ($i++ % 2 == 0) echo $class;?>>
        <?php echo sizeof($gpsUnit['GpsPosition']); ?>
        &nbsp;
      </dd>
    </dl>
  </div>
  <div class="actions">
    <h3><?php __('Actions'); ?></h3>
    <ul>
      <li><?php echo $this->Html->link(__('Edit Gps Unit', true), array('action' => 'edit', $gpsUnit['GpsUnit']['id'])); ?> </li>
      <li><?php echo $this->Html->link(__('Delete Gps Unit', true), array('action' => 'delete', $gpsUnit['GpsUnit']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $gpsUnit['GpsUnit']['id'])); ?> </li>
      <li><?php echo $this->Html->link(__('List Gps Units', true), array('action' => 'index')); ?> </li>
      <li><?php echo $this->Html->link(__('New Gps Unit', true), array('action' => 'add')); ?> </li>
      <li><?php echo $this->Html->link(__('List Users', true), array('controller' => 'users', 'action' => 'index')); ?> </li>
      <li><?php echo $this->Html->link(__('New User', true), array('controller' => 'users', 'action' => 'add')); ?> </li>
      <li><?php echo $this->Html->link(__('List Gps Positions', true), array('controller' => 'gps_positions', 'action' => 'index', $gpsUnit['GpsUnit']['id'])); ?> </li>
      <li><?php echo $this->Html->link(__('New Gps Position', true), array('controller' => 'gps_positions', 'action' => 'add')); ?> </li>
      <li><?php echo $this->Html->link(__('List Gps Bounds', true), array('controller' => 'gps_bounds', 'action' => 'index', $gpsUnit['GpsUnit']['id'])); ?> </li>
      <li><?php echo $this->Html->link(__('New Gps Bounds', true), array('controller' => 'gps_bounds', 'action' => 'add')); ?> </li>
    </ul>
  </div>
</div>
