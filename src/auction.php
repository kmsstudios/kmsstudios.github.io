<?php
// src/auction.php
require_once 'database.php';

function display_auction_items() {
    $items = get_items();
    while ($item = $items->fetch_assoc()) {
        echo "<div>";
        echo "<h2>" . htmlspecialchars($item['name']) . "</h2>";
        echo "<p>" . htmlspecialchars($item['description']) . "</p>";
        echo "<p>Starting Price: $" . $item['starting_price'] . "</p>";
        echo "<p>Current Bid: $" . $item['current_bid'] . "</p>";
        echo "<p>Auction ends at: " . $item['auction_end'] . "</p>";
        echo "<a href='auction.php?id=" . $item['id'] . "'>Place a Bid</a>";
        echo "</div>";
    }
}

function display_item_details($id) {
    $item = get_item($id);
    if ($item) {
        echo "<h2>" . htmlspecialchars($item['name']) . "</h2>";
        echo "<p>" . htmlspecialchars($item['description']) . "</p>";
        echo "<p>Starting Price: $" . $item['starting_price'] . "</p>";
        echo "<p>Current Bid: $" . $item['current_bid'] . "</p>";
        echo "<p>Auction ends at: " . $item['auction_end'] . "</p>";
    }
}

function place_bid_on_item($item_id, $user_id, $amount) {
    if (place_bid($item_id, $user_id, $amount)) {
        echo "Bid placed successfully!";
    } else {
        echo "Failed to place bid.";
    }
}
?>
