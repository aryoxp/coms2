<?php

class comsmodule extends comscontroller {
	
	private $module = NULL;
	private $coms = NULL;
	private $styles = array();
	private $scripts = array();

    private $sidebar;
    private $comsmodules;
	
	public function __construct($coms = NULL) {
		if( $coms !== NULL ) {
			$this->module = $coms->module;
			$this->coms = $coms;
		} else {
			echo "Error: The required COMS argument was not found on module constructor!";
			exit;
		}
		
		$mmodule = new model_module();
		$this->comsmodules = $mmodule->getAllActiveModules();
		
		parent::__construct();
	}
	
	public function head() {
		//var_dump($this->coms);

        $notification = new notification($this);

		$navbar['user'] = $this->coms->authenticatedUser;   //$this->session->get("user");
		$navbar['modules'] = $this->comsmodules;
		$navbar['userid'] = $this->coms->authenticatedUser->username;
        $navbar['notifications'] = $notification->flush();

        $sidebar = $navbar;
        $sidebar['leftmenus'] = parent::get_leftmenus();
        $sidebar['settingmenus'] = parent::get_settingmenus();

        parent::view('header.php', array('mstyles'=>$this->styles));
        parent::view('navbar.php', $navbar);
        $this->sidebar = parent::view('sidebar.php', $sidebar, true);
	}
	
	public function foot() {
		//var_dump($this->coms->get_scripts());
		//var_dump($this->scripts);
		parent::view('footer.php', array('mscripts'=>$this->scripts, 'scripts'=>$this->coms->get_scripts()));
	}
	
	public function view( $viewpath, $data = array(), $bare = false ) {

        $view = APPLICATION . "modules/" . $this->module->name . "/view/" . $viewpath;
        // extract given data arguments array as variables
        if(is_array($data))
            extract( $data, EXTR_SKIP ); //var_dump( $data) ;

        if(!$bare) {
            ob_start();
            if( is_readable( $view ) ) {
                include $view;
            } else $this->error->notfound( "View: " . $view . " could not be found!" );
            $content = ob_get_clean();
            //echo $content;
            $this->head();
            parent::view('container.php', array('sidebar'=>$this->sidebar, 'content'=>$content));
            $this->foot();
        } else {
            if( is_readable( $view ) ) {
                include $view;
            } else $this->error->notfound( "View: " . $view . " could not be found!" );
        }
	
	}

	public function location( $path = NULL, $localmodule = false ) {
		
		if(substr($this->config->index_file, strlen($this->config->index_file)-1, 1) != "/" 
			&& strlen(trim($this->config->index_file)) > 0 )
			$this->config->index_file .= "/";
        if($localmodule)
            $path = "module/" . $this->module->name . "/" . $path;
		$location = str_replace( "//", "/",  $this->config->index_file . $path );
		return $this->config->base_url() . $location;
	}

	public function asset( $path = NULL, $module = false ) {
        //if(!$coms) {
		    //$location = str_replace( "//", "/modules/", $this->module->name . "/assets/" . $path );
            //var_dump($path);
		//
        //} else {

        //}
        if($module) return $this->config->base_url() . $path;
        else return parent::asset($path);

	}

	public function add_style($stylepath) {
		$style = 'modules/' . $this->module->name . "/assets/" . $stylepath;
		if(file_exists( $style ))
			$this->styles[]	= $style;
	}
	
	public function add_script($scriptpath) {
		$script = 'modules/' . $this->module->name . "/assets/" . $scriptpath;
		if(file_exists( $script ))
			$this->scripts[] = $script;
	}

    public function add_source_style($styleurl) {
        $this->styles[] = $styleurl;
    }

    public function add_source_script($scripturl) {
        $this->scripts[] = $scripturl;
    }
	
	public function get_scripts() {
		//return $this->scripts;
	}
	
	public function get_styles() {
		//return $this->styles;
	}
	
}