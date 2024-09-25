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
    <?php if (isset($_SESSION['user_id'])): ?>
        <nav>
            <ul>
            <li><a href="landing.php">Home</a></li>
                <li><a href="list_students.php">Students</a></li>
                <li><a href="add_student.php">Add Student</a></li>
                <li><a href="../controllers/logout.php">Logout</a></li>
            </ul>
        </nav>
        <p>Welcome, <?php echo htmlspecialchars($_SESSION['user_name']); ?>!</p>
    <?php endif; ?>

    <!-- باقي محتوى الصفحة -->
    
    
</body>
</html>
