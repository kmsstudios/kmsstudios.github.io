<?php include('templates/header.php'); ?>
<h2>Login</h2>
<form method="POST" action="login_process.php">
    <label for="email">Email:</label>
    <input type="email" name="email" required>

    <label for="password">Password:</label>
    <input type="password" name="password" required>

    <button type="submit">Login</button>
</form>
<?php include('templates/footer.php'); ?>
