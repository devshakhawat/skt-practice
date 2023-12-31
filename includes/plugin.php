<?php
// phpcs:ignoreFile
namespace SKTPRAC;

if ( ! defined( 'ABSPATH' ) ) exit;

class Plugin {

	public static $_instance = null;
	public $ajax;
	public $assets;
	public $shortcode;
	public $hooks;	
	public $widget;	
	public $intergrations;

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
		$this->widget           = new Widget();
		$this->intergrations    = new Integrations();

	}

}

function plugin() {
	return Plugin::instance();
}
plugin();
