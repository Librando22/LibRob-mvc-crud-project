<?php
include 'db.php';

if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $department_name = $_POST['department_name'];
    $department_code = $_POST['department_code'];
    $college_id = $_POST['college_id'];

    $sql = "UPDATE Department SET DepartmentName = '$department_name', DepartmentCode = '$department_code', CollegeID = '$college_id' WHERE DepartmentID = $id";

    if ($conn->query($sql) === TRUE) {
        echo "Record updated successfully!";
        header("Location: index.php");
        exit();
    } else {
        echo "Error updating record: " . $conn->error; } }
?>
