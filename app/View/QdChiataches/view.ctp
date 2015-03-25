<div class="qdChiataches view">


    <div class="row">
        <div class="col-md-12">
            <div class="page-header">
                <h1><?php echo __('Qd Chiatach'); ?></h1>
            </div>
        </div>
        <div class="col-md-12">			
            <table cellpadding="0" cellspacing="0" class="table table-striped">
                <tbody>
                    <tr>
		<th><?php echo __('Soqd'); ?></th>
		<td>
			<?php echo h($qdChiatach['QdChiatach']['soqd']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Nguoi Ky'); ?></th>
		<td>
			<?php echo h($qdChiatach['QdChiatach']['nguoi_ky']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Ngay Ky'); ?></th>
		<td>
			<?php echo h($qdChiatach['QdChiatach']['ngay_ky']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Mieu Ta'); ?></th>
		<td>
			<?php echo h($qdChiatach['QdChiatach']['mieu_ta']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Donvi Moi1'); ?></th>
		<td>
			<?php echo $this->Html->link($qdChiatach['DonviMoi1']['name'], array('controller' => 'donvis', 'action' => 'view', $qdChiatach['DonviMoi1']['id'])); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Donvi Moi2'); ?></th>
		<td>
			<?php echo $this->Html->link($qdChiatach['DonviMoi2']['name'], array('controller' => 'donvis', 'action' => 'view', $qdChiatach['DonviMoi2']['id'])); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Donvi Cu'); ?></th>
		<td>
			<?php echo $this->Html->link($qdChiatach['DonviCu']['name'], array('controller' => 'donvis', 'action' => 'view', $qdChiatach['DonviCu']['id'])); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Created'); ?></th>
		<td>
			<?php echo h($qdChiatach['QdChiatach']['created']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Modified'); ?></th>
		<td>
			<?php echo h($qdChiatach['QdChiatach']['modified']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Id'); ?></th>
		<td>
			<?php echo h($qdChiatach['QdChiatach']['id']); ?>
			&nbsp;
		</td>
</tr>
                </tbody>
            </table>

        </div><!-- end col md 9 -->

    </div>
</div>

