<?php
// phpcs:ignoreFile
namespace SKTPRAC;

global $wpdb;
$shortcodes = $wpdb->get_results( "SELECT * FROM {$wpdb->prefix}frontend_form ORDER BY id DESC", ARRAY_A );

// foreach( $shortcodes as $shortcode ) {
//     pretty_log($shortcode['id']);
// }

?>


<table>
  <thead>
    <tr>
      <th><?php esc_html_e('ID', 'skt'); ?></th>
      <th><?php esc_html_e('Amount', 'skt'); ?></th>
      <th><?php esc_html_e('Buyer', 'skt'); ?></th>
      <th><?php esc_html_e('Reciept ID', 'skt'); ?></th>
      <th><?php esc_html_e('Items', 'skt'); ?></th>
      <th><?php esc_html_e('Buyer Email', 'skt'); ?></th>
      <th><?php esc_html_e('Buyer IP', 'skt'); ?></th>
      <th><?php esc_html_e('Note', 'skt'); ?></th>
      <th><?php esc_html_e('City', 'skt'); ?></th>
      <th><?php esc_html_e('Phone', 'skt'); ?></th>
      <th><?php esc_html_e('Hash Key', 'skt'); ?></th>
      <th><?php esc_html_e('Entry At', 'skt'); ?></th>
      <th><?php esc_html_e('Entry By', 'skt'); ?></th>
      <th><?php esc_html_e('Edit', 'skt'); ?></th>
      <th><?php esc_html_e('Delete', 'skt'); ?></th>
    </tr>
  </thead>
  <tbody>
      <?php foreach($shortcodes as $shortcode): ?>

        <?php error_log( print_r( $shortcode, true ) );?>
    
    <tr>
      <td><?php echo esc_html( $shortcode['id'] ); ?></td>
      <td><?php echo esc_html( $shortcode['amount'] ); ?></td>
      <td><?php echo esc_html( $shortcode['buyer'] ); ?></td>
      <td><?php echo esc_html( $shortcode['receipt_id'] ); ?></td>
      <td><?php echo esc_html( $shortcode['items'] ); ?></td>
      <td><?php echo esc_html( $shortcode['buyer_email'] ); ?></td>
      <td><?php echo esc_html( $shortcode['buyer_ip'] ); ?></td>
      <td><?php echo esc_html( $shortcode['note'] ); ?></td>
      <td><?php echo esc_html( $shortcode['city'] ); ?></td>
      <td><?php echo esc_html( $shortcode['phone'] ); ?></td>
      <td><?php echo esc_html( $shortcode['hash_key'] ); ?></td>
      <td><?php echo esc_html( $shortcode['entry_at'] ); ?></td>
      <td><?php echo esc_html( $shortcode['entry_by'] ); ?></td>
      <td><?php echo esc_html( 'Edit' ); ?></td>
      <td><?php echo esc_html( 'Delete' ); ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

