<?php
include 'db.php'; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['department_name'];
    $code = $_POST['department_code'];
    $college_id = $_POST['college_id'];

    $stmt = $conn->prepare("INSERT INTO Department (CollegeID, DepartmentName, DepartmentCode, IsActive) VALUES (?, ?, ?, 1)");
    $stmt->bind_param("iss", $college_id, $name, $code);
    $stmt->execute();
    $stmt->close();
    header("Location: index.php");
    exit(); }
?>
