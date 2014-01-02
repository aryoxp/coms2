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
        $notification = new notification($this->coms);
        $mmedia = new model_media();
        $result = $mmedia->save();
        if($result > 0) {
            $notification->add($notification::success, 'Media successfully saved to database.');
            $this->redirect('module/stb/media');
        } else {
            $notification->add($notification::error, 'Unable to save media. '.$mmedia->error);
            $this->redirect('module/stb/media/newmedia');
        }
        exit;
    }
}