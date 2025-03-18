<?php
include 'db.php'; 

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $stmt = $conn->prepare("UPDATE College SET IsActive = 0 WHERE CollegeID = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $stmt->close();
    header("Location: index.php");
    exit(); }
?>
