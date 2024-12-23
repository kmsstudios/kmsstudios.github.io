<?php include('templates/header.php'); ?>
<h2>Signup</h2>
<form method="POST" action="signup_process.php">
    <label for="name">Name:</label>
    <input type="text" name="name" required>

    <label for="email">Email:</label>
    <input type="email" name="email" required>

    <label for="password">Password:</label>
    <input type="password" name="password" required>

    <button type="submit">Signup</button>
</form>
<?php include('templates/footer.php'); ?>
