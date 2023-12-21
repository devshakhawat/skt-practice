<?php
// phpcs:ignoreFile
namespace SKTPRAC;

if (!defined('ABSPATH')) exit;

class Hooks {
    public function __construct() {

        add_action('plugins_loaded', [$this, 'plugin_loaded']);
        add_action('wp_loaded', [$this, 'show_edit_page']);
    }

    public function plugin_loaded() {
        global $wpdb;

        $skt_db_version = '1.0';

        if (get_option("{$wpdb->prefix}frontend_form") == $skt_db_version) return;

        require_once(ABSPATH . 'wp-admin/includes/upgrade.php');

        $sql = "CREATE TABLE IF NOT EXISTS {$wpdb->prefix}frontend_form (
            id INT(20) UNSIGNED NOT NULL AUTO_INCREMENT,
            amount INT(10),
            buyer VARCHAR(255),
            receipt_id VARCHAR(20),
            items VARCHAR(255),
            buyer_email VARCHAR(50) NOT NULL,
            buyer_ip VARCHAR(20),
            note TEXT,
            city VARCHAR(20),
            phone VARCHAR(20),
            hash_key VARCHAR(255),
            entry_at DATE,
            entry_by INT(10),
            PRIMARY KEY (id)
        ) {$wpdb->get_charset_collate()}";

        if (get_option("{$wpdb->prefix}frontend_form") < $skt_db_version) {
            dbDelta($sql);
        }

        update_option("{$wpdb->prefix}frontend_form", $skt_db_version);
    }

    public function show_edit_page() {

        if( isset($_REQUEST['id']) ) {

            $id = (int) $_REQUEST['id'];

            include_once SKT_PRAC_PLUGIN_DIR. 'templates/edit-form.php';
            
        }

    }
}
