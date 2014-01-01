
	<div id="footer" class="col-md-12 col-lg-12 col-sm-12">
	
		<p class="pull-right"><a href="#" class="btn btn-info btn-sm btn-backtop"><i class="glyphicon glyphicon-chevron-up"></i> Back to top</a></p>
	
		<?php $executionTime = $this->getExecutionTime();  $pagePerSecond = 1000/$executionTime; ?>
		
		<p>Page generated in <strong><?php echo sprintf( "%.5f", $executionTime ); ?></strong> seconds
		/ <strong><?php echo sprintf( "%d", $pagePerSecond ); ?></strong> pages per second. Memory usage: 
		<?php echo helper::bytesToSize(memory_get_usage()); ?><br />
		COMS powered by <a href="http://twitter.github.com/bootstrap/">Twitter Bootstrap</a> and <a href="https://github.com/aryoxp/panadalite" target="_blank">Panadalite Framework</a>. Version 2.0
		&copy; 2006-<?php echo date("Y"); ?> <a href="http://aryo.info">Aryo Pinandito</a>
		</p>
		
	</div>
	
    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="<?php echo $this->asset("js/jquery.js"); ?>"></script>
    <script src="<?php echo $this->asset("bootstrap/js/bootstrap.min.js"); ?>"></script>
    <script src="<?php echo $this->asset("js/base.js"); ?>"></script>
    <?php
;
        if(is_array($scripts) and count($scripts)) {
            foreach( $scripts as $s) : ?><script src="<?php echo preg_match('/^http/i', $s)? $s : $this->asset($s); ?>"></script>
    <?php
            endforeach;
        }

        if( isset($mscripts) and is_array($mscripts) and count($mscripts)) {
            foreach( $mscripts as $s) : ?><script src="<?php echo preg_match('/^http/i', $s)? $s : $this->asset($s, true); ?>"></script>
            <?php endforeach;
        }
    ?>

    </body>
</html>