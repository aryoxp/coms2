<!-- Fixed navbar -->
<div class="navbar navbar-default navbar-fixed-top">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="<?php echo $this->location(); ?>">COMS2</a>
        </div>
        <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li class="active"><a href="<?php echo $this->location(); ?>"><span class="glyphicon glyphicon-home"></span></a></li>
            </ul>

            <ul class="nav navbar-nav navbar-right">

                <li class="btn-notification" data-toggle="tooltip" data-placement="left" title="" data-original-title="Show/Hide Notifications">
                    <a href="#">
                        <span class="label label-info"><span class="glyphicon glyphicon-exclamation-sign"></span> <?php echo count($notifications); ?></span></a></li>

                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Settings <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="<?php echo $this->location('user/profile'); ?>"><i class="glyphicon glyphicon-user"></i> My Profile</a></li>

                        <li><a href="<?php echo $this->location('password/change'); ?>"><i class="glyphicon glyphicon-qrcode"></i> Change Password</a></li>
                        <li class="divider"></li>
                        <li><a href="<?php echo $this->location('user'); ?>"><i class="glyphicon glyphicon-user"></i> User Management</a></li>
                        <li><a href="<?php echo $this->location('module'); ?>"><i class="glyphicon glyphicon-th"></i> Modules</a></li>
                        <!--
                        <li class="divider"></li>
                        <li class="dropdown-header">Nav header</li>
                        -->
                    </ul>
                </li>
                <li><a href="<?php echo $this->location('auth/logoff'); ?>" class="btn btn-danger navbar-btn btn-logout"><i class="glyphicon glyphicon-off"></i></a></li>
                <!--
                <li class="active"><a href="./">Fixed top</a></li>
                -->
            </ul>
        </div><!--/.nav-collapse -->
</div>

<div id="notification-container" class="flyover" data-count="<?php echo count($notifications); ?>">
    <?php if(isset($notifications) and is_array($notifications) and count($notifications)) {
        $class = "";
        foreach($notifications as $n) {
            switch($n[1]) {
                case notification::success:
                    $class = "alert-success";
                    break;
                case notification::error:
                    $class = "alert-danger";
                    break;
                case notification::warning:
                    $class = "alert-warning";
                    break;
                default:
                    $class = "alert-info";
            }
            ?>
            <div class="alert <?php echo $class; ?> alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <?php echo $n[0]; ?>
            </div>
            <?php
        }

    }
    if(count($notifications) == 0)
        echo '<span style="text-align:center; display: block;">No Notifications</span>';
    ?>
</div>