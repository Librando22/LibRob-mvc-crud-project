<?php
include 'db_connection.php'; 

if (isset($_GET['id'])) {
    $collegeID = $_GET['id'];

    $stmt = $conn->prepare("SELECT CollegeName FROM colleges WHERE CollegeID = ?");
    $stmt->bind_param("i", $collegeID);
    $stmt->execute();
    $stmt->bind_result($collegeName);
    $stmt->fetch();
    $stmt->close();

    if (!$collegeName) {
        echo "<script>alert('College not found.'); window.location.href='college_management.php';</script>";
        exit;
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $newCollegeName = $_POST['college_name'];

        if (!empty($newCollegeName)) {
            $stmt = $conn->prepare("UPDATE colleges SET CollegeName = ? WHERE CollegeID = ?");
            $stmt->bind_param("si", $newCollegeName, $collegeID);

            if ($stmt->execute()) {
                echo "<script>alert('College updated successfully.'); window.location.href='college_management.php';</script>";
            } else {
                echo "<script>alert('Error updating college.'); window.history.back();</script>";
            }

            $stmt->close();
        } else {
            echo "<script>alert('College name cannot be empty.');</script>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit College</title>
    <link rel="stylesheet" href="styles.css"> 
    <script>
        function confirmUpdate() {
            return confirm("Are you sure you want to save these changes?");
        }
    </script>
</head>
<body>
    <div class="container">
        <h2>Edit College</h2>
        <form method="POST" onsubmit="return confirmUpdate();">
            <label for="college_name">College Name:</label>
            <input type="text" id="college_name" name="college_name" value="<?php echo htmlspecialchars($collegeName); ?>" required>
            <button type="submit" class="btn btn-success">Save Changes</button>
            <a href="college_management.php" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
</body>
</html>
