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

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $newDepartmentName = $_POST['department_name'];

        if (!empty($newDepartmentName)) {
            $stmt = $conn->prepare("UPDATE departments SET DepartmentName = ? WHERE DepartmentID = ?");
            $stmt->bind_param("si", $newDepartmentName, $departmentID);

            if ($stmt->execute()) {
                echo "<script>alert('Department updated successfully.'); window.location.href='department_management.php';</script>";
            } else {
                echo "<script>alert('Error updating department.'); window.history.back();</script>";
            }

            $stmt->close();
        } else {
            echo "<script>alert('Department name cannot be empty.');</script>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Department</title>
    <link rel="stylesheet" href="styles.css"> 
    <script>
        function confirmUpdate() {
            return confirm("Are you sure you want to save these changes?");
        }
    </script>
</head>
<body>
    <div class="container">
        <h2>Edit Department</h2>
        <form method="POST" onsubmit="return confirmUpdate();">
            <label for="department_name">Department Name:</label>
            <input type="text" id="department_name" name="department_name" value="<?php echo htmlspecialchars($departmentName); ?>" required>
            <button type="submit" class="btn btn-success">Save Changes</button>
            <a href="department_management.php" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
</body>
</html>
