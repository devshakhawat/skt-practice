<?php
// phpcs:ignoreFile
namespace SKTPRAC;

if ( ! defined( 'ABSPATH' ) ) exit;

class Shortcode {

    public function __construct() {
        add_shortcode( 'dataform', [ $this, 'dataform_shortcode' ] );
        add_shortcode( 'datatable', [ $this, 'datatable_shortcode' ] );
    } 

    public function dataform_shortcode() {

        ob_start();
            include_once SKT_PRAC_PLUGIN_DIR. 'templates/data-form.php';
        return ob_get_clean();
    } 

    public function datatable_shortcode() {
        
        ob_start();
            if ( ! current_user_can('edit_posts') ) {
                return 'This content is restricted to Editors and above.';
            } else {
                include_once SKT_PRAC_PLUGIN_DIR. 'templates/data-table.php';
            }
        return ob_get_clean();
    } 

}