<?php
// phpcs:ignoreFile
namespace SKTPRAC;

if ( ! defined( 'ABSPATH' ) ) exit;

function wp_validate_settings( $settings ) {

    $sanitized_data = [];

    $sanitized_data['amount']      = sanitize_text_field($settings['amount']);
    $sanitized_data['buyer']       = sanitize_text_field($settings['buyer']);
    $sanitized_data['receipt_id']  = sanitize_text_field($settings['receipt_id']);
    $sanitized_data['items']       = sanitize_text_field($settings['items']);
    $sanitized_data['buyer_email'] = sanitize_email($settings['buyer_email']);
    $sanitized_data['buyer_ip']    = sanitize_text_field($settings['buyer_ip']);
    $sanitized_data['note']        = sanitize_text_field($settings['note']);
    $sanitized_data['city']        = sanitize_text_field($settings['city']);
    $sanitized_data['phone']       = sanitize_text_field($settings['phone']);
    $sanitized_data['hash_key']    = sanitize_text_field($settings['hash_key']);
    $sanitized_data['entry_by']    = sanitize_text_field($settings['entry_by']);


    return $sanitized_data;

}

function wp_validate_edit_settings( $settings ) {

    $sanitized_data = [];

    $sanitized_data['id']          = sanitize_text_field($settings['id']);
    $sanitized_data['amount']      = sanitize_text_field($settings['amount']);
    $sanitized_data['buyer']       = sanitize_text_field($settings['buyer']);
    $sanitized_data['receipt_id']  = sanitize_text_field($settings['receipt_id']);
    $sanitized_data['items']       = sanitize_text_field($settings['items']);
    $sanitized_data['buyer_email'] = sanitize_email($settings['buyer_email']);
    $sanitized_data['note']        = sanitize_text_field($settings['note']);
    $sanitized_data['city']        = sanitize_text_field($settings['city']);
    $sanitized_data['phone']       = sanitize_text_field($settings['phone']);
    $sanitized_data['entry_by']    = sanitize_text_field($settings['entry_by']);


    return $sanitized_data;

}

function get_shortcode_db_columns() {

    return array(
        "amount"          => "%d",
        "buyer"           => "%s",
        "receipt_id"      => "%s",
        "items"           => "%s",
        "buyer_email"     => "%s",
        "buyer_ip"        => "%s",
        "note"            => "%s",
        "city"            => "%s",
        "phone"           => "%s",
        "hash_key"        => "%s",
        "entry_at"        => "%s",
        "entry_by"        => "%d"
    );
}

function edit_shortcode_db_columns() {

    return array(
        
        "amount"          => "%d",
        "buyer"           => "%s",
        "receipt_id"      => "%s",
        "items"           => "%s",
        "buyer_email"     => "%s",
        "note"            => "%s",
        "city"            => "%s",
        "phone"           => "%s",
        "entry_by"        => "%d"
    );
}