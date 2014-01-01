<?php

class hello_home extends comsmodule {
	
	public function __construct($coms) {
		parent::__construct($coms);
	}
	
	public function path() {
		$this->head();
		echo "Hello, from hello home path!";
		$this->foot();
	}
	
	public function index() {
        $this->view('home.php');
		//$this->head();
		//echo "Hello, from index!";
		//$this->foot();
	}
}