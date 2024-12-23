<?php
include('config/db.php');
include('templates/header.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $query = "INSERT INTO users (username, email, password) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('sss', $username, $email, $password);

    if ($stmt->execute()) {
        echo "<p>Signup successful! <a href='login.php'>Log in</a></p>";
    } else {
        echo "<p>Error: " . $stmt->error . "</p>";
    }
}
?>

<h1>Sign Up</h1>
<form method="POST" action="">
    <label for="username">Username:</label>
    <input type="text" name="username" required>
    <label for="email">Email:</label>
    <input type="email" name="email" required>
    <label for="password">Password:</label>
    <input type="password" name="password" required>
    <button type="submit">Sign Up</button>
</form>

<?php include('templates/footer.php'); ?>
