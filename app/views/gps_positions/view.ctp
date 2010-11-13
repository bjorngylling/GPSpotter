<div class="gpsPositions view">
<h2><?php  __('Gps Position');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $gpsPosition['GpsPosition']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Gps Unit'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($gpsPosition['GpsUnit']['name'], array('controller' => 'gps_units', 'action' => 'view', $gpsPosition['GpsUnit']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Latitude'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $gpsPosition['GpsPosition']['latitude']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Longitude'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $gpsPosition['GpsPosition']['longitude']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Created'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $gpsPosition['GpsPosition']['created']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Modified'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $gpsPosition['GpsPosition']['modified']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Gps Position', true), array('action' => 'edit', $gpsPosition['GpsPosition']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Gps Position', true), array('action' => 'delete', $gpsPosition['GpsPosition']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $gpsPosition['GpsPosition']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Gps Positions', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Gps Position', true), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Gps Units', true), array('controller' => 'gps_units', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Gps Unit', true), array('controller' => 'gps_units', 'action' => 'add')); ?> </li>
	</ul>
</div>
