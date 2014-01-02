<?php
class comscontroller extends controller {
    
	private $scripts = array();
	private $styles = array();
	
	private $page_title = NULL;
	private $isAuthenticated = false;
	
	public $session = NULL;
	public $authenticatedUser = NULL;

	private $comsmodules = NULL;
    private $notifications = NULL;

    private $content = '';
    private $sidebar = '';

    private $leftmenus;
    private $submenus;
    private $settingmenus;
	
    public function __construct(){
		
        parent::__construct();  
  		
  		if(!defined('MODULE'))
  			define('MODULE','modules/');
       
		$this->page_title = $this->config->page_title;		
		$this->loadAllModules();
		//exit;
		if(!$this->authenticatedUser) {
			$this->authenticatedUser = new stdClass;
			$this->authenticatedUser->username = "guest";
			$this->authenticatedUser->level = 0;
			$this->authenticatedUser->name = "Guest";
			$this->authenticatedUser->status = 0;
		}		
		//var_dump($this);
        //var_dump($this->notification);

	}
	
	public function loadAllModules() {

		$mmodule = new model_module();
		$this->comsmodules = $mmodule->getAllActiveModules();
		autoloader::register(array($this, 'autoload_module_controller'));
		autoloader::register(array($this, 'autoload_module_model'));
		autoloader::register(array($this, 'autoload_module_library'));

        if(is_array($this->comsmodules) and count($this->comsmodules)) {
            foreach($this->comsmodules as $module) {
                if(file_exists(MODULE . $module . '/functions.php'))
                    include MODULE . $module . '/functions.php';
            }
        }
	}
	
	public function require_auth($authcontroller = false) {
		$this->session = new session( $this->config->session );
		if( $authcontroller !== false ) {
				
			$this->authenticatedUser = $this->session->get('user');
			if($this->authenticatedUser) {
				$this->headerdata['authenticated'] = true;
			} else {
				$this->redirect($authcontroller);
				exit;
			}		
			
		} else {
			$this->headerdata['authenticated'] = false;
			$this->headerdata['user'] = NULL;
		}		
	}
	
	public function head($bare = false) {

        $notification = new notification($this);
        $this->notifications = $notification->flush();


        $navbar['user'] = $this->authenticatedUser;   //$this->session->get("user");
		$navbar['modules'] = $this->comsmodules;
		$navbar['userid'] = $this->authenticatedUser->username;

        $navbar['notifications'] = $this->notifications;

        $sidebar['modules'] = $this->comsmodules;
        $sidebar['leftmenus'] = $this->leftmenus;
        $sidebar['settingmenus'] = $this->settingmenus;
        //$sidebar['controller'] = $this->className;
        //$sidebar['method'] = $this->methodName;

        $this->view('header.php');
        if(!$bare) {
            $this->view('navbar.php', $navbar);
            $this->sidebar = $this->view('sidebar.php', $sidebar, true);
        }
	}
	
	public function foot($bare = false) {
        //var_dump($this);
        if($bare) $this->view('footer-bare.php', array('scripts'=>$this->get_scripts()));
		else $this->view('footer.php', array('scripts'=>$this->get_scripts()));
	}

    public function show($view, $data = null, $bare = false) {
        $this->content = $this->view($view, $data, true);
        //var_dump($bare);
        $this->head($bare);
        if(!$bare) {
            $this->view('container.php', array('sidebar'=>$this->sidebar, 'content'=>$this->content));
        } else echo $this->content;
        $this->foot($bare);
    }
	
	public function add_style($stylepath) {
		if(file_exists( $this->config->assets_folder . "/" . $stylepath ))
			$this->styles[]	= $stylepath;
	}
	
	public function add_script($scriptpath) {
		if(file_exists( $this->config->assets_folder . "/" . $scriptpath ))
			$this->scripts[] = $scriptpath;
	}
	
	public function get_scripts() {
		return $this->scripts;
	}
	
	public function get_styles() {
		return $this->styles;	
	}
	
	public function page_title($appended_string = NULL) {
		return $this->page_title . $appended_string;	
	}
	
	public function no_privileges() {
		$this->view('error/noprivileges.php');
		exit;
	}

    public function register_menu($position = menu::left, $id=null, $label = null, $path, $icon = 'glyphicon glyphicon-chevron-right', $secure = false) {
        $url = $this->location($path, $secure);
        switch($position) {
            case menu::left:
                $this->leftmenus[$id] = new menuitem($id, $label, $url, $icon);
                break;
        }
    }

    public function register_submenu($id=null, $label = null, $path, $icon = 'glyphicon glyphicon-minus', $secure = false) {
        $url = $this->location($path, $secure);
        $this->leftmenus[$id]->childmenus[] = new submenuitem($label, $url, $icon);
    }

    public function register_settingsmenu($id=null, $label = null, $path, $icon = 'glyphicon glyphicon-minus', $secure = false) {
        $url = $this->location($path, $secure);
        $this->settingmenus[] = new settingmenuitem($label, $url, $icon);
    }

    public function get_leftmenus(){
        return $this->leftmenus;
    }

    public function get_settingmenus(){
        return $this->settingmenus;
    }

    public function get_loadedmodules(){
        return $this->comsmodules;
    }

	public function autoload_module_controller( $className ) {
		// convert the given class name to it's path
		$classPath = trim( str_replace("_", "/", $className), "/" );
		@include_once MODULE . $this->module->name . "/controller/" 
			. trim( strstr( $classPath, "/" ), "/" ) .'.php';
			
	}
	
	public function autoload_module_model( $className ) {
		// convert the given class name to it's path
		$classPath = trim( str_replace("_", "/", $className), "/" );
		@include_once MODULE . $this->module->name . "/model/"
			. trim( strstr( $classPath, "/" ), "/" ) .'.php';
			
	}
	
	public function autoload_module_library( $className ) {
		// convert the given class name to it's path
		$classPath = trim( str_replace("_", "/", $className), "/" );
		@include_once MODULE . $this->module->name . "/library/" 
			. trim( strstr( $classPath, "/" ), "/" ) .'.php';
	}
	
}
