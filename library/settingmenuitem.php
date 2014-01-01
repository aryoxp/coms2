<?php
/**
 * Created by PhpStorm.
 * User: aryo
 * Date: 11/10/13
 * Time: 6:59 PM
 */

class settingmenuitem {
    public $label;
    public $url;
    public $icon = 'chevron-right';

    public function __construct($label, $url, $icon = 'minus') {
        $this->label = $label;
        $this->url = $url;
        $this->icon = $icon;
    }
} 