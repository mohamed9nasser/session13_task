<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/styles.css"> <!-- ربط ملف CSS -->
    <title>Login</title>
</head>
<body>
<header>
        <h1>Welcome to Student Management System</h1>
    </header>
    <h2>Login</h2>

    <?php
    if (isset($_GET['error'])) {
        echo "<p style='color:red;'>Invalid email or password</p>";
    }
    ?>

    <form action="../controllers/loginController.php" method="POST">
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br><br>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required><br><br>

        <button type="submit">Login</button>
    </form>

    <p>Don't have an account? <a href="register.php">Register here</a>.</p>
    <?php 
    include "footer.php";
    ?>
</body>
</html>
