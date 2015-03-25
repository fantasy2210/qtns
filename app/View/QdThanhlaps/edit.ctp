<div class="qdThanhlaps form">
<?php echo $this->Form->create('QdThanhlap'); ?>
	<fieldset>
		<legend><?php echo __('Edit Qd Thanhlap'); ?></legend>
	<?php
		echo $this->Form->input('soqd');
		echo $this->Form->input('nguoi_ky');
		echo $this->Form->input('ngay_ky');
		echo $this->Form->input('mieu_ta');
		echo $this->Form->input('donvi_id');
		echo $this->Form->input('id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('QdThanhlap.id')), array(), __('Are you sure you want to delete # %s?', $this->Form->value('QdThanhlap.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Qd Thanhlaps'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Donvis'), array('controller' => 'donvis', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Donvi'), array('controller' => 'donvis', 'action' => 'add')); ?> </li>
	</ul>
</div>
