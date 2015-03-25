<?php $this->Js->JqueryEngine->jQueryObject = 'jQuery'; ?>
<?php
$this->Paginator->options(array(
    'url' => array('action' => 'index'),
    'update' => '#datarows',
    'evalScripts' => true,
    'data' => http_build_query($this->request->data),
    'method' => 'POST',
));
?>
<div class="row">
    <h2>Danh sách người dùng</h2>

    <div id="filter">
        <?php
//Search
        echo $this->Form->create(null, array(
            //'method'=>'post',
            //'url' => array_merge(array('action' => 'index'), $this->params['pass']),
            'inputDefaults' => array(
                'div' => 'form-group',
                'label' => false,
                'wrapInput' => false,
                'class' => 'form-control'
            ),
            'class' => 'form-inline',
            'id' => 'search_form'
        ));
        ?>
        <?php
        echo $this->Form->input('last_name', array('label' => false, 'required' => false, 'placeholder' => 'Họ lót'));
        ?>
        <?php
        echo $this->Form->input('first_name', array('label' => false, 'required' => false, 'placeholder' => 'Tên'));
        ?>
        <?php
        echo $this->Form->input('username', array('label' => false, 'placeholder' => 'Username', 'style="width:200px"', 'required' => false));
        ?>
        <?php
        echo $this->Form->input('user_group_id', array('label' => false, 'empty' => 'Nhóm', 'style="width:200px"', 'required' => false
        ));
        ?>
        <button type="submit" class="btn btn-primary btn-sm ladda-button" data-style="expand-right" data-size="l"><span class="ladda-label">Tìm</span></button>
        <?php
        echo $this->Form->end();
        ?>
    </div>
    <div id="datarows">
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
                        echo $this->Html->link(__('edit'), array('admin'=>true,'action' => 'edit', $row['User']['id']), array('escape' => false));
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
    </div>

</div>
<script>
    $("#search_form").submit(function (event) {
        event.preventDefault();
        $.ajax({
            data: $("#search_form").serialize(),
            type: "post",
            success: function (data) {
                $("#datarows").html(data);
            }
        });
    });
</script>
<?php
echo $this->Js->writeBuffer(); // Write cached scripts ?>