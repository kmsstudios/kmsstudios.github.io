<?php
session_start();
include('config/db.php');
include('templates/header.php');

if (!isset($_SESSION['user_id'])) {
    echo "<p>You must <a href='login.php'>log in</a> to view your won auctions.</p>";
    include('templates/footer.php');
    exit();
}

$user_id = $_SESSION['user_id'];
$query = "SELECT a.title, b.bid_amount 
          FROM bids b 
          INNER JOIN auctions a ON b.auction_id = a.id 
          WHERE b.user_id = ? AND b.bid_amount = a.current_bid";
$stmt = $conn->prepare($query);
$stmt->bind_param('i', $user_id);
$stmt->execute();
$result = $stmt->get_result();

echo "<h1>Your Won Auctions</h1>";
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<p>" . htmlspecialchars($row['title']) . " - $" . htmlspecialchars($row['bid_amount']) . "</p>";
    }
} else {
    echo "<p>You have not won any auctions yet.</p>";
}

include('templates/footer.php');
?>
