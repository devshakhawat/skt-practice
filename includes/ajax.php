<?php
// phpcs:ignoreFile
namespace SKTPRAC;

use ClosedGeneratorException;

if ( ! defined( 'ABSPATH' ) ) exit;

class Ajax {

    public function __construct() {

        add_action( 'wp_ajax_skt_form_data', [ $this, 'insert_into_db' ] );        
        // add_action('init', [ $this, 'handle_form_submission' ] );
        
    } 

    public function insert_into_db() {

        // pretty_log('step 1');

        $this->handle_form_submission();
        // pretty_log('step 2');
        if( ! $this->check_form_submission() ) return;

        // pretty_log('step 3');
        
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

    public function handle_form_submission() {
        // pretty_log('step 4');
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['settings'])) {
            // pretty_log('step 5');
            $this->check_form_submission();
        }
    }

    public function check_form_submission() {

        if (isset($_COOKIE['form_submitted'])) {
            // pretty_log('step 6');
            // User has already submitted the form recently
            echo '<script>alert("You have already submitted the form within the last hour.");</script>';
                                    
            return false;
        } else {
           
            $this->set_cookie_for_form_submission();
            return true;
        }
    }

    public function set_cookie_for_form_submission() {
        $cookie_name = 'form_submitted';
        $cookie_value = 'true';
        $expiration = time() + 3600 * 24; // 24 hours expiration time
    
        setcookie($cookie_name, $cookie_value, $expiration, '/');
    }

    

}