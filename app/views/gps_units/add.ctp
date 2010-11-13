<div class="gpsUnits form">
<?php echo $this->Form->create('GpsUnit');?>
	<fieldset>
 		<legend><?php __('Add Gps Unit'); ?></legend>
	<?php
		echo $this->Form->input('name');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Gps Units', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Users', true), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User', true), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Gps Positions', true), array('controller' => 'gps_positions', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Gps Position', true), array('controller' => 'gps_positions', 'action' => 'add')); ?> </li>
	</ul>
</div>