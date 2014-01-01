<?php $user = $this->session->get('user'); ?>
<div class="col-md-12">
    <fieldset>
        <legend>Change Password</legend>
    </fieldset>
</div>
<div class="col-md-6">
    <h4>Name: <span style="font-weight:normal"><?php echo $user->name; ?></span></h4>
    <form action="<?php echo $this->location('password/update'); ?>" method="post" id="change-password-form" style="margin-top:1em;" class="form-horizontal">
        <fieldset>
            <input type="hidden" name="username" value="<?php echo $user->username; ?>" />
            <div class="well">
                <div class="control-group">
                    <label class="control-label">Current Password:</label>
                    <input class="form-control old-password" name="oldpassword" type="password" />
                </div>
                <div class="control-group">
                    <label class="control-label">New Password:</label>
                    <input class="form-control new-password" name="newpassword" type="password" />
                </div>
                <div class="control-group">
                    <label class="control-label">New Password (again):</label>
                    <input class="form-control new-password2" name="newpassword2" type="password" />
                </div>
            </div>
            <hr>
            <input type="submit" value="Change My Password" class="btn btn-primary btn-update" />
        </fieldset>
    </form>
</div>
<div class="col-md-6">
    <div class="alert alert-info">
        <strong>Warning!</strong><br>Passwords are <strong>cAsE SeNsiTiVe</strong>.
    </div>
</div>