<div class="gpsUnits form">
<?php echo $this->Form->create('GpsUnit');?>
  <fieldset>
     <legend><?php __('Edit Gps Unit'); ?></legend>
  <?php
    echo $this->Form->input('id');
    echo $this->Form->input('name');
  ?>
  </fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
  <h3><?php __('Actions'); ?></h3>
  <ul>

    <li><?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('GpsUnit.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('GpsUnit.id'))); ?></li>
    <li><?php echo $this->Html->link(__('List Gps Units', true), array('action' => 'index'));?></li>
    <li><?php echo $this->Html->link(__('List Users', true), array('controller' => 'users', 'action' => 'index')); ?> </li>
    <li><?php echo $this->Html->link(__('New User', true), array('controller' => 'users', 'action' => 'add')); ?> </li>
    <li><?php echo $this->Html->link(__('List Gps Positions', true), array('controller' => 'gps_positions', 'action' => 'index')); ?> </li>
    <li><?php echo $this->Html->link(__('New Gps Position', true), array('controller' => 'gps_positions', 'action' => 'add')); ?> </li>
  </ul>
</div>