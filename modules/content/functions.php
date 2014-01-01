<?php
/**
 * Created by PhpStorm.
 * User: aryo
 * Date: 11/10/13
 * Time: 7:13 PM
 */
//public function register_menu($position = menu::left, $label = null, $path) {
//public function register_menu($position = menu::left, $label = null, $path, $icon = 'chevron-right', $secure = false) {

$this->register_menu(menu::left, 'content', 'Content', '#');
$this->register_submenu('content', 'Content Index', 'module/content');
$this->register_submenu('content', 'Write New', 'module/content/home/write');
$this->register_settingsmenu('content', 'Content Settings', 'module/content/settings');

//var_dump($this);