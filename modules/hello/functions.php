<?php
/**
 * Created by PhpStorm.
 * User: aryo
 * Date: 11/10/13
 * Time: 7:13 PM
 */
//public function register_menu($position = menu::left, $label = null, $path) {
//public function register_menu($position = menu::left, $label = null, $path, $icon = 'chevron-right', $secure = false) {
$this->register_menu(menu::left, 'hello', 'Hello Module', 'module/hello');
$this->register_submenu('hello', 'Hello A', 'module/hello');
//var_dump($this);