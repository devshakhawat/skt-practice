<?php
// phpcs:ignoreFile
namespace SKTPRAC;

class Shortcode {

    public function __construct() {
        add_shortcode( 'practice', [ $this, 'practice_shortcode' ] );
    } 

    public function practice_shortcode() {

        ob_start();
            include_once SKT_PRAC_PLUGIN_DIR. 'templates/frontend-submission-form.php';
        return ob_get_clean();
    } 


}