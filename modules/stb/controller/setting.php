<?php

class stb_setting extends comsmodule {

    private $coms;

    public function __construct($coms) {
        parent::__construct($coms);
        $this->coms = $coms;
    }

    public function index() {
        $this->add_script('js/setting.js');
        $this->view('setting.php');
    }

    public function install() {

        $mmedia = new model_media();
        $result = $mmedia->install();


        header('mime-type: application/json');
        if($result) {
            $notification = new notification($this->coms);
            $notification->add('Media database has been successfully configured and module ready to be used.', notification::success);
            echo json_encode(array('status'=>'OK'));
        } else echo json_encode(array('status'=>'NOK', 'error'=>$mmedia->error));
    }

}