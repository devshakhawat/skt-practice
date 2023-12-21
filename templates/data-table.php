<?php
// phpcs:ignoreFile
namespace SKTPRAC;

global $wpdb;

$form_datas = $wpdb->get_results( "SELECT * FROM {$wpdb->prefix}frontend_form ORDER BY id DESC", ARRAY_A);

$search_item = isset($_GET['gsearch']) ? $_GET['gsearch'] : '';

if( !empty($search_item) ) {
  $sql = $wpdb->prepare("SELECT * FROM {$wpdb->prefix}frontend_form WHERE items LIKE '%%%s%%'", $search_item);
  $form_datas = $wpdb->get_results( $sql, ARRAY_A);
}

?>

<table>
  <form action="" method="GET">
    <input type="search" id="gsearch" name="gsearch">
    <input type="submit" value="Search">
</form>

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
      <th><?php // esc_html_e('Hash Key', 'skt'); ?></th>
      <th><?php esc_html_e('Entry At', 'skt'); ?></th>
      <th><?php esc_html_e('Entry By', 'skt'); ?></th>
      <th><?php esc_html_e('Edit', 'skt'); ?></th>
      <th><?php esc_html_e('Delete', 'skt'); ?></th>
    </tr>
  </thead>
  <tbody>
      <?php foreach($form_datas as $data): ?>    
    <tr data-id="<?php echo esc_attr($data['id']); ?>">
      <td><?php echo esc_html( $data['id'] ); ?></td>
      <td><?php echo esc_html( $data['amount'] ); ?></td>
      <td><?php echo esc_html( $data['buyer'] ); ?></td>
      <td><?php echo esc_html( $data['receipt_id'] ); ?></td>
      <td><?php echo esc_html( $data['items'] ); ?></td>
      <td><?php echo esc_html( $data['buyer_email'] ); ?></td>
      <td><?php echo esc_html( $data['buyer_ip'] ); ?></td>
      <td><?php echo esc_html( $data['note'] ); ?></td>
      <td><?php echo esc_html( $data['city'] ); ?></td>
      <td><?php echo esc_html( $data['phone'] ); ?></td>
      <td><?php // echo esc_html( $data['hash_key'] ); ?></td>
      <td><?php echo esc_html( $data['entry_at'] ); ?></td>
      <td><?php echo esc_html( $data['entry_by'] ); ?></td>
      <td class="skt-edit-data"><a href="<?php echo untrailingslashit(esc_url(get_permalink()))."?id={$data['id']}"; ?>"><?php echo esc_html( 'Edit' ); ?></a></td>
      <td class="skt-delete-data"><a href="#"><?php echo esc_html( 'Delete' ); ?></a></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

