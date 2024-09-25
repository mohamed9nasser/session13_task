<?php include 'layout.php'; ?>

<?php

require_once '../config/database.php'; // ربط قاعدة البيانات
require_once '../models/Student.php'; // ربط نموذج الطلاب

$database = new Database();
$db = $database->getConnection();
$student = new Student($db); // إنشاء كائن من نموذج الطلاب
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Student</title>
</head>
<body>
    <h2>Add New Student</h2>
    <form action="../controllers/addStudentController.php" method="POST">
        <label for="name">Student Name:</label>
        <input type="text" id="name" name="name" required><br><br>

        <label for="age">Age:</label>
        <input type="number" id="age" name="age" required><br><br>

        <label for="class">Class:</label>
        <input type="text" id="class" name="class" required><br><br>

        <button type="submit">Add Student</button>
    </form>

   <?php
   include "footer.php";
   ?>
</body>
</html>
