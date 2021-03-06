<div class="gpsPositions index">
	<h2><?php __('Gps Positions');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('gps_unit_id');?></th>
			<th><?php echo $this->Paginator->sort('latitude');?></th>
			<th><?php echo $this->Paginator->sort('longitude');?></th>
			<th><?php echo $this->Paginator->sort('created');?></th>
			<th><?php echo $this->Paginator->sort('modified');?></th>
			<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($gpsPositions as $gpsPosition):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $gpsPosition['GpsPosition']['id']; ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($gpsPosition['GpsUnit']['name'], array('controller' => 'gps_units', 'action' => 'view', $gpsPosition['GpsUnit']['id'])); ?>
		</td>
		<td><?php echo $gpsPosition['GpsPosition']['latitude']; ?>&nbsp;</td>
		<td><?php echo $gpsPosition['GpsPosition']['longitude']; ?>&nbsp;</td>
		<td><?php echo $gpsPosition['GpsPosition']['created']; ?>&nbsp;</td>
		<td><?php echo $gpsPosition['GpsPosition']['modified']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $gpsPosition['GpsPosition']['id'])); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $gpsPosition['GpsPosition']['id'])); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $gpsPosition['GpsPosition']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $gpsPosition['GpsPosition']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%', true)
	));
	?>	</p>

	<div class="paging">
		<?php echo $this->Paginator->prev('<< ' . __('previous', true), array(), null, array('class'=>'disabled'));?>
	 | 	<?php echo $this->Paginator->numbers();?>
 |
		<?php echo $this->Paginator->next(__('next', true) . ' >>', array(), null, array('class' => 'disabled'));?>
	</div>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Gps Position', true), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Gps Units', true), array('controller' => 'gps_units', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Gps Unit', true), array('controller' => 'gps_units', 'action' => 'add')); ?> </li>
	</ul>
</div>