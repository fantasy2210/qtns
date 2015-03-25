<?php
$this->Paginator->options(array(
    'update' => '#datarows',
    'evalScripts' => true,
    'data' => http_build_query($this->request->data),
    'method' => 'POST',
));
?>
<table class="table table-condensed">
    <thead>
        <tr>
            <th><?php echo $this->Paginator->sort('id'); ?></th>
            <th><?php echo $this->Paginator->sort('name'); ?></th>

            <th><?php echo $this->Paginator->sort('username'); ?></th>
            <th><?php echo $this->Paginator->sort('email'); ?></th>
            <th><?php echo $this->Paginator->sort('user_group_id'); ?></th>
            <th><?php echo __('active'); ?></th>
            <th><?php echo $this->Paginator->sort('created'); ?></th>
            <th><?php echo __('Action'); ?></th>
        </tr>
    </thead>
    <tbody>
        <?php
        if (!empty($users)) {
            $sl = 0;
            foreach ($users as $row) {
                $sl++;
                echo "<tr>";
                echo "<td>" . $sl . "</td>";
                echo "<td>" . h($row['User']['name']) . "</td>";

                echo "<td>" . h($row['User']['username']) . "</td>";
                echo "<td>" . h($row['User']['email']) . "</td>";
                echo "<td>" . h($row['UserGroup']['name']) . "</td>";

                echo "<td>";
                if ($row['User']['active'] == 1) {
                    echo "Đã kích hoạt";
                } else {
                    echo "Chưa kích hoạt";
                }
                echo"</td>";
                echo "<td>" . date('d-m-Y', strtotime($row['User']['created'])) . "</td>";
                echo "<td>";
                echo $this->Html->link(__('edit'), array('admin' => true, 'action' => 'edit', $row['User']['id']), array('escape' => false));
                echo "<span class='icon'><a href='" . $this->Html->url('/changeUserPassword/' . $row['User']['id']) . "'><img src='" . SITE_URL . "usermgmt/img/password.png' border='0' alt='Change Password' title='Đổi mật khẩu'></a></span>";

                if ($row['User']['active'] == 0) {
                    echo "<span class='icon'><a href='" . $this->Html->url('/usermgmt/users/makeActiveInactive/' . $row['User']['id'] . '/1') . "'><img src='" . SITE_URL . "usermgmt/img/dis-approve.png' border='0' alt='Make Active' title='Make Active'></a></span>";
                } else {
                    echo "<span class='icon'><a href='" . $this->Html->url('/usermgmt/users/makeActiveInactive/' . $row['User']['id'] . '/0') . "'><img src='" . SITE_URL . "usermgmt/img/approve.png' border='0' alt='Make Inactive' title='Make Inactive'></a></span>";
                }
                if ($row['User']['id'] != 1 && $row['User']['username'] != 'Admin') {
                    echo $this->Form->postLink(__('delete'), array('action' => 'delete', $row['User']['id']), array('escape' => false, 'confirm' => __('Bạn chắc chắn xóa ' . $row['User']['name'] . ' ?')));
                }
                echo "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan=10><br/><br/>Không có dữ liệu</td></tr>";
        }
        ?>
    </tbody>
</table>
<p>
    <?php
    echo $this->Paginator->counter(array(
        'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
    ));
    ?>	</p>
<?php echo $this->Paginator->pagination(array('ul' => 'pagination')); ?>
<?php
echo $this->Js->writeBuffer(); // Write cached scripts ?>