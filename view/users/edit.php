<?php //var_dump($user); ?>
    	<div class="col-sm-9 col-md-9">
            <fieldset>
            <legend>Edit User</legend>
                
                <form action="<?php echo $this->location(); ?>" method="post" id="form-save-user">

					<input type="hidden" name="id" value="<?php echo $user->id; ?>" />
                    <input type="hidden" name="level" value="<?php echo $user->level; ?>" />

                    <div class="form-group">
	                    <label class="control-label">Username</label>
	                    <input class="form-control" type="text" name="username" value="<?php echo $user->username; ?>" />
                    </div>
                    <div class="form-group">
                        <label class="control-label">Name</label>
                        <input class="form-control" type="text" name="name" required="required" id="input-name" value="<?php echo $user->name; ?>" />
                    </div>
                    <div class="control-group">
                        <label class="control-label">E-mail</label>
                        <input class="form-control" type="text" name="email" id="input-email" value="<?php echo $user->email; ?>" />
                    </div>
                    <?php if($this->authenticatedUser->id != $user->id) : ?>
                    <div class="control-group">
                        <label class="control-label">Privileges Level</label>
                        <select name="level">
                        <?php for($level = ((int)$this->authenticatedUser->level)+1; $level <= 10; $level++) { ?>
                        <option value="<?php echo $level; ?>" <?php if($level == $user->level) echo 'selected="selected"'; ?>><?php echo $level; ?></option>
                        <?php } ?>
                        </select>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Status:</label>
                        <div class="controls">
                        <label class="checkbox">
                        <input type="checkbox" value="1" <?php if($user->status) echo 'checked="checked"'; ?> name="status" /> Active</label>
                        </div>
                    </div>    
                    <?php else: ?>
                    <input type="hidden" name="status" value="<?php echo $user->status; ?>" />
                    <?php endif; ?>
                    <hr />
                    <a href="<?php echo $this->location('user'); ?>" class="btn btn-default pull-right"><i class="icon-list"></i> Back to User List</a>
                    <input type="submit" value="Save User Profile" class="btn btn-primary btn-save-user" data-loading-text="Saving..." />

                    <span id="status-save" style="margin-left:1em;">&nbsp;</span>                   
                </form>
                <?php if($this->authenticatedUser->id != $user->id) : ?>
                <a name="password"></a>
                <form action="<?php echo $this->location(); ?>" method="post" id="form-update-password" class="form-horizontal">
                	<input type="hidden" name="id" value="<?php echo $user->id; ?>" />
                    <div class="well">
                    <fieldset>
                    	<legend>Change User Password</legend>
                    	<div class="control-group">
                    	    <label class="control-label">Password</label>
                    	    <div class="controls">
                        	<input type="password" name="password" id="input-password" />
                        	</div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">Password (Again)</label>
                            <div class="controls">
                        	<input type="password" name="password2" id="input-password2" />
                            </div>
                        </div>
                        <hr />
                        <a href="<?php echo $this->location('user'); ?>" class="btn pull-right"><i class="icon-list"></i> Back to User List</a>
                        <input type="submit" value="Change Password" class="btn btn-primary btn-update-password" data-loading-text="Updating..." /><br>
                        <span id="status-password" style="margin-left:1em;">&nbsp;</span>
                    </fieldset>
                    </div>                
            	</form>
                <?php endif; ?>
            </fieldset>
    	</div>
        <div class="col-sm-3 col-md-3">
            <p>Level <span class="badge badge-info"><?php echo $this->authenticatedUser->level; ?></span></p>

            <a href="<?php echo $this->location('password/change'); ?>" class="btn btn-info btn-sm">Change your own password</a>
        </div>