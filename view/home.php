<div class="container-fluid">
	<div class="row-fluid">
        <div class="span12" style="padding:1em 0 2em;">
        	<h2 style="padding:0 0 0.5em 0; margin:0 0 0.5em 0; border-bottom:1px solid #CCC;">Dashboard <small>Hello <?php echo $this->authenticatedUser->name; ?>, welcome to COMS2</small></h2>

            <?php
                if(isset($module_dashboard) and is_array($module_dashboard) and count($module_dashboard)) {
                    foreach($module_dashboard as $d)
                        echo $d;
                } else {
                    echo '<p>Please use the top or side menu to start managing website contents.</p>';
                }
            ?>
        </div>        
    </div>
</div>