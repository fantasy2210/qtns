<div class="donvis index">

    <div class="row">

        <div class="col-md-12">
            <div class="portlet portlet-white">
                <div class="portlet-header pam mbn">
                    <div class="page-header"><?php echo __('Donvis'); ?></div>
                    <div class="actions">
                        <?php echo $this->Html->link(__('<i class="fa fa-plus"></i>&nbsp;Thêm mới'), array('action' => 'add'), array('escape' => false,'class'=>'btn btn-info btn-sm')); ?>
                    </div>
                </div>
                <div class="portlet-body pan">
                    <table cellpadding="0" cellspacing="0" class="table table-striped">
                        <thead>
                            <tr>
                                                                    <th><?php echo $this->Paginator->sort('name'); ?></th>
                                                                    <th><?php echo $this->Paginator->sort('sdt'); ?></th>
                                                                    <th><?php echo $this->Paginator->sort('parent_id'); ?></th>
                                                                    <th><?php echo $this->Paginator->sort('status'); ?></th>
                                                                    <th><?php echo $this->Paginator->sort('root'); ?></th>
                                                                    <th><?php echo $this->Paginator->sort('chuc_nang'); ?></th>
                                                                    <th><?php echo $this->Paginator->sort('lft'); ?></th>
                                                                    <th><?php echo $this->Paginator->sort('rght'); ?></th>
                                                                    <th><?php echo $this->Paginator->sort('created'); ?></th>
                                                                    <th><?php echo $this->Paginator->sort('modified'); ?></th>
                                                                    <th><?php echo $this->Paginator->sort('id'); ?></th>
                                                                <th class="actions"></th>
                            </tr>
                        </thead>
                        <tbody>
                            	<?php foreach ($donvis as $donvi): ?>
					<tr>
						<td><?php echo h($donvi['Donvi']['name']); ?>&nbsp;</td>
						<td><?php echo h($donvi['Donvi']['sdt']); ?>&nbsp;</td>
								<td>
			<?php echo $this->Html->link($donvi['ParentDonvi']['name'], array('controller' => 'donvis', 'action' => 'view', $donvi['ParentDonvi']['id'])); ?>
		</td>
						<td><?php echo h($donvi['Donvi']['status']); ?>&nbsp;</td>
						<td><?php echo h($donvi['Donvi']['root']); ?>&nbsp;</td>
						<td><?php echo h($donvi['Donvi']['chuc_nang']); ?>&nbsp;</td>
						<td><?php echo h($donvi['Donvi']['lft']); ?>&nbsp;</td>
						<td><?php echo h($donvi['Donvi']['rght']); ?>&nbsp;</td>
						<td><?php echo h($donvi['Donvi']['created']); ?>&nbsp;</td>
						<td><?php echo h($donvi['Donvi']['modified']); ?>&nbsp;</td>
						<td><?php echo h($donvi['Donvi']['id']); ?>&nbsp;</td>
						<td class="actions">
							<?php echo $this->Html->link('<span class="glyphicon glyphicon-search"></span>', array('action' => 'view', $donvi['Donvi']['id']), array('escape' => false)); ?>
							<?php echo $this->Html->link('<span class="glyphicon glyphicon-edit"></span>', array('action' => 'edit', $donvi['Donvi']['id']), array('escape' => false)); ?>
							<?php echo $this->Form->postLink('<span class="glyphicon glyphicon-remove"></span>', array('action' => 'delete', $donvi['Donvi']['id']), array('escape' => false), __('Are you sure you want to delete # %s?', $donvi['Donvi']['id'])); ?>
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