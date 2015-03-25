<div class="attachfiles form">

	<div class="row">		
		<div class="col-md-12">		
		<div class="panel panel-default">
		<div class="panel-heading"><?php echo __('Add Attachfile'); ?></div>
						<div class="panel-body">
			<form action="/attachfiles/upload" class="dropzone"></form>
		</div>
		</div>
		</div><!-- end col md 12 -->
	</div><!-- end row -->
</div>
<link type="text/css" rel="stylesheet" href="/vendors/dropzone/css/dropzone.css">
<?php
$this->Html->script('/vendors/dropzone/js/dropzone', array('block' => 'scriptBottom','inline' => false));
$this->Html->script('form-dropzone-file-upload', array('block' => 'scriptBottom','inline' => false));
?>
