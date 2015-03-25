<div class="qdDoitens form">

    <div class="row">		
        <div class="col-md-12">		
            <div class="panel panel-default">
                <div class="panel-heading"><?php echo __('Edit Qd Doiten'); ?></div>
                <div class="panel-body">
                    			<?php echo $this->Form->create('QdDoiten', array('role' => 'form','formStyle' => 'horizontal2')); ?>

                    					<?php echo $this->Form->input('soqd', array('class' => 'form-control'));?>
					<?php echo $this->Form->input('nguoi_ky', array('class' => 'form-control'));?>
					<?php echo $this->Form->input('ngay_ky', array('class' => 'form-control'));?>
					<?php echo $this->Form->input('mieu_ta', array('class' => 'form-control'));?>
					<?php echo $this->Form->input('donvicu_id', array('class' => 'form-control'));?>
					<?php echo $this->Form->input('donvimoi_id', array('class' => 'form-control'));?>
					<?php echo $this->Form->input('id', array('class' => 'form-control'));?>
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
$this->Html->script('form-components', array('block' => 'scriptBottom','inline' => false));
$this->Html->script('ui-dropdown-select', array('block' => 'scriptBottom','inline' => false));
?>
