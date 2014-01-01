<?php
class controller_auth extends comscontroller {

	function __construct() {
		parent::__construct();
		$this->session = new session( $this->config->session );
	}
	
	function index() {
		$this->add_script('js/auth/index.js');
        $this->add_style('css/auth/index.css');
        $this->head(true);
		$this->view( 'auth.php' );
        $this->foot(true);
	}
	
	function logon() {
		$user = new model_user();
        //var_dump($_POST);exit;
		if( $authenticatedUser = $user->authenticate( $_POST['username'], $_POST['password'] ) ) {
            $this->session->set("user", $authenticatedUser);
			echo "OK";
		} else echo "NOK";
		exit;
	}
	
	function logoff() {
		$this->session->destroy();
		$this->redirect("auth/index");
	}
}
?>