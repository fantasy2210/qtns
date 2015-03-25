<div class="donvis view">


    <div class="row">
        <div class="col-md-12">
            <div class="page-header">
                <h1><?php echo __('Donvi'); ?></h1>
            </div>
        </div>
        <div class="col-md-12">			
            <table cellpadding="0" cellspacing="0" class="table table-striped">
                <tbody>
                    <tr>
		<th><?php echo __('Name'); ?></th>
		<td>
			<?php echo h($donvi['Donvi']['name']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Sdt'); ?></th>
		<td>
			<?php echo h($donvi['Donvi']['sdt']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Parent Donvi'); ?></th>
		<td>
			<?php echo $this->Html->link($donvi['ParentDonvi']['name'], array('controller' => 'donvis', 'action' => 'view', $donvi['ParentDonvi']['id'])); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Status'); ?></th>
		<td>
			<?php echo h($donvi['Donvi']['status']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Root'); ?></th>
		<td>
			<?php echo h($donvi['Donvi']['root']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Chuc Nang'); ?></th>
		<td>
			<?php echo h($donvi['Donvi']['chuc_nang']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Lft'); ?></th>
		<td>
			<?php echo h($donvi['Donvi']['lft']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Rght'); ?></th>
		<td>
			<?php echo h($donvi['Donvi']['rght']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Created'); ?></th>
		<td>
			<?php echo h($donvi['Donvi']['created']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Modified'); ?></th>
		<td>
			<?php echo h($donvi['Donvi']['modified']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Id'); ?></th>
		<td>
			<?php echo h($donvi['Donvi']['id']); ?>
			&nbsp;
		</td>
</tr>
                </tbody>
            </table>

        </div><!-- end col md 9 -->

    </div>
</div>

    <div class="related row">
        <div class="col-md-12">
            <h3><?php echo __('Related Donvis'); ?></h3>
    <?php if (!empty($donvi['ChildDonvi'])): ?>
            <table cellpadding = "0" cellspacing = "0" class="table table-striped">
                <thead>
                    <tr>
                        		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Sdt'); ?></th>
		<th><?php echo __('Parent Id'); ?></th>
		<th><?php echo __('Status'); ?></th>
		<th><?php echo __('Root'); ?></th>
		<th><?php echo __('Chuc Nang'); ?></th>
		<th><?php echo __('Lft'); ?></th>
		<th><?php echo __('Rght'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th><?php echo __('Id'); ?></th>
                        <th class="actions"></th>
                    </tr>
                <thead>
                <tbody>
                    	<?php foreach ($donvi['ChildDonvi'] as $childDonvi): ?>
		<tr>
			<td><?php echo $childDonvi['name']; ?></td>
			<td><?php echo $childDonvi['sdt']; ?></td>
			<td><?php echo $childDonvi['parent_id']; ?></td>
			<td><?php echo $childDonvi['status']; ?></td>
			<td><?php echo $childDonvi['root']; ?></td>
			<td><?php echo $childDonvi['chuc_nang']; ?></td>
			<td><?php echo $childDonvi['lft']; ?></td>
			<td><?php echo $childDonvi['rght']; ?></td>
			<td><?php echo $childDonvi['created']; ?></td>
			<td><?php echo $childDonvi['modified']; ?></td>
			<td><?php echo $childDonvi['id']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('<span class="glyphicon glyphicon-search"></span>'), array('controller' => 'donvis', 'action' => 'view', $childDonvi['id']), array('escape' => false)); ?>
				<?php echo $this->Html->link(__('<span class="glyphicon glyphicon-edit"></span>'), array('controller' => 'donvis', 'action' => 'edit', $childDonvi['id']), array('escape' => false)); ?>
				<?php echo $this->Form->postLink(__('<span class="glyphicon glyphicon-remove"></span>'), array('controller' => 'donvis', 'action' => 'delete', $childDonvi['id']), array('escape' => false), __('Are you sure you want to delete # %s?', $childDonvi['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
                </tbody>
            </table>
                <?php endif; ?>

            <div class="actions">
    <?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;New Child Donvi'), array('controller' => 'donvis', 'action' => 'add'), array('escape' => false, 'class' => 'btn btn-default')); ?> 
            </div>
        </div><!-- end col md 12 -->
    </div>
    <div class="related row">
        <div class="col-md-12">
            <h3><?php echo __('Related Qd Thanhlaps'); ?></h3>
    <?php if (!empty($donvi['QdThanhlap'])): ?>
            <table cellpadding = "0" cellspacing = "0" class="table table-striped">
                <thead>
                    <tr>
                        		<th><?php echo __('Soqd'); ?></th>
		<th><?php echo __('Nguoi Ky'); ?></th>
		<th><?php echo __('Ngay Ky'); ?></th>
		<th><?php echo __('Mieu Ta'); ?></th>
		<th><?php echo __('Donvi Id'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th><?php echo __('Id'); ?></th>
                        <th class="actions"></th>
                    </tr>
                <thead>
                <tbody>
                    	<?php foreach ($donvi['QdThanhlap'] as $qdThanhlap): ?>
		<tr>
			<td><?php echo $qdThanhlap['soqd']; ?></td>
			<td><?php echo $qdThanhlap['nguoi_ky']; ?></td>
			<td><?php echo $qdThanhlap['ngay_ky']; ?></td>
			<td><?php echo $qdThanhlap['mieu_ta']; ?></td>
			<td><?php echo $qdThanhlap['donvi_id']; ?></td>
			<td><?php echo $qdThanhlap['created']; ?></td>
			<td><?php echo $qdThanhlap['modified']; ?></td>
			<td><?php echo $qdThanhlap['id']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('<span class="glyphicon glyphicon-search"></span>'), array('controller' => 'qd_thanhlaps', 'action' => 'view', $qdThanhlap['id']), array('escape' => false)); ?>
				<?php echo $this->Html->link(__('<span class="glyphicon glyphicon-edit"></span>'), array('controller' => 'qd_thanhlaps', 'action' => 'edit', $qdThanhlap['id']), array('escape' => false)); ?>
				<?php echo $this->Form->postLink(__('<span class="glyphicon glyphicon-remove"></span>'), array('controller' => 'qd_thanhlaps', 'action' => 'delete', $qdThanhlap['id']), array('escape' => false), __('Are you sure you want to delete # %s?', $qdThanhlap['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
                </tbody>
            </table>
                <?php endif; ?>

            <div class="actions">
    <?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;New Qd Thanhlap'), array('controller' => 'qd_thanhlaps', 'action' => 'add'), array('escape' => false, 'class' => 'btn btn-default')); ?> 
            </div>
        </div><!-- end col md 12 -->
    </div>
