<?php
class controller_file extends comscontroller {

	function __construct() {
		parent::__construct();
		
		// this controller requires authentication
		// initialize it
		$this->require_auth('auth');
	}
	
	function uploadform() {
		$this->show('upload-form.php', null, true);
	}
	
	public function upload() {
		$this->show('upload-result.php', null, true);
	}
	
	public function tree() {
		$this->library('jqueryFileTree.php');
	}
}
?>