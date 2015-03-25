<div class="qdSapnhaps view">


    <div class="row">
        <div class="col-md-12">
            <div class="page-header">
                <h1><?php echo __('Qd Sapnhap'); ?></h1>
            </div>
        </div>
        <div class="col-md-12">			
            <table cellpadding="0" cellspacing="0" class="table table-striped">
                <tbody>
                    <tr>
		<th><?php echo __('Soqd'); ?></th>
		<td>
			<?php echo h($qdSapnhap['QdSapnhap']['soqd']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Nguoi Ky'); ?></th>
		<td>
			<?php echo h($qdSapnhap['QdSapnhap']['nguoi_ky']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Ngay Ky'); ?></th>
		<td>
			<?php echo h($qdSapnhap['QdSapnhap']['ngay_ky']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Mieu Ta'); ?></th>
		<td>
			<?php echo h($qdSapnhap['QdSapnhap']['mieu_ta']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Donvi1'); ?></th>
		<td>
			<?php echo $this->Html->link($qdSapnhap['Donvi1']['name'], array('controller' => 'donvis', 'action' => 'view', $qdSapnhap['Donvi1']['id'])); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Donvi2'); ?></th>
		<td>
			<?php echo $this->Html->link($qdSapnhap['Donvi2']['name'], array('controller' => 'donvis', 'action' => 'view', $qdSapnhap['Donvi2']['id'])); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Donvi Moi'); ?></th>
		<td>
			<?php echo $this->Html->link($qdSapnhap['DonviMoi']['name'], array('controller' => 'donvis', 'action' => 'view', $qdSapnhap['DonviMoi']['id'])); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Created'); ?></th>
		<td>
			<?php echo h($qdSapnhap['QdSapnhap']['created']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Modified'); ?></th>
		<td>
			<?php echo h($qdSapnhap['QdSapnhap']['modified']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Id'); ?></th>
		<td>
			<?php echo h($qdSapnhap['QdSapnhap']['id']); ?>
			&nbsp;
		</td>
</tr>
                </tbody>
            </table>

        </div><!-- end col md 9 -->

    </div>
</div>

