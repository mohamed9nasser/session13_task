<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/styles.css"> <!-- ربط ملف CSS -->
    <title>Register</title>
</head>
<body>
<header>
        <h1>Welcome to Student Management System</h1>
    </header>
    <h2>Register</h2>

    <?php
    if (isset($_GET['error'])) {
        echo "<p style='color:red;'>Error in registration</p>";
    }
    ?>

    <form action="../controllers/registerController.php" method="POST">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required><br><br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br><br>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required><br><br>

        <button type="submit">Register</button>
    </form>

    <p>Already have an account? <a href="login.php">Login here</a>.</p>

    <?php 
    include "footer.php";
    ?>
</body>
</html>
