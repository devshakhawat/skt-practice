<?php
// phpcs:ignoreFile
namespace SKTPRAC;

class Plugin {

	public static $_instance = null;
	

	public static function instance() {
		if ( self::$_instance === null ) {
			self::$_instance = new self();
		}
		return self::$_instance;
	}

	public function __construct() {

		// $this->admin   			= new Admin();
		

	}

}

function plugin() {
	return Plugin::instance();
}
plugin();
