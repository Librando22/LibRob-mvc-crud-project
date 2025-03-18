<?php
include 'db.php'; 

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $stmt = $conn->prepare("UPDATE Department SET IsActive = 0 WHERE DepartmentID = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $stmt->close();
    header("Location: index.php");
    exit(); }
?>
