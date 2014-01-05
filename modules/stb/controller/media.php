<?php

class stb_media extends comsmodule {

    private $coms;

    public function __construct($coms) {
        parent::__construct($coms);
        $this->coms = $coms;
    }

    public function index() {

        $mmedia = new model_media();
        $data['media_tv'] = $mmedia->getAll('tv');
        $data['media_radio'] = $mmedia->getAll('radio');
        $data['media_vod'] = $mmedia->getAll('vod');

        //var_dump($data);
        $this->add_style('css/index.css');
        $this->add_script('js/index.js');
        $this->view('index.php', $data);
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
            $notification->add('Media successfully saved to database.', $notification::success);
            if(isset($_POST['id'])) $this->redirect('module/stb/media/edit/'.$_POST['id']);
            else $this->redirect('module/stb/media');
        } else {
            $notification->add('Unable to save media. '.$mmedia->error, $notification::error);
            $this->redirect('module/stb/media/newmedia');
        }
        exit;
    }

    public function delete() {
        $mmedia = new model_media();
        $id = $_POST['id'];
        $type = $_POST['type'];
        $result = $mmedia->delete($id, $type);
        $data['status'] = 'NOK';
        if($result) {
            $data['status'] = 'OK';
        } else {
            $data['error'] = $mmedia->error;
        }
        header('content-type: application/json');
        echo json_encode($data);
    }

    public function edit($id) {

        $this->add_style('css/fileinput.css');
        $this->add_style('css/editor.css');
        $this->coms->add_script('ckeditor/ckeditor.js');
        $this->add_script('js/edit.js');

        $mmedia = new model_media();
        $media = $mmedia->get($id); //var_dump($media);
        $data['media'] = $media;
        $this->view('editmedia.php', $data);
    }
}