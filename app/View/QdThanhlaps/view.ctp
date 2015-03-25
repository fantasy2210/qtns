<div class="qdThanhlaps view">
<h2><?php echo __('Qd Thanhlap'); ?></h2>
	<dl>
		<dt><?php echo __('Soqd'); ?></dt>
		<dd>
			<?php echo h($qdThanhlap['QdThanhlap']['soqd']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Nguoi Ky'); ?></dt>
		<dd>
			<?php echo h($qdThanhlap['QdThanhlap']['nguoi_ky']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Ngay Ky'); ?></dt>
		<dd>
			<?php echo h($qdThanhlap['QdThanhlap']['ngay_ky']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Mieu Ta'); ?></dt>
		<dd>
			<?php echo h($qdThanhlap['QdThanhlap']['mieu_ta']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Donvi'); ?></dt>
		<dd>
			<?php echo $this->Html->link($qdThanhlap['Donvi']['name'], array('controller' => 'donvis', 'action' => 'view', $qdThanhlap['Donvi']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($qdThanhlap['QdThanhlap']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($qdThanhlap['QdThanhlap']['modified']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($qdThanhlap['QdThanhlap']['id']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Qd Thanhlap'), array('action' => 'edit', $qdThanhlap['QdThanhlap']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Qd Thanhlap'), array('action' => 'delete', $qdThanhlap['QdThanhlap']['id']), array(), __('Are you sure you want to delete # %s?', $qdThanhlap['QdThanhlap']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Qd Thanhlaps'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Qd Thanhlap'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Donvis'), array('controller' => 'donvis', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Donvi'), array('controller' => 'donvis', 'action' => 'add')); ?> </li>
	</ul>
</div>
