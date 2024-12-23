<?php
session_start();
include('config/db.php');
include('templates/header.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $query = "SELECT id, password FROM users WHERE email = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('s', $email);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user_id'] = $user['id'];
        echo "<p>Login successful! <a href='index.php'>Go to homepage</a></p>";
    } else {
        echo "<p>Invalid email or password.</p>";
    }
}
?>

<h1>Login</h1>
<form method="POST" action="">
    <label for="email">Email:</label>
    <input type="email" name="email" required>
    <label for="password">Password:</label>
    <input type="password" name="password" required>
    <button type="submit">Log In</button>
</form>

<?php include('templates/footer.php'); ?>
