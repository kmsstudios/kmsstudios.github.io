<?php
// src/database.php
require_once '../config/db.php';

function get_items() {
    global $conn;
    $sql = "SELECT * FROM items WHERE auction_end > NOW()";
    return $conn->query($sql);
}

function get_item($id) {
    global $conn;
    $sql = "SELECT * FROM items WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i', $id);
    $stmt->execute();
    return $stmt->get_result()->fetch_assoc();
}

function place_bid($item_id, $user_id, $amount) {
    global $conn;
    // Update the item with the new bid
    $sql = "UPDATE items SET current_bid = ?, current_bidder_id = ? WHERE id = ? AND current_bid < ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('diid', $amount, $user_id, $item_id, $amount);
    return $stmt->execute();
}
?>
