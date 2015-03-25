<div class="qdChiataches index">

    <div class="row">

        <div class="col-md-12">
            <div class="portlet portlet-white">
                <div class="portlet-header pam mbn">
                    <div class="page-header"><?php echo __('Qd Chiataches'); ?></div>
                    <div class="actions">
                        <?php echo $this->Html->link(__('<i class="fa fa-plus"></i>&nbsp;Thêm mới'), array('action' => 'add'), array('escape' => false,'class'=>'btn btn-info btn-sm')); ?>
                    </div>
                </div>
                <div class="portlet-body pan">
                    <table cellpadding="0" cellspacing="0" class="table table-striped">
                        <thead>
                            <tr>
                                                                    <th><?php echo $this->Paginator->sort('soqd'); ?></th>
                                                                    <th><?php echo $this->Paginator->sort('nguoi_ky'); ?></th>
                                                                    <th><?php echo $this->Paginator->sort('ngay_ky'); ?></th>
                                                                    <th><?php echo $this->Paginator->sort('mieu_ta'); ?></th>
                                                                    <th><?php echo $this->Paginator->sort('donvi_moi_1_id'); ?></th>
                                                                    <th><?php echo $this->Paginator->sort('donvi_moi_2_id'); ?></th>
                                                                    <th><?php echo $this->Paginator->sort('donvi_cu_id'); ?></th>
                                                                    <th><?php echo $this->Paginator->sort('created'); ?></th>
                                                                    <th><?php echo $this->Paginator->sort('modified'); ?></th>
                                                                    <th><?php echo $this->Paginator->sort('id'); ?></th>
                                                                <th class="actions"></th>
                            </tr>
                        </thead>
                        <tbody>
                            	<?php foreach ($qdChiataches as $qdChiatach): ?>
					<tr>
						<td><?php echo h($qdChiatach['QdChiatach']['soqd']); ?>&nbsp;</td>
						<td><?php echo h($qdChiatach['QdChiatach']['nguoi_ky']); ?>&nbsp;</td>
						<td><?php echo h($qdChiatach['QdChiatach']['ngay_ky']); ?>&nbsp;</td>
						<td><?php echo h($qdChiatach['QdChiatach']['mieu_ta']); ?>&nbsp;</td>
								<td>
			<?php echo $this->Html->link($qdChiatach['DonviMoi1']['name'], array('controller' => 'donvis', 'action' => 'view', $qdChiatach['DonviMoi1']['id'])); ?>
		</td>
								<td>
			<?php echo $this->Html->link($qdChiatach['DonviMoi2']['name'], array('controller' => 'donvis', 'action' => 'view', $qdChiatach['DonviMoi2']['id'])); ?>
		</td>
								<td>
			<?php echo $this->Html->link($qdChiatach['DonviCu']['name'], array('controller' => 'donvis', 'action' => 'view', $qdChiatach['DonviCu']['id'])); ?>
		</td>
						<td><?php echo h($qdChiatach['QdChiatach']['created']); ?>&nbsp;</td>
						<td><?php echo h($qdChiatach['QdChiatach']['modified']); ?>&nbsp;</td>
						<td><?php echo h($qdChiatach['QdChiatach']['id']); ?>&nbsp;</td>
						<td class="actions">
							<?php echo $this->Html->link('<span class="glyphicon glyphicon-search"></span>', array('action' => 'view', $qdChiatach['QdChiatach']['id']), array('escape' => false)); ?>
							<?php echo $this->Html->link('<span class="glyphicon glyphicon-edit"></span>', array('action' => 'edit', $qdChiatach['QdChiatach']['id']), array('escape' => false)); ?>
							<?php echo $this->Form->postLink('<span class="glyphicon glyphicon-remove"></span>', array('action' => 'delete', $qdChiatach['QdChiatach']['id']), array('escape' => false), __('Are you sure you want to delete # %s?', $qdChiatach['QdChiatach']['id'])); ?>
						</td>
					</tr>
				<?php endforeach; ?>
                        </tbody>
                    </table>
                    <div class="portlet-footer pam">
                        <p>
                            <small><?php echo $this->Paginator->counter(array('format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')));?></small>
                        </p>

                        <?php
			$params = $this->Paginator->params();
			if ($params['pageCount'] > 1) {
			?>
                        <ul class="pagination pagination-sm">
                            	<?php
					echo $this->Paginator->prev('&larr; Previous', array('class' => 'prev','tag' => 'li','escape' => false), '<a onclick="return false;">&larr; Previous</a>', array('class' => 'prev disabled','tag' => 'li','escape' => false));
					echo $this->Paginator->numbers(array('separator' => '','tag' => 'li','currentClass' => 'active','currentTag' => 'a'));
					echo $this->Paginator->next('Next &rarr;', array('class' => 'next','tag' => 'li','escape' => false), '<a onclick="return false;">Next &rarr;</a>', array('class' => 'next disabled','tag' => 'li','escape' => false));
				?>
                        </ul>
                        <?php } ?>
                    </div>
                </div>
            </div> <!-- end col md 9 -->
        </div><!-- end row -->


    </div><!-- end containing of content -->