<?php
include 'db_connection.php';

if (isset($_GET['id'])) {
    $departmentID = $_GET['id'];

    $stmt = $conn->prepare("SELECT DepartmentName FROM departments WHERE DepartmentID = ?");
    $stmt->bind_param("i", $departmentID);
    $stmt->execute();
    $stmt->bind_result($departmentName);
    $stmt->fetch();
    $stmt->close();

    if (!$departmentName) {
        echo "<script>alert('Department not found.'); window.location.href='department_management.php';</script>";
        exit;
    }

    if (isset($_POST['confirm_delete'])) {
        $stmt = $conn->prepare("DELETE FROM departments WHERE DepartmentID = ?");
        $stmt->bind_param("i", $departmentID);

        if ($stmt->execute()) {
            echo "<script>alert('Department deleted successfully.'); window.location.href='department_management.php';</script>";
        } else {
            echo "<script>alert('Error deleting department.'); window.history.back();</script>";
        }

        $stmt->close();
        $conn->close();
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Department</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h2>Delete Confirmation</h2>
        <p>Are you sure you want to delete <strong><?php echo htmlspecialchars($departmentName); ?></strong>?</p>

        <form method="POST">
            <button type="submit" name="confirm_delete" class="btn btn-danger">Yes, Delete</button>
            <a href="department_management.php" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
</body>
</html>

