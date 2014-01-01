<?php

class stb_media extends comsmodule {

    private $coms;

    public function __construct($coms) {
        parent::__construct($coms);
        $this->coms = $coms;
    }

    public function index() {
        $this->view('index.php');
    }

    public function newmedia() {

        $this->add_style('css/fileinput.css');
        $this->add_style('css/editor.css');
        $this->coms->add_script('ckeditor/ckeditor.js');
        $this->add_script('js/write.js');

        $this->view('newmedia.php');
    }

    public function save() {

        $mmedia = new model_media();
        $id = $mmedia->save();

        if($id) {
            $data['id'] = $id;
            $data['status'] = 'OK';
            $data['modified'] = date('d/m/Y H:i:s');
        } else {
            $data['status'] = 'NOK';
            $data['error'] = $mmedia->error;
        }

        header('mime-type:application/json');
        echo json_encode($data);

    }
}