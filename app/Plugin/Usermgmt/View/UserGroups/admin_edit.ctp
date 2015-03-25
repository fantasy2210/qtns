<?php
echo $this->Form->create('UserGroup', array('action' => 'edit', 'inputDefaults' => array(
        'div' => 'form-group',
        'wrapInput' => false,
        'class' => 'form-control'
    ),
    'class' => 'well'));
?>
<fieldset>
    <legend>Cập nhật nhóm người dùng</legend>
    <?php echo $this->Form->input("id"); ?>
    <?php echo $this->Form->input("name", array('label'=>'Tên nhóm')); ?>
    <?php echo $this->Form->input("alias_name", array('label'=>'Alias','placeholder'=>'Viết liền không dấu')); ?>
    <?php
    if (!isset($this->request->data['UserGroup']['allowRegistration'])) {
        $this->request->data['UserGroup']['allowRegistration'] = true;
    }
    ?>
    <?php echo $this->Form->input("allowRegistration", array('label' => 'Cho phép đăng ký','type'=>'checkbox')); ?>

</fieldset>
<?php echo $this->Form->end('Submit'); ?>
<script>
    document.getElementById("UserUserGroupId").focus();
</script>