<script>
    var mockFile = {};
</script>
<?php
echo $this->Html->script('/vendors/dropzone/js/dropzone');
echo $this->Html->script('upload_attachment');
echo $this->Html->css('/vendors/dropzone/css/dropzone.css');
?>
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">Thêm Quyết định thành lập đơn vị >> <b>Bước 2: Thông tin QĐ thành lập</b></div>
            <div class="panel-body">
                <div class="col-md-4 pull-right">
                    <form id="my-dropzone" action="/qtns/attachfiles/upload/QdThanhlap" class="dropzone"></form>
                </div>
                <div class="col-md-8">
                    <?php echo $this->Form->create('QdThanhlap', array('role' => 'form', 'formStyle' => 'horizontal2', 'url' => Router::url(null, true))); ?>
                    <fieldset>
                        <?php
                        echo $this->Form->input('soqd', array('class' => 'form-control', 'label' => 'Số QĐ', 'required' => false));
                        echo $this->Form->input('ngay_ky', array('class' => 'form-control', 'label' => 'Ngày ký', 'required' => false));
                        echo $this->Form->input('attachments', array('type' => 'hidden', 'id' => 'Attachfile'));
                        echo $this->Form->input('nguoi_ky', array('class' => 'form-control', 'label' => 'Người ký', 'required' => false));
                        echo $this->Form->input('mieu_ta', array('class' => 'form-control', 'label' => 'Miêu tả'));
                        ?>
                    </fieldset>
                </div>
                <div class="clearfix"></div>
                <div class="form-actions ">
                    <div class="btn-toolbar pull-right">
                        <?php echo $this->Form->submit('<< Trước', array('name' => 'Previous', 'div' => false)); ?>
                        <?php echo $this->Form->submit('Hoàn tất', array('div' => false)); ?>            
                        <?php echo $this->Form->submit('Hủy', array('name' => 'Cancel', 'div' => false)); ?>
                    </div>
                    <?php echo $this->Form->end(); ?>
                </div>
            </div>

        </div>
    </div>

</div>

