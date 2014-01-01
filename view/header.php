<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title><?php echo $this->page_title(); ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta http-equiv="cache-control" content="no-cache">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    
    <!-- Le styles -->
    <link href="<?php echo $this->asset("bootstrap/css/bootstrap.min.css"); ?>" rel="stylesheet">
    <link href="<?php echo $this->asset("css/base.css"); ?>" rel="stylesheet">
    <?php $styles = $this->get_styles(); 
        if(is_array( $styles )) :
		foreach($styles as $s) : 
    ?><link href="<?php echo $this->asset($s); ?>" rel="stylesheet">
    <?php
        endforeach;
        endif;
        if( isset($mstyles) and is_array($mstyles)) {
	    foreach( $mstyles as $s) : ?><link href="<?php echo $this->asset($s, true); ?>" rel="stylesheet">
	<?php
        endforeach;
        }
    ?>

    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!-- Le fav and touch icons -->
    <link rel="shortcut icon" href="<?php echo $this->asset('ico/favicon.ico'); ?>">
	
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo $this->asset('ico/apple-touch-icon-114-precomposed.png'); ?>">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo $this->asset('ico/apple-touch-icon-72-precomposed.png'); ?>">
    <link rel="apple-touch-icon-precomposed" href="<?php echo $this->asset('ico/apple-touch-icon-57-precomposed.png'); ?>">
    
    <!-- Le base URL helper for javascript -->
    <script type="text/javascript" src="<?php echo $this->location('coms/js'); ?>"></script>

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
    
  </head>

  <body>