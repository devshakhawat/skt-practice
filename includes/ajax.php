<?php
// phpcs:ignoreFile
namespace SKTPRAC;

if ( ! defined( 'ABSPATH' ) ) exit;

class Ajax {

    public function __construct() {

        add_action( 'wp_ajax_skt_form_data', [ $this, 'insert_into_db' ] );
        
    } 

    public function insert_into_db() {

        if ( !check_admin_referer('skt_validate_form') || !current_user_can('manage_options') ) {
            wp_send_json_error( __('Unauthorised Request', 'skt'), 401 );
        }

        // global $wpdb;





    } 

}