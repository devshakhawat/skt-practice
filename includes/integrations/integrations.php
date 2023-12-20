<?php

namespace SKTPRAC;

/**
 * Protect direct access
 */
if ( ! defined( 'ABSPATH' ) ) exit;

final class Integrations {

    public function __construct() {

        // Gutenberg
        if ( apply_filters( 'skt_integration_gutenberg_form', true ) ) $this->integration_with_gutenberg_form();


        if ( apply_filters( 'skt_integration_gutenberg_data', true ) ) $this->integration_with_gutenberg_data();
        
    }

    public function integration_with_gutenberg_form() {
        require_once SKT_PRAC_PLUGIN_DIR . 'includes/integrations/integration-gutenberg-form.php';
        new Integration_Gutenberg_Form();
    }
    
    public function integration_with_gutenberg_data() {
        // require_once SKT_PRAC_PLUGIN_DIR . 'includes/integrations/integration-gutenberg-data.php';
        // Integration_WPB_VC::get_instance();
    }

    

}