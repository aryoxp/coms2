<?php
/**
 * Created by PhpStorm.
 * User: aryo
 * Date: 11/10/13
 * Time: 7:21 AM
 */

class controller_coms_js extends controller {

    function __construct() {
        parent::__construct();
    }

    function index() {
        header('Content-Type: application/javascript');
        $this->view('coms/js.php');
    }
}