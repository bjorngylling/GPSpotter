<?php 
  echo $this->Html->script('http://maps.google.com/maps/api/js?sensor=false');
  
  $this->Html->scriptStart(array('inline' => false));
?>
  var map;
  var bound;

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
  });

<?php
  $this->Html->scriptEnd();
?>

<div id="map-canvas"></div>

<div class="gpsBounds form">
<?php echo $this->Form->create('GpsBound');?>
	<fieldset>
 		<legend><?php __('Add Gps Bound'); ?></legend>
	<?php
		echo $this->Form->input('gps_unit_id');
		echo $this->Form->input('name');
		echo $this->Form->input('latitude');
		echo $this->Form->input('longitude');
		echo $this->Form->input('radius');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Gps Bounds', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Gps Units', true), array('controller' => 'gps_units', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Gps Unit', true), array('controller' => 'gps_units', 'action' => 'add')); ?> </li>
	</ul>
</div>