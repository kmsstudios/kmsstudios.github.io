<?php include('templates/header.php'); ?>
<h2><?php echo $auction['title']; ?></h2>
<p><?php echo $auction['description']; ?></p>
<p>Current Bid: $<?php echo $auction['current_bid']; ?></p>

<form method="POST" action="bid_process.php">
    <label for="bid_amount">Place your bid:</label>
    <input type="number" name="bid_amount" min="<?php echo $auction['current_bid'] + 1; ?>" required>
    <button type="submit">Place Bid</button>
</form>

<?php include('templates/footer.php'); ?>
