<?php //var_dump($this->className); ?>

    <a class="btn btn-info btn-sidebar" style="display: block;">
        <span class="glyphicon glyphicon-chevron-left btn-minimize-icon"></span> <span class="btn-minimize-text">Collapse</span>
    </a>

    <div class="panel-group" id="accordion">

        <div class="panel panel-default">
            <div class="panel-heading">
                <?php if($this->className == 'home') $cl = ''; else $cl = ' transparent'; ?>
                <a href="<?php echo $this->location(); ?>">
                    <span class="glyphicon glyphicon-home"></span>
                    <span class="nav-text"> Dashboard</span>
                    <span class="arrow-left pull-right<?php echo $cl; ?>"></span>
                </a>
            </div>
        </div>

        <?php
        if(isset($leftmenus) and is_array($leftmenus) and count($leftmenus)) {
        foreach($leftmenus as $modulemenu) { //var_dump($modulemenu);
            $in = '';
            if($this->className == 'module' and $this->methodName == $modulemenu->id) {
                $cl = '';
                $in = 'in';
            } else $cl = ' transparent';
        ?>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse-<?php echo $modulemenu->id; ?>">
                        <span class="<?php echo $modulemenu->icon; ?>"></span>
                        <span class="nav-text"> <?php echo $modulemenu->label; ?></span>
                        <span class="arrow-left pull-right<?php echo $cl; ?>"></span>
                    </a>
                </div>
                <div id="collapse-<?php echo $modulemenu->id; ?>" class="panel-collapse collapse <?php echo $in; ?>">
                    <div class="panel-body">
                        <ul>
                            <?php foreach($modulemenu->childmenus as $submenu) : ?>
                            <li class="coms-submenu" data-toggle="tooltip" data-placement="right" title="" data-original-title="<?php echo $submenu->label; ?>">
                                <a href="<?php echo $submenu->url; ?>">
                                <span class="<?php echo $submenu->icon; ?>"></span>
                                <span class="nav-text"> <?php echo $submenu->label; ?></span>
                                <span class="arrow-left pull-right transparent"></span>
                                </a>
                            </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
            </div>
        <?php }
        }
        ?>


        <div class="panel panel-default">
            <div class="panel-heading">
                <?php
                $in = '';
                if(($this->className == 'user' and $this->methodName=='profile') || $this->className == 'password') {
                    $cl = '';
                    $in = 'in';
                } else $cl = ' transparent'; ?>
                <a data-toggle="collapse" data-parent="#accordion" href="#collapseProfile">
                    <span class="glyphicon glyphicon-user"></span>
                    <span class="nav-text"> Profile</span>
                    <span class="arrow-left pull-right<?php echo $cl; ?>"></span>
                </a>
            </div>
            <div id="collapseProfile" class="panel-collapse collapse <?php echo $in; ?>">
                <div class="panel-body">
                    <ul>
                        <li class="coms-submenu" data-toggle="tooltip" data-placement="right" title="" data-original-title="My Profile"><a href="<?php echo $this->location('user/profile'); ?>"><i class="glyphicon glyphicon-user"></i> <span class="nav-text">My Profile</span>
                                <span class="arrow-left pull-right transparent"></span>
                            </a></li>
                        <li class="coms-submenu" data-toggle="tooltip" data-placement="right" title="" data-original-title="Change Password"><a href="<?php echo $this->location('password/change'); ?>"><i class="glyphicon glyphicon-qrcode"></i> <span class="nav-text">Change Password</span>
                                <span class="arrow-left pull-right transparent"></span></a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">
                <?php
                $in='';
                if( ($this->className == 'user' and $this->methodName == 'index') ||
                    ($this->className == 'module' and $this->methodName == 'index'))
                {
                    $cl = '';
                    $in = "in";
                } else $cl = ' transparent';
                ?>
                <a data-toggle="collapse" data-parent="#accordion" href="#collapseSettings">
                    <span class="glyphicon glyphicon-cog"></span>
                    <span class="nav-text"> Settings</span>
                    <span class="arrow-left pull-right<?php echo $cl; ?>"></span>
                </a>
            </div>
            <div id="collapseSettings" class="panel-collapse collapse <?php echo $in; ?>">
                <div class="panel-body">
                    <ul>
                    <?php //var_dump($settingmenus);
                        if(isset($settingmenus) and is_array($settingmenus) and count($settingmenus)) {
                        foreach($settingmenus as $smenu) {
                            //var_dump($smenu);
                            ?>
                            <li class="coms-submenu" data-toggle="tooltip" data-placement="right" title="" data-original-title="<?php echo $smenu->label; ?>"><a href="<?php echo $smenu->url; ?>"><i class="glyphicon glyphicon-<?php echo $smenu->icon; ?>"></i> <span class="nav-text"><?php echo $smenu->label; ?></span>
                                    <span class="arrow-left pull-right transparent"></span></a></li>
                            <?php
                        }
                        }
                    ?>
                    <li class="coms-submenu" data-toggle="tooltip" data-placement="right" title="" data-original-title="User Management"><a href="<?php echo $this->location('user'); ?>"><i class="glyphicon glyphicon-user"></i> <span class="nav-text">User Management</span>
                            <span class="arrow-left pull-right transparent"></span></a></li>
                    <li class="coms-submenu" data-toggle="tooltip" data-placement="right" title="" data-original-title="Modules"><a href="<?php echo $this->location('module'); ?>">
                            <i class="glyphicon glyphicon-th"></i> <span class="nav-text">Modules</span>
                            <span class="arrow-left pull-right transparent"></span></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>