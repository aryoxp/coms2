<?php
/**
 * Created by PhpStorm.
 * User: aryo
 * Date: 11/10/13
 * Time: 7:13 PM
 */
//public function register_menu($position = menu::left, $label = null, $path) {
//public function register_menu($position = menu::left, $label = null, $path, $icon = 'chevron-right', $secure = false) {
$this->register_menu(menu::left, 'stb', 'Set Top Box', 'module/stb', 'cus-control-play');
$this->register_submenu('stb', 'Media', 'module/stb/media', 'cus-image');
$this->register_submenu('stb', 'Setting', 'module/stb/setting', 'cus-cog');
//var_dump($this);