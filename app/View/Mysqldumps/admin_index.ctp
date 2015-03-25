<h2>Backup Cơ sở dữ liệu</h2>

<?php echo $this->Html->link('Tạo mới bản sao lưu CSDL ngay !', array('action' => 'backup'), array('class' => 'btn btn-primary')); ?>

<br />
<br />

<table class="table-striped table-bordered table-condensed table-hover">
<?php foreach ($files as $file) : ?>
<tr>
<td><?php echo $this->Html->link($file, '/backups/' . $file); ?></td>
<td><?php echo filesize(WWW_ROOT . 'backups/' . $file); ?> KB</td>
<td>
<br />
<?php
echo $this->Form->create('mysqldump', array('action' => 'delete', 'type' => 'POST'));
echo $this->Form->hidden('file', array('value' => $file));
echo $this->Form->button('Xóa', array('class' => 'btn btn-danger'));
echo $this->Form->end();
?>
</td>
</tr>
<?php endforeach; ?>
</table>