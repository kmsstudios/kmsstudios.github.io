<?php include('templates/header.php'); ?>
<div class="auction-list">
    <?php
    $sql = "SELECT * FROM auctions";
    $result = $conn->query($sql);
    while($auction = $result->fetch_assoc()):
    ?>
        <div class="auction-card">
            <img src="images/<?php echo $auction['image']; ?>" alt="<?php echo $auction['title']; ?>">
            <h3><?php echo $auction['title']; ?></h3>
            <p>Current Bid: $<?php echo $auction['current_bid']; ?></p>
            <a href="auction.php?id=<?php echo $auction['id']; ?>">View Auction</a>
        </div>
    <?php endwhile; ?>
</div>
<?php include('templates/footer.php'); ?>
