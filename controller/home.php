<?php

class controller_home extends comscontroller {

    public $module;

	function __construct() {
		parent::__construct();
		$this->require_auth('auth');
        //
	}

    public function autoload_model( $className ) {
        // convert the given class name to it's path
        $classPath = trim( str_replace("_", "/", $className), "/" );
        include_once MODULE . $this->module . "/model/"
            . trim( strstr( $classPath, "/" ), "/" ) .'.php';

    }

	function index() {
		$this->add_script('js/home.js');
        autoloader::register(array($this, 'autoload_model'));
        $modules = $this->get_loadedmodules();
        $data = array();
        foreach($modules as $m) {
            $this->module = $m;
            $dashboard = getcwd()."/modules/".$m."/dashboard.php";
            if(file_exists($dashboard)) {
                ob_start();
                include_once $dashboard;
                $data['module_dashboard'][] = ob_get_flush();
                ob_end_clean();
            }
        }
        $this->show('home.php', $data);
	}

}
