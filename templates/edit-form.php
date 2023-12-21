<?php
global $wpdb;

$values = $wpdb->get_results( "SELECT * FROM {$wpdb->prefix}frontend_form WHERE id = {$id} ORDER BY id DESC", ARRAY_A);

$amount      = isset($values[0]['amount']) ?  $values[0]['amount'] : '';
$buyer       = isset($values[0]['buyer']) ?  $values[0]['buyer'] : '';
$receipt_id  = isset($values[0]['receipt_id']) ?  $values[0]['receipt_id'] : '';
$items       = isset($values[0]['items']) ?  $values[0]['items'] : '';
$buyer_email = isset($values[0]['buyer_email']) ?  $values[0]['buyer_email'] : '';
$buyer_ip    = isset($values[0]['buyer_ip']) ?  $values[0]['buyer_ip'] : '';
$note        = isset($values[0]['note']) ?  $values[0]['note'] : '';
$city        = isset($values[0]['city']) ?  $values[0]['city'] : '';
$phone       = isset($values[0]['phone']) ?  $values[0]['phone'] : '';
$entry_by    = isset($values[0]['entry_by']) ?  $values[0]['entry_by'] : '';

?>

    <form id="edit-form" action="#" method="post">

       
        <input type="hidden" name="id" value="<?php echo esc_attr($id); ?>">

        <label for="amount"><?php esc_html_e('Amount','skt')?></label>
        <input type="number" id="amount" name="amount" value="<?php echo esc_attr($amount); ?>"><br>

        <label for="buyer"><?php esc_html_e('Buyer','skt')?></label>
        <input type="text" id="buyer" name="buyer" value="<?php echo esc_attr($buyer); ?>" maxlength="255"><br>

        <label for="receipt_id"><?php esc_html_e('Receipt ID','skt')?></label>
        <input type="text" id="receipt_id" name="receipt_id" value="<?php echo esc_attr($receipt_id); ?>" maxlength="20"><br>

        <label for="items"><?php esc_html_e('Items','skt')?></label>
        <input type="text" id="items" name="items" value="<?php echo esc_attr($items); ?>" maxlength="255"><br>

        <label for="buyer_email"><?php esc_html_e('Buyer Email','skt')?></label>
        <input type="email" id="buyer_email" name="buyer_email" value="<?php echo esc_attr($buyer_email); ?>" maxlength="50" required><br>

        <label for="note"><?php esc_html_e('Note','skt')?></label>
        <input type="text" id="note" name="note" value="<?php echo esc_attr($note); ?>" maxlength="300"></input type="text"><br>

        <label for="city"><?php esc_html_e('City','skt')?></label>
        <input type="text" id="city" name="city" value="<?php echo esc_attr($city); ?>" maxlength="20"><br>

        <label for="phone"><?php esc_html_e('Phone','skt')?></label>
        <input type="text" id="phone" name="phone" value="<?php echo esc_attr($phone); ?>" maxlength="20"><br>

        <label for="entry_by"><?php esc_html_e('Entry By','skt')?></label>
        <input type="number" id="entry_by" name="entry_by" value="<?php echo esc_attr($entry_by); ?>" maxlength="10"><br>

        <button type="submit"><?php esc_html_e('Submit','skt')?></button>
    </form>