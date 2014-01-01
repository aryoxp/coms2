<?php
/**
 * Created by PhpStorm.
 * User: aryo
 * Date: 11/10/13
 * Time: 6:59 PM
 */

class menuitem {
    public $id;
    public $label;
    public $url;
    public $icon = 'chevron-right';
    public $childmenus = array();

    public function __construct($id, $label, $url, $icon = 'chevron-right', $childmenus = array()) {
        $this->id = $id;
        $this->label = $label;
        $this->url = $url;
        $this->icon = $icon;
        $this->childmenus = $childmenus;
    }
} 