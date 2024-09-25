<?php
require_once '../config/database.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $age = $_POST['age'];
    $class = $_POST['class'];

    $database = new Database();
    $db = $database->getConnection();

    $query = "UPDATE students SET name = :name, age = :age, class = :class WHERE id = :id";
    $stmt = $db->prepare($query);
    $stmt->bindParam(':id', $id);
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':age', $age);
    $stmt->bindParam(':class', $class);

    if ($stmt->execute()) {
        header("Location: ../views/list_students.php");
    } else {
        echo "Error: Unable to update student.";
    }
}

