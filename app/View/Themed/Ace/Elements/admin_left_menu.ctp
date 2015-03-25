<div id="sidebar" class="sidebar responsive">
    <script type="text/javascript">
        try {
            ace.settings.check('sidebar', 'fixed');
        } catch (e) {
        }
    </script>

    <div class="sidebar-shortcuts" id="sidebar-shortcuts">
        <div class="sidebar-shortcuts-large" id="sidebar-shortcuts-large">
            <button class="btn btn-success">
                <i class="ace-icon fa fa-signal"></i>
            </button>

            <button class="btn btn-info">
                <i class="ace-icon fa fa-pencil"></i>
            </button>

            <button class="btn btn-warning">
                <i class="ace-icon fa fa-users"></i>
            </button>

            <button class="btn btn-danger">
                <i class="ace-icon fa fa-cogs"></i>
            </button>
        </div>

        <div class="sidebar-shortcuts-mini" id="sidebar-shortcuts-mini">
            <span class="btn btn-success"></span>

            <span class="btn btn-info"></span>

            <span class="btn btn-warning"></span>

            <span class="btn btn-danger"></span>
        </div>
    </div><!-- /.sidebar-shortcuts -->

    <ul class="nav nav-list">
        <li class="">
            <a href="<?php echo SUB_DIR . '/admin' ?>">
                <i class="menu-icon fa fa-tachometer"></i>
                <span class="menu-text"> Bàn làm việc </span>
            </a>

            <b class="arrow"></b>
        </li>
        <li class="">
            <a href="#" class="dropdown-toggle">
                <i class="menu-icon fa fa-building"></i>
                <span class="menu-text"> Đơn vị</span>

                <b class="arrow fa fa-angle-down"></b>
            </a>

            <b class="arrow"></b>

            <ul class="submenu">


                <li class="">

                    <?php
                    echo $this->Html->link('<i class="menu-icon fa fa-caret-right"></i>Tất cả', array('plugin' => FALSE,'admin'=>false,  'controller' => 'donvis', 'action' => 'index'), array('escape' => false));
                    ?>

                </li>

                <li class="">

                    <?php
                    echo $this->Html->link('<i class="menu-icon fa fa-caret-right"></i>Thêm QĐ thành lập', '/them-qd-thanh-lap', array('escape' => false));
                    ?>
                </li>

                <li class="">
                    <?php
                    echo $this->Html->link('<i class="menu-icon fa fa-caret-right"></i>Thêm QĐ chia tách', array('plugin' => false, 'admin'=>false,'controller' => 'qd_chiataches', 'action' => 'add'), array('escape' => false));
                    ?>
                </li>

                <li class="">
                    <?php
                    echo $this->Html->link('<i class="menu-icon fa fa-caret-right"></i>Thêm QĐ sáp nhập', array('plugin' => false, 'admin'=>false,'controller' => 'qd_sapnhaps', 'action' => 'add'), array('escape' => false));
                    ?>

                </li>

                <li class="">                    
                    <?php
                    echo $this->Html->link('<i class="menu-icon fa fa-caret-right"></i>Thêm QĐ giải thể', array('plugin' => false, 'admin'=>false,'controller' => 'qd_giaithes', 'action' => 'add'), array('escape' => false));
                    ?>
                </li>
            </ul>
        </li>
        <!--Menu user-->
        <li class="">
            <a href="#" class="dropdown-toggle">
                <i class="menu-icon fa fa-users"></i>
                <span class="menu-text"> Quản trị User </span>

                <b class="arrow fa fa-angle-down"></b>
            </a>

            <b class="arrow"></b>

            <ul class="submenu">


                <li class="">

                    <?php
                    echo $this->Html->link('<i class="menu-icon fa fa-caret-right"></i>Thêm mới', array('plugin' => 'usermgmt', 'admin' => true, 'controller' => 'users', 'action' => 'add'), array('escape' => false));
                    ?>

                </li>

                <li class="">

                    <?php
                    echo $this->Html->link('<i class="menu-icon fa fa-caret-right"></i>Danh sách User', array('plugin' => 'usermgmt', 'admin' => true, 'controller' => 'users', 'action' => 'index'), array('escape' => false));
                    ?>
                </li>

                <li class="">
                    <?php
                    echo $this->Html->link('<i class="menu-icon fa fa-caret-right"></i>Thêm nhóm', array('plugin' => 'usermgmt', 'admin' => true, 'controller' => 'user_groups', 'action' => 'add'), array('escape' => false));
                    ?>
                </li>

                <li class="">
                    <?php
                    echo $this->Html->link('<i class="menu-icon fa fa-caret-right"></i>Danh sách nhóm', array('plugin' => 'usermgmt', 'admin' => true, 'controller' => 'user_groups', 'action' => 'index'), array('escape' => false));
                    ?>

                </li>

                <li class="">                    
                    <?php
                    echo $this->Html->link('<i class="menu-icon fa fa-caret-right"></i>Phân quyền', array('plugin' => 'usermgmt', 'admin' => true, 'controller' => 'UserGroupPermissions', 'action' => 'index'), array('escape' => false));
                    ?>
                </li>
            </ul>
        </li>
        <!--Hết menu user-->

        <li class="">
            <?php
            echo $this->Html->link('<i class="menu-icon fa fa-database"></i>Backup CSDL', array('plugin' => false, 'admin' => true, 'controller' => 'Mysqldumps', 'action' => 'index'), array('escape' => false));
            ?>
        </li>
        <li class="">


            <?php
            echo $this->Html->link(__("profile"), array('admin' => true, 'plugin' => 'usermgmt', 'controller' => 'users', 'action' => 'profile'), array('escape' => false));
            ?>


        </li>

        <li class="">


            <?php
            echo $this->Html->link(__("change_password"), "/changePassword", array('escape' => false));
            ?>


        </li>

        <li class="">


            <?php
            echo $this->Html->link(__("logout"), "/logout", array('escape' => false));
            ?>


        </li>
    </ul><!-- /.nav-list -->

    <div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
        <i class="ace-icon fa fa-angle-double-left" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
    </div>

    <script type="text/javascript">
        try {
            ace.settings.check('sidebar', 'collapsed')
        } catch (e) {
        }
    </script>
</div>