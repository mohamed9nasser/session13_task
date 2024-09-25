<?php
require_once '../config/database.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $age = $_POST['age'];
    $class = $_POST['class'];

    $database = new Database();
    $db = $database->getConnection();

    $query = "INSERT INTO students (name, age, class) VALUES (:name, :age, :class)";
    $stmt = $db->prepare($query);
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':age', $age);
    $stmt->bindParam(':class', $class);

    if ($stmt->execute()) {
        header("Location: ../views/list_students.php");
    } else {
        echo "Error: Unable to add student.";
    }
}
