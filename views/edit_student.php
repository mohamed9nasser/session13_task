<?php include 'layout.php'; ?>
<?php

require_once '../config/database.php'; // ربط قاعدة البيانات
require_once '../app/models/Student.php'; // ربط نموذج الطلاب

$database = new Database();
$db = $database->getConnection();
$student = new Student($db); // إنشاء كائن من نموذج الطلاب
?>

<?php
require_once '../config/database.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $database = new Database();
    $db = $database->getConnection();

    $query = "SELECT * FROM students WHERE id = :id";
    $stmt = $db->prepare($query);
    $stmt->bindParam(':id', $id);
    $stmt->execute();

    $student = $stmt->fetch(PDO::FETCH_ASSOC);
}

if (!$student) {
    echo "No student found!";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Student</title>
</head>
<body>
    <h2>Edit Student</h2>
    <form action="../controllers/updateStudentController.php" method="POST">
        <input type="hidden" name="id" value="<?php echo $student['id']; ?>">
        
        <label for="name">Student Name:</label>
        <input type="text" id="name" name="name" value="<?php echo $student['name']; ?>" required><br><br>

        <label for="age">Age:</label>
        <input type="number" id="age" name="age" value="<?php echo $student['age']; ?>" required><br><br>

        <label for="class">Class:</label>
        <input type="text" id="class" name="class" value="<?php echo $student['class']; ?>" required><br><br>

        <button type="submit">Update Student</button>
    </form>

    <?php
   include "footer.php";
   ?>
</body>
</html>
