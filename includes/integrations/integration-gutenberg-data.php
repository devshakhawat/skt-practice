<?php

namespace SKTPRAC;

/**
 * Protect direct access
 */
if ( ! defined( 'ABSPATH' ) ) exit;

class Integration_Gutenberg_Data {

    private static $_instance = null;
        
    public static function get_instance() {

        if ( is_null( self::$_instance ) ) {
            self::$_instance = new self();
        }

        return self::$_instance;        
    }

    public function __construct() {
        
        add_action( 'init', [ $this, 'load_block_script' ] );  
    }

    public function load_block_script() {

        wp_add_inline_style( 'wp-block-editor', $this->get_block_css() );
        wp_register_script( 'skt-gut-data-block', SKT_PRAC_PLUGIN_URI . '/includes/integrations/assets/gutenberg-data/gutenberg-data-widget.min.js', ['wp-blocks', 'wp-editor'], SKT_PRAC_VERSION );
        
        $skt_data_block = [];
		wp_localize_script( 'skt-gut-data-block', 'skt_data_block', $skt_data_block );

        register_block_type( 'sktprac/shortcodedata', array(
            'editor_script' => 'skt-gut-data-block',
            'attributes' => [
                'shortcode' => [
                    'type'    => 'string',
                    'default' => '[datatable]'
                ],
                'align' => [
                    'type'=> 'string',
                    'default'=> 'wide'
                ]
            ],
            'render_callback' => [$this, 'shortcodes_dynamic_render_callback']
        ));

    }

    public function shortcodes_dynamic_render_callback( ) {
        
        return do_shortcode( '[datatable]' );
    }

    public function get_block_css() {

        ob_start(); ?>
    
        
    
        <?php return ob_get_clean();

    }

}