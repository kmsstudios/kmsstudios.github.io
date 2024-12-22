<?php
// public/auction.php
require_once '../src/auction.php';

if (isset($_GET['id'])) {
    $item_id = $_GET['id'];
    display_item_details($item_id);

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['bid_amount'])) {
        // Simulate a user ID (In a real system, you would authenticate users)
        $user_id = 1;
        $amount = $_POST['bid_amount'];
        place_bid_on_item($item_id, $user_id, $amount);
    }
}
?>
<form method="POST">
    <input type="number" name="bid_amount" placeholder="Your bid" required>
    <button type="submit">Place Bid</button>
</form>
