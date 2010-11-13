<div class="gpsPositions form">
<?php echo $this->Form->create('GpsPosition');?>
	<fieldset>
 		<legend><?php __('Edit Gps Position'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('gps_unit_id');
		echo $this->Form->input('latitude');
		echo $this->Form->input('longitude');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('GpsPosition.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('GpsPosition.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Gps Positions', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Gps Units', true), array('controller' => 'gps_units', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Gps Unit', true), array('controller' => 'gps_units', 'action' => 'add')); ?> </li>
	</ul>
</div>