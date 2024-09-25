<?php include 'layout.php'; ?>
<?php

require_once '../config/database.php'; // ربط قاعدة البيانات
require_once '../models/Student.php'; // ربط نموذج الطلاب

$database = new Database();
$db = $database->getConnection();
$student = new Student($db); // إنشاء كائن من نموذج الطلاب
?>

<h2>Students List</h2>
<table border="1">
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Age</th>
        <th>Class</th>
        <th>Actions</th>
    </tr>

    <?php
    require_once '../config/database.php';

    $database = new Database();
    $db = $database->getConnection();

    $query = "SELECT * FROM students";
    $stmt = $db->prepare($query);
    $stmt->execute();

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        echo "<tr>";
        echo "<td>{$row['id']}</td>";
        echo "<td>{$row['name']}</td>";
        echo "<td>{$row['age']}</td>";
        echo "<td>{$row['class']}</td>";
        echo "<td>
                <a href='edit_student.php?id={$row['id']}'>Edit</a> | 
                <a href='../controllers/deleteStudentController.php?id={$row['id']}'>Delete</a>
              </td>";
        echo "</tr>";
    }
    ?>
</table>

<?php
   include "footer.php";
   ?>