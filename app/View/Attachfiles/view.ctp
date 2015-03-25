<div class="attachfiles view">
	<div class="row">
		<div class="col-md-12">
			<div class="page-header">
				<h1><?php echo __('Attachfile'); ?></h1>
			</div>
		</div>
	</div>

	<div class="row">

		<div class="col-md-12">			
			<table cellpadding="0" cellspacing="0" class="table table-striped">
				<tbody>
				<tr>
		<th><?php echo __('Id'); ?></th>
		<td>
			<?php echo h($attachfile['Attachfile']['id']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Name'); ?></th>
		<td>
			<?php echo h($attachfile['Attachfile']['name']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Type'); ?></th>
		<td>
			<?php echo h($attachfile['Attachfile']['type']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Path'); ?></th>
		<td>
			<?php echo h($attachfile['Attachfile']['path']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Vanbanden'); ?></th>
		<td>
			<?php echo $this->Html->link($attachfile['Vanbanden']['tenvanban'], array('controller' => 'vanbandens', 'action' => 'view', $attachfile['Vanbanden']['id'])); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Vanbandi'); ?></th>
		<td>
			<?php echo $this->Html->link($attachfile['Vanbandi']['tenvanban'], array('controller' => 'vanbandis', 'action' => 'view', $attachfile['Vanbandi']['id'])); ?>
			&nbsp;
		</td>
</tr>
				</tbody>
			</table>

		</div><!-- end col md 9 -->

	</div>
</div>

