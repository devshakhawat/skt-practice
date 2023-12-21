<?php
// phpcs:ignoreFile
namespace SKTPRAC;

if ( ! defined( 'ABSPATH' ) ) exit;

class Assets {

    public function __construct() {        
		add_action( 'wp_enqueue_scripts', [ $this, 'enqueue_scripts' ] );
    } 

    public function enqueue_scripts() {

        // CSS
        wp_register_style( 'frontend-form', SKT_PRAC_PLUGIN_URI . '/assets/css/data-form.min.css', [], SKT_PRAC_VERSION, 'all' );

        // JS
        wp_register_script( 'frontend-form', SKT_PRAC_PLUGIN_URI . '/assets/js/data-form.min.js', ['jquery'], SKT_PRAC_VERSION, true );

        wp_localize_script( 'frontend-form', '_form_settings', $this->get_localize_data() );


        wp_enqueue_style( 'frontend-form' );
        wp_enqueue_script( 'frontend-form' );
    } 

    public function get_localize_data() {

        return [ 
            "nonce"       => wp_create_nonce("skt_validate_form"),
            "delete"      => wp_create_nonce("skt_delete_form_data"),
            "edit"        => wp_create_nonce("skt_edit_form_data"),
            "ajaxurl"     => admin_url( "admin-ajax.php" )
        ];
    }


}