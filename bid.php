<?php
session_start();
include('config/db.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $auction_id = $_POST['auction_id'];
    $bid_amount = $_POST['bid_amount'];
    $user_id = $_SESSION['user_id'];

    $query = "SELECT current_bid FROM auctions WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('i', $auction_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $auction = $result->fetch_assoc();

    if ($bid_amount > $auction['current_bid']) {
        $query = "INSERT INTO bids (user_id, auction_id, bid_amount) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($query);
        $stmt->bind_param('iid', $user_id, $auction_id, $bid_amount);
        $stmt->execute();

        $query = "UPDATE auctions SET current_bid = ? WHERE id = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param('di', $bid_amount, $auction_id);
        $stmt->execute();

        header("Location: auction.php?id=$auction_id&status=success");
    } else {
        header("Location: auction.php?id=$auction_id&status=error");
    }
}
