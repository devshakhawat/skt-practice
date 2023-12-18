<?php
// phpcs:ignoreFile
namespace SKTPRAC;

class Hooks {
    public function __construct() {
        add_action( 'plugins_loaded', [ $this, 'plugin_loaded' ] );
    }

    public function plugin_loaded() {
        global $wpdb;

        $skt_db_version = '1.0';

        if ( get_option("{$wpdb->prefix}frontend_form") == $skt_db_version ) return;
        
        require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );

        $sql = "CREATE TABLE IF NOT EXISTS {$wpdb->prefix}frontend_form (
            id INT(20) unsigned NOT NULL AUTO_INCREMENT,
            amount int(10),
            buyer` varchar(255),
            receipt_id varchar(20),
            items varchar(255),
            buyer_email varchar(50) NOT NULL,
            buyer_ip varchar(20),
            note text,
            city varchar(20),
            phone varchar(20),
            hash_key varchar(255),
            entry_at date,
            entry_by int(10),
            PRIMARY KEY (id)
            )" . $wpdb->get_charset_collate() . ";";

        if ( get_option("{$wpdb->prefix}frontend_form") < $skt_db_version ) {
            dbDelta( $sql );
        }

        update_option( "{$wpdb->prefix}frontend_form", $skt_db_version );

    } 
}