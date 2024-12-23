<?php include('templates/header.php'); ?>
<h2>Add Auction Item</h2>
<form method="POST" action="add_item_process.php">
    <label for="title">Item Title:</label>
    <input type="text" name="title" required>

    <label for="description">Description:</label>
    <textarea name="description" required></textarea>

    <label for="starting_bid">Starting Bid:</label>
    <input type="number" name="starting_bid" required>

    <button type="submit">Add Item</button>
</form>
<?php include('templates/footer.php'); ?>
