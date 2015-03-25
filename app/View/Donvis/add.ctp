<div class="donvis form">

    <div class="row">		
        <div class="col-md-12">		
            <div class="panel panel-default">
                <div class="panel-heading">Thêm đơn vị</div>
                <div class="panel-body">
                    <?php echo $this->Form->create('Donvi', array('role' => 'form', 'formStyle' => 'horizontal2')); ?>

                    <?php echo $this->Form->input('name', array('class' => 'form-control', 'label' => 'Tên đơn vị')); ?>
                    <?php echo $this->Form->input('sdt', array('class' => 'form-control', 'label' => 'SĐT')); ?>
                    <?php echo $this->Form->input('parent_id', array('class' => 'form-control', 'label' => 'Trực thuộc')); ?>
                    <?php
                    echo $this->Form->input('status', array('class' => 'form-control', 'label' => 'Trạng thái', 'options' => array(
                            'DA_THANH_LAP' => 'Đã thành lập',
                            'DA_DOI_TEN' => 'Đã đổi tên',
                            'DA_CHIA_TACH' => 'Đã chia tách',
                            'DA_SAP_TACH' => 'Đã sáp nhập',
                            'DA_GIAI_THE' => 'Đã giải thể',
                    )));
                    ?>
                    <?php
                    echo $this->Form->input('root', array('class' => 'form-control', 'label' => 'Nguồn gốc',
                        'options' => array(
                            'THANH_LAP_MOI' => 'Thành lập mới',
                            'TU_CHIA_TACH' => 'Từ chia tách',
                            'TU_SAP_NHAP' => 'Từ sáp nhập',
                            'TU_DOI_TEN' => 'Từ đổi tên')));
                    ?>
                    <?php echo $this->Form->input('chuc_nang', array('class' => 'form-control', 'label' => 'Chức năng')); ?>
                </div>
                <div class="clearfix"></div>

                <div class="form-actions">
                    <div class="col-md-offset-3 col-md-9">
                        <button type="submit" class="btn btn-primary">Gửi đi</button>&nbsp;

                        <a href="/s"><button type="button" class="btn btn-green">Hủy bỏ</button></a>
                    </div>
                </div>
            </div>
            </form>
        </div><!-- end col md 12 -->
    </div><!-- end row -->
</div>

<?php
$this->Html->script('form-components', array('block' => 'scriptBottom', 'inline' => false));
$this->Html->script('ui-dropdown-select', array('block' => 'scriptBottom', 'inline' => false));
?>
