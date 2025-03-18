<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['college_name'];
    $code = $_POST['college_code'];
    
    $stmt = $conn->prepare("INSERT INTO college (CollegeName, CollegeCode, IsActive) VALUES (?, ?, 1)");
    $stmt->bind_param("ss", $name, $code);
    $stmt->execute();
    
    header("Location: index.php");
    exit(); }
?>
