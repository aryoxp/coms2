<?php

class controller_install extends comscontroller {
	public function __construct() {
		parent::__construct();
	}	
	
	public function index() {
	
		$db = new db();
		$db->testConnect();
		$data['connect'] = $db->testConnect();
		$data['db'] = $db->testSelectDb();
		//var_dump($data);
		$db->close();
		
		//$this->view('header-bare.php');
		$this->show('install.php', $data, true);
		//$this->view('footer-bare.php');
		
	}
	
	public function doinstall() {
		$raw = file_get_contents("coms.sql");

		$sqls = explode(";\r\n", $raw);

		//var_dump($sqls);

		$db = new db('default');
		//$this->view('header-bare.php');
		ob_start();
		echo '<div class="row"><div class="col-sm-6 col-sm-offset-3"><div class="well">';
		echo '<button type="button" class="btn btn-danger" data-toggle="collapse" data-target="#log">Show Log</button>';
		echo '<div id="log" class="collapse"><div style="padding:1em">';
		$success = true;
		$fails = array();
		foreach ($sqls as $s) {
			if(trim($s)=='') continue;
				echo '<p>Executing: <span style="font-family:monospace">'.$s.'</span> &mdash; ';
				if($res = $db->query( trim($s) )) {
					echo "OK";
				} else {
					if(preg_match('/^insert/i', $s)) {
						$success = false;
						$fails[] = $s;
					}
					echo "NOK: ".$db->getLastError();
				}
				echo '</p>';
		}
		echo '</div></div></div></div></div>';
		$log = ob_get_clean();
		if( $success )
			$this->show('install-success.php', array('content'=>$log), true);
		else $this->show('install-fail.php', array('fails'=>$fails), true);
		//echo $log;
		//$this->view('footer-bare.php');	
	}
}
