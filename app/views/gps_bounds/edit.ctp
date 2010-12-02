<div class="gpsBounds form">
<?php echo $this->Form->create('GpsBound');?>
	<fieldset>
 		<legend><?php __('Edit Gps Bound'); ?></legend>
	<?php
		echo $this->Form->input('id');
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

		<li><?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('GpsBound.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('GpsBound.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Gps Bounds', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Gps Units', true), array('controller' => 'gps_units', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Gps Unit', true), array('controller' => 'gps_units', 'action' => 'add')); ?> </li>
	</ul>
</div>