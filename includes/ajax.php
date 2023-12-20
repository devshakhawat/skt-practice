<?php
// phpcs:ignoreFile
namespace SKTPRAC;

if ( ! defined( 'ABSPATH' ) ) exit;

class Ajax {

    public function __construct() {

        add_action( 'wp_ajax_skt_form_data', [ $this, 'insert_into_db' ] );
        
    } 

    public function insert_into_db() {
        
        global $wpdb;

        if ( !check_admin_referer('skt_validate_form') || !current_user_can('manage_options') ) {
            wp_send_json_error( __('Unauthorised Request', 'skt'), 401 );
        }
        
        $field_values = $_POST['settings'];

        $items = wp_list_pluck( $field_values, 'value', 'name' );

        $items = wp_validate_settings($items);

        $data = array(
            "amount"          => $items['amount'],
            "buyer"           => $items['buyer'],
            "receipt_id"      => $items['receipt_id'],
            "items"           => $items['items'],
            "buyer_email"     => $items['buyer_email'],
            "buyer_ip"        => 'buyer_ip',
            "note"            => $items['note'],
            "city"            => $items['city'],
            "phone"           => $items['phone'],
            "hash_key"        => 'hash_key',
            "entry_at"        => current_time( 'mysql'),
            "entry_by"        => $items['entry_by'],
        );

        $wpdb->insert( "{$wpdb->prefix}frontend_form", $data, get_shortcode_db_columns() );

        wp_send_json_success();

    } 

    

}