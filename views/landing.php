<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Management System</title>
    <link rel="stylesheet" href="../css/styles.css"> <!-- ربط ملف CSS -->
</head>
<body>
    <header>
        <h1>Welcome to Student Management System</h1>
    </header>
    
    <nav>
        <ul>
        <?php if (!isset($_SESSION['user_id'])): ?>
            <li><a href="login.php">Login</a></li>
            <li><a href="register.php">Register</a></li>
            <?php endif; ?>
            <?php if (isset($_SESSION['user_id'])): ?>
                <li><a href="list_students.php">View Students</a></li>
                <li><a href="add_student.php">Add Student</a></li>
                <li><a href="../controllers/logout.php">Logout</a></li>
                <p>Welcome, <?php echo htmlspecialchars($_SESSION['user_name']); ?>!</p>
                <?php endif; ?>
        </ul>
    </nav>

    <?php
   include "footer.php";
   ?>

</body>
</html>