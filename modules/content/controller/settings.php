<?php
/**
 * Created by PhpStorm.
 * User: aryo
 * Date: 11/16/13
 * Time: 12:12 PM
 */

class content_settings extends comsmodule {

    private $coms;

    public function __construct($coms){
        parent::__construct($coms);
        $this->coms = $coms;

        // this controller requires authentication
        // initialize it
        $coms->require_auth('auth');
    }

    public function index(){
        $this->view('settings.php');
    }
} 