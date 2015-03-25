
<div class="donvis form">

    <div class="row">		
        <div class="col-md-12">	
            
            <div class="panel panel-default">
                <div class="panel-heading">Thêm Quyết định thành lập đơn vị >><b>Bước 1: Thông tin đơn vị được thành lập</b></div>
                <div class="panel-body">
                    <?php echo $this->Form->create('Donvi', array('role' => 'form', 'formStyle' => 'horizontal2', 'url' => Router::url(null, true))); ?>
                    <?php echo $this->Form->input('name', array('class' => 'form-control', 'label' => 'Tên đơn vị', 'required' => false)); ?>
                    <?php
                    echo $this->Form->input('loai_don_vi', array(
                        'options' => array(
                            'KHOA' => 'Khoa',
                            'PHONG' => 'Phòng',
                            'TRUNG_TAM' => 'Trung tâm',
                            'BO_MON' => "Bộ môn",
                            'BAN' => 'Ban',
                            'CHI_NHANH' => 'Chi nhánh',
                            'TO' => 'Tổ'
                        ),
                        'class' => 'form-control',
                        'label' => 'Loại đơn vị'));
                    ?>
                    <?php echo $this->Form->input('parent_id', array('empty'=>'--Chọn đơn vị--','options' => $parentDonvis, 'class' => 'form-control', 'label' => 'Trực thuộc')); ?>
                    <?php echo $this->Form->input('sdt', array('class' => 'form-control', 'label' => 'SĐT')); ?>
                    <?php
                    echo $this->Form->input('status', array('type' => 'hidden', 'value' => 'DANG_HOAT_DONG'));
                    /*
                      echo $this->Form->input('status', array('class' => 'form-control', 'label' => 'Trạng thái', 'options' => array(
                      'DANG_HOAT_DONG' => 'Đang hoạt động',
                      'DA_DOI_TEN' => 'Đã đổi tên',
                      'DA_CHIA_TACH' => 'Đã chia tách',
                      'DA_SAP_TACH' => 'Đã sáp nhập',
                      'DA_GIAI_THE' => 'Đã giải thể',
                      )));
                     * 
                     */
                    ?>
                    <?php
                    echo $this->Form->input('root', array('type' => 'hidden', 'value' => 'THANH_LAP_MOI'));
                    /*
                      echo $this->Form->input('root', array('class' => 'form-control', 'label' => 'Nguồn gốc',
                      'options' => array(
                      'THANH_LAP_MOI' => 'Thành lập mới',
                      'TU_CHIA_TACH' => 'Từ chia tách',
                      'TU_SAP_NHAP' => 'Từ sáp nhập',
                      'TU_DOI_TEN' => 'Từ đổi tên')));
                     * 
                     */
                    ?>
                    <?php echo $this->Form->input('chuc_nang', array('class' => 'form-control', 'label' => 'Chức năng')); ?>
                </div>
                <div class="clearfix"></div>

                <div class="form-actions">
                    <div class="btn-toolbar pull-right">
                        <?php echo $this->Form->submit('Kế >>', array('div' => false)); ?>
                        <?php echo $this->Form->submit('Hủy', array('name' => 'Cancel', 'div' => false)); ?>
                    </div>
                    <?php echo $this->Form->end(); ?>
                </div>
            </div>

        </div><!-- end col md 12 -->
    </div><!-- end row -->
</div>