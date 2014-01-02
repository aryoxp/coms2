<div class="row">
	<div class="col-sm-6 col-sm-offset-3">
		<div class="">
		<div style="font-size: 1.5em; margin: 1em 0;">Woops! COMS Installation Fail.</em></div>
				
		<div class="well">
			<p>Some part of COMS installation were fails. We were fail in executing the following queries: </p>
			<ul>
				<?php foreach ($fails as $s) {
					echo '<li>'.$s.'</li>';
				}
				?>
			</ul>
			<p>You may want to check your COMS configuration in <code>coms/config.php</code> file or you may try again.</p>
			<a class="btn btn-warning" href="<?php echo $this->location('install'); ?>">Reinstall</a>
		</div>
		
		</div>
	</div>
</div>