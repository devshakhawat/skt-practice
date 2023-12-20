<?php
// phpcs:ignoreFile
namespace SKTPRAC;


if (!defined('ABSPATH')) exit;

class Ajax {

    public function __construct() {

        add_action('wp_ajax_skt_form_data', [$this, 'insert_into_db']);
        add_action('wp_ajax_skt_delete_data', [$this, 'delete_from_db']);
    }

    public function insert_into_db() {

        $this->handle_form_submission();

        // if( ! $this->check_form_submission() ) return;

        global $wpdb;

        if (!check_admin_referer('skt_validate_form') || !current_user_can('manage_options')) {
            wp_send_json_error(__('Unauthorised Request', 'skt'), 401);
        }

        
        $field_values      = $_POST['settings'];
        $items             = wp_list_pluck($field_values, 'value', 'name');

        // Get Buyer IP
        $buyer_ip = $this->get_user_ip();
        $items['buyer_ip'] = $buyer_ip;

        // Hashed Pass
        $receipt_id        = $items['receipt_id'];
        $salt              = base64_encode(random_bytes(16));
        $hashed_password   = crypt($receipt_id, '$6$' . $salt . '$');
        $items['hash_key'] = $hashed_password;

        $items        = wp_validate_settings($items);


        $data = array(
            "amount"          => $items['amount'],
            "buyer"           => $items['buyer'],
            "receipt_id"      => $items['receipt_id'],
            "items"           => $items['items'],
            "buyer_email"     => $items['buyer_email'],
            "buyer_ip"        => $items['buyer_ip'],
            "note"            => $items['note'],
            "city"            => $items['city'],
            "phone"           => $items['phone'],
            "hash_key"        => $items['hash_key'],
            "entry_at"        => current_time('mysql'),
            "entry_by"        => $items['entry_by'],
        );

        $wpdb->insert("{$wpdb->prefix}frontend_form", $data, get_shortcode_db_columns());

        wp_send_json_success();
    }

    public function delete_from_db() {
        if (!check_admin_referer('skt_delete_form_data') || !current_user_can('manage_options')) {
            wp_send_json_error(__('Unauthorised Request', 'skt'), 401);
        }

        global $wpdb;

        $id = $_POST['id'];

        $wpdb->delete( "{$wpdb->prefix}frontend_form", [ 'id' => $id ], ['%d'] );

        wp_send_json_success();
    } 

    public function get_user_ip() {

        if (isset($_SERVER['HTTP_CLIENT_IP']) && !empty($_SERVER['HTTP_CLIENT_IP'])) {
            // Check for shared internet connection
            $ip = $_SERVER['HTTP_CLIENT_IP'];
        } elseif (isset($_SERVER['HTTP_X_FORWARDED_FOR']) && !empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
        } else {
            $ip = $_SERVER['REMOTE_ADDR'];
        }

        return $ip;
    }

    public function handle_form_submission() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['settings'])) {

            $this->check_form_submission();
        }
    }

    public function check_form_submission() {

        if (isset($_COOKIE['form_submitted'])) {

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
