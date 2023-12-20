<?php
namespace SKTPRAC;

?>
    <form id="data-form" action="#" method="post">
        <label for="amount"><?php esc_html_e('Amount','skt')?></label>
        <input type="number" id="amount" name="amount"><br>

        <label for="buyer"><?php esc_html_e('Buyer','skt')?></label>
        <input type="text" id="buyer" name="buyer" maxlength="255"><br>

        <label for="receipt_id"><?php esc_html_e('Receipt ID','skt')?></label>
        <input type="text" id="receipt_id" name="receipt_id" maxlength="20"><br>

        <label for="items"><?php esc_html_e('Items','skt')?></label>
        <input type="text" id="items" name="items" maxlength="255"><br>

        <label for="buyer_email"><?php esc_html_e('Buyer Email','skt')?></label>
        <input type="email" id="buyer_email" name="buyer_email" maxlength="50" required><br>

        <label for="note"><?php esc_html_e('Note','skt')?></label>
        <textarea id="note" name="note" rows="4" maxlength="30"></textarea><br>

        <label for="city"><?php esc_html_e('City','skt')?></label>
        <input type="text" id="city" name="city" maxlength="20"><br>

        <label for="phone"><?php esc_html_e('Phone','skt')?></label>
        <input type="text" id="phone" name="phone" maxlength="20"><br>

        <label for="entry_by"><?php esc_html_e('Entry By','skt')?></label>
        <input type="number" id="entry_by" name="entry_by" maxlength="10"><br>

        <button type="submit"><?php esc_html_e('Submit','skt')?></button>
    </form>

