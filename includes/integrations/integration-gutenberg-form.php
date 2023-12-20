<?php

namespace SKTPRAC;

/**
 * Protect direct access
 */
if ( ! defined( 'ABSPATH' ) ) exit;

class Integration_Gutenberg_Form {

    public function __construct() {
        add_action( 'init', [ $this, 'load_block_script' ] );
        add_action( 'enqueue_block_editor_assets', [ $this, 'enqueue_block_editor_assets' ] );        
    }

    public function enqueue_block_editor_assets() {
    }

    public function load_block_script() {

        // wp_add_inline_style( 'wp-block-editor', $this->get_block_css() );

        wp_register_script( 'skt-gut-form-block', SKT_PRAC_PLUGIN_URI . '/includes/integrations/assets/gutenberg/gutenberg-form-widget.min.js', ['wp-blocks', 'wp-editor'], SKT_PRAC_VERSION );
        
        $skt_form_block = array(
            'select_shortcode'        => __( 'Select Shortcode', 'skt' ),
            'edit_description_text'   => __( 'Edit this shortcode', 'skt' ),
            'edit_link_text'          => __( 'Edit', 'skt' ),
            'create_description_text' => __( 'Create new shortcode', 'skt' ),
            'create_link_text'        => __( 'Create', 'skt' ),
            // 'edit_link'               => admin_url( "edit.php?post_type=gs-logo-slider&page=gs-logo-shortcode#/shortcode/" ),
            // 'create_link'             => admin_url( 'edit.php?post_type=gs-logo-slider&page=gs-logo-shortcode#/shortcode' ),
            // 'shortcodes'              => $this->get_shortcode_list()
		);
		wp_localize_script( 'skt-gut-form-block', 'skt_form_block', $skt_form_block );

        register_block_type( 'sktprac/shortcode_form', array(
            'editor_script' => '',
            'attributes' => [],
            'render_callback' => [$this, 'shortcodes_dynamic_render_callback']
        ));

    }

    public function shortcodes_dynamic_render_callback( ) {
        
        return do_shortcode( '[dataform]' );
    }

    // public function get_block_css() {

    //     ob_start(); ?>
    
    //     .gslogo--toolbar {
    //         padding: 20px;
    //         border: 1px solid #1f1f1f;
    //         border-radius: 2px;
    //     }

    //     .gslogo--toolbar label {
    //         display: block;
    //         margin-bottom: 6px;
    //         margin-top: -6px;
    //     }

    //     .gslogo--toolbar select {
    //         width: 250px;
    //         max-width: 100% !important;
    //         line-height: 42px !important;
    //     }

    //     .gslogo--toolbar .gs-logo-slider-block--des {
    //         margin: 10px 0 0;
    //         font-size: 16px;
    //     }

    //     .gslogo--toolbar .gs-logo-slider-block--des span {
    //         display: block;
    //     }

    //     .gslogo--toolbar p.gs-logo-slider-block--des a {
    //         margin-left: 4px;
    //     }

    //     .editor-styles-wrapper .wp-block h3.gs_logo_title {
    //         font-size: 16px;
    //         font-weight: 400;
    //         margin: 0px;
    //         margin-top: 20px;
    //     }
    
    //     <?php return ob_get_clean();
    // }

    // protected function get_shortcode_list() {
    //     return get_shortcodes();
    // }

    // protected function get_default_item() {
    
    //     $shortcodes = get_shortcodes();

    //     if ( !empty($shortcodes) ) {
    //         return $shortcodes[0]['id'];
    //     }

    //     return '';

    // }


}