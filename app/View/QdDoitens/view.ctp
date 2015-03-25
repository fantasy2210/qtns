<div class="qdDoitens view">


    <div class="row">
        <div class="col-md-12">
            <div class="page-header">
                <h1><?php echo __('Qd Doiten'); ?></h1>
            </div>
        </div>
        <div class="col-md-12">			
            <table cellpadding="0" cellspacing="0" class="table table-striped">
                <tbody>
                    <tr>
		<th><?php echo __('Soqd'); ?></th>
		<td>
			<?php echo h($qdDoiten['QdDoiten']['soqd']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Nguoi Ky'); ?></th>
		<td>
			<?php echo h($qdDoiten['QdDoiten']['nguoi_ky']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Ngay Ky'); ?></th>
		<td>
			<?php echo h($qdDoiten['QdDoiten']['ngay_ky']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Mieu Ta'); ?></th>
		<td>
			<?php echo h($qdDoiten['QdDoiten']['mieu_ta']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Donvicu'); ?></th>
		<td>
			<?php echo $this->Html->link($qdDoiten['Donvicu']['name'], array('controller' => 'donvis', 'action' => 'view', $qdDoiten['Donvicu']['id'])); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Donvimoi'); ?></th>
		<td>
			<?php echo $this->Html->link($qdDoiten['Donvimoi']['name'], array('controller' => 'donvis', 'action' => 'view', $qdDoiten['Donvimoi']['id'])); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Created'); ?></th>
		<td>
			<?php echo h($qdDoiten['QdDoiten']['created']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Modified'); ?></th>
		<td>
			<?php echo h($qdDoiten['QdDoiten']['modified']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Id'); ?></th>
		<td>
			<?php echo h($qdDoiten['QdDoiten']['id']); ?>
			&nbsp;
		</td>
</tr>
                </tbody>
            </table>

        </div><!-- end col md 9 -->

    </div>
</div>

