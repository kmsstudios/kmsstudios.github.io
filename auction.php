<?php
include('config/db.php');
include('templates/header.php');

$auction_id = $_GET['id'];
$query = "SELECT * FROM auctions WHERE id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param('i', $auction_id);
$stmt->execute();
$result = $stmt->get_result();
$auction = $result->fetch_assoc();

echo "<h1>" . htmlspecialchars($auction['title']) . "</h1>";
echo "<p>Description: " . htmlspecialchars($auction['description']) . "</p>";
echo "<p>Current Bid: $" . htmlspecialchars($auction['current_bid']) . "</p>";

if (isset($_SESSION['user_id'])) {
    echo "<form method='POST' action='bid.php'>
        <input type='hidden' name='auction_id' value='" . $auction['id'] . "'>
        <label for='bid_amount'>Place your bid:</label>
        <input type='number' name='bid_amount' min='" . ($auction['current_bid'] + 1) . "' required>
        <button type='submit'>Place Bid</button>
    </form>";
} else {
    echo "<p>You must <a href='login.php'>log in</a> to place a bid.</p>";
}

include('templates/footer.php');
