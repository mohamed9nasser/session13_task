<?php
class Student {
    private $conn;
    private $table_name = "students";

    public $id;
    public $name;
    public $email;
    public $age;

    public function __construct($db) {
        $this->conn = $db;
    }

    // إضافة طالب جديد
    public function create() {
        $query = "INSERT INTO " . $this->table_name . " SET name=:name, email=:email, age=:age";
        $stmt = $this->conn->prepare($query);

        // تنظيف البيانات
        $this->name = htmlspecialchars(strip_tags($this->name));
        $this->email = htmlspecialchars(strip_tags($this->email));
        $this->age = htmlspecialchars(strip_tags($this->age));

        // ربط البيانات
        $stmt->bindParam(":name", $this->name);
        $stmt->bindParam(":email", $this->email);
        $stmt->bindParam(":age", $this->age);

        // تنفيذ الاستعلام
        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    // الحصول على جميع الطلاب
    public function read() {
        $query = "SELECT * FROM " . $this->table_name;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    // الحصول على طالب معين
    public function readOne() {
        $query = "SELECT * FROM " . $this->table_name . " WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id", $this->id);
        $stmt->execute();
        return $stmt;
    }

    // تحديث بيانات طالب
    public function update() {
        $query = "UPDATE " . $this->table_name . " SET name = :name, email = :email, age = :age WHERE id = :id";
        $stmt = $this->conn->prepare($query);

        // تنظيف البيانات
        $this->name = htmlspecialchars(strip_tags($this->name));
        $this->email = htmlspecialchars(strip_tags($this->email));
        $this->age = htmlspecialchars(strip_tags($this->age));

        // ربط البيانات
        $stmt->bindParam(":name", $this->name);
        $stmt->bindParam(":email", $this->email);
        $stmt->bindParam(":age", $this->age);
        $stmt->bindParam(":id", $this->id);

        // تنفيذ الاستعلام
        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    // حذف طالب
    public function delete() {
        $query = "DELETE FROM " . $this->table_name . " WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id", $this->id);
        if ($stmt->execute()) {
            return true;
        }
        return false;
    }
}
?>
