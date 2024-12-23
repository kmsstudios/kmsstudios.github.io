<?php
session_start();
include('config/db.php');
include('templates/header.php');

if (!isset($_SESSION['user_id'])) {
    echo "<p>You must <a href='login.php'>log in</a> to add an item.</p>";
    include('templates/footer.php');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $starting_bid = $_POST['starting_bid'];
    $user_id = $_SESSION['user_id'];

    // Handle file upload
    $target_dir = "public/images/";
    $target_file = $target_dir . basename($_FILES["image"]["name"]);
    move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);

    $image = basename($_FILES["image"]["name"]);

    $query = "INSERT INTO auctions (user_id, title, description, current_bid, image) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('issds', $user_id, $title, $description, $starting_bid, $image);

    if ($stmt->execute()) {
        echo "<p>Item added successfully! <a href='index.php'>View Auctions</a></p>";
    } else {
        echo "<p>Error: " . $stmt->error . "</p>";
    }
}
?>

<h1>Add Item</h1>
<form method="POST" action="" enctype="multipart/form-data">
    <label for="title">Title:</label>
    <input type="text" name="title" required>
    <label for="description">Description:</label>
    <textarea name="description" required></textarea>
    <label for="starting_bid">Starting Bid:</label>
    <input type="number" name="starting_bid" min="0" required>
    <label for="image">Image:</label>
    <input type="file" name="image" accept="image/*" required>
    <button type="submit">Add Item</button>
</form>

<?php include('templates/footer.php'); ?>
