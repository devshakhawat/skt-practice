<?php
// phpcs:ignoreFile
namespace SKTPRAC;

class Plugin {

	public static $_instance = null;
	public $ajax;
	public $assets;
	public $shortcode;
	public $hooks;	

	public static function instance() {
		if ( ! self::$_instance ) {
			self::$_instance = new self();
		}
		return self::$_instance;
	}

	public function __construct() {

		$this->ajax   			= new Ajax();
		$this->assets   		= new Assets();
		$this->shortcode   		= new Shortcode();	
		$this->hooks   			= new Hooks();	

	}

}

function plugin() {
	return Plugin::instance();
}
plugin();
