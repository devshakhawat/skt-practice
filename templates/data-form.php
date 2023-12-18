
    <form id="data-form" action="#" method="post">
        <label for="amount">Amount</label>
        <input type="number" id="amount" name="amount">

        <label for="buyer">Buyer</label>
        <input type="text" id="buyer" name="buyer" maxlength="255">

        <label for="receipt_id">Receipt ID</label>
        <input type="text" id="receipt_id" name="receipt_id" maxlength="20">

        <label for="items">Items</label>
        <input type="text" id="items" name="items" maxlength="255">

        <label for="buyer_email">Buyer Email</label>
        <input type="email" id="buyer_email" name="buyer_email" maxlength="50" required>

        <label for="note">Note</label>
        <textarea id="note" name="note" rows="4" maxlength="30"></textarea>

        <label for="city">City</label>
        <input type="text" id="city" name="city" maxlength="20">

        <label for="phone">Phone</label>
        <input type="text" id="phone" name="phone" maxlength="20">

        <label for="entry_by">Entry By</label>
        <input type="number" id="entry_by" name="entry_by" maxlength="10">

        <button type="submit">Submit</button>
    </form>

