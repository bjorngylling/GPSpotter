<div class="gpsBounds view">
<h2><?php  __('Gps Bound');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $gpsBound['GpsBound']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Gps Unit'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($gpsBound['GpsUnit']['name'], array('controller' => 'gps_units', 'action' => 'view', $gpsBound['GpsUnit']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Name'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $gpsBound['GpsBound']['name']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Latitude'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $gpsBound['GpsBound']['latitude']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Longitude'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $gpsBound['GpsBound']['longitude']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Radius'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $gpsBound['GpsBound']['radius']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Created'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $gpsBound['GpsBound']['created']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Modified'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $gpsBound['GpsBound']['modified']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Gps Bound', true), array('action' => 'edit', $gpsBound['GpsBound']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Gps Bound', true), array('action' => 'delete', $gpsBound['GpsBound']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $gpsBound['GpsBound']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Gps Bounds', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Gps Bound', true), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Gps Units', true), array('controller' => 'gps_units', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Gps Unit', true), array('controller' => 'gps_units', 'action' => 'add')); ?> </li>
	</ul>
</div>
