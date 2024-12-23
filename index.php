<?php
include('config/db.php');
include('templates/header.php');

$query = "SELECT * FROM auctions";
$result = $conn->query($query);

echo "<h1>Auction Listings</h1>";
echo "<div class='auction-grid'>";
while ($auction = $result->fetch_assoc()) {
    echo "<div class='auction-card'>";
    echo "<img src='public/images/" . htmlspecialchars($auction['image']) . "' alt='" . htmlspecialchars($auction['title']) . "'>";
    echo "<h2>" . htmlspecialchars($auction['title']) . "</h2>";
    echo "<p>Current Bid: $" . htmlspecialchars($auction['current_bid']) . "</p>";
    echo "<a href='auction.php?id=" . $auction['id'] . "' class='btn'>View Auction</a>";
    echo "</div>";
}
echo "</div>";

include('templates/footer.php');
?>
``
