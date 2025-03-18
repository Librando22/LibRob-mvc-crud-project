<?php
include 'db.php';

if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $college_name = $_POST['college_name'];
    $college_code = $_POST['college_code'];

    $sql = "UPDATE College SET CollegeName = '$college_name', CollegeCode = '$college_code' WHERE CollegeID = $id";

    if ($conn->query($sql) === TRUE) {
        echo "Record updated successfully!";
        header("Location: index.php");
        exit();
    } else {
        echo "Error updating record: " . $conn->error; } }
?>
