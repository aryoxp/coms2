<!-- Le javascript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="<?php echo $this->asset("js/jquery.js"); ?>"></script>
<script src="<?php echo $this->asset("bootstrap/js/bootstrap.min.js"); ?>"></script>
<script src="<?php echo $this->asset("js/base.js"); ?>"></script>
<?php
;
if(isset($scripts) and is_array($scripts) and count($scripts)) {
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