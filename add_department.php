<?php
include 'db_connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $departmentName = trim($_POST['department_name']);

    if (!empty($departmentName)) {
        $stmt = $conn->prepare("INSERT INTO departments (DepartmentName) VALUES (?)");
        $stmt->bind_param("s", $departmentName);

        if ($stmt->execute()) {
            echo "<script>alert('Department added successfully.'); window.location.href='department_management.php';</script>";
        } else {
            echo "<script>alert('Error adding department. Please try again.'); window.history.back();</script>";
        }

        $stmt->close();
    } else {
        echo "<script>alert('Department name cannot be empty.');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Department</title>
    <link rel="stylesheet" href="styles.css">
    <script>
        function confirmAdd() {
            return confirm("Are you sure you want to add this department?");
        }
    </script>
</head>
<body>
    <div class="container">
        <h2>Add Department</h2>
        <form method="POST" onsubmit="return confirmAdd();">
            <label for="department_name">Department Name:</label>
            <input type="text" id="department_name" name="department_name" required>
            <button type="submit" class="btn btn-primary">Add Department</button>
            <a href="department_management.php" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
</body>
</html>
