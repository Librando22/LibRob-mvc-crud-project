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

    if (isset($_POST['confirm_delete'])) {
        $stmt = $conn->prepare("DELETE FROM colleges WHERE CollegeID = ?");
        $stmt->bind_param("i", $collegeID);

        if ($stmt->execute()) {
            echo "<script>alert('College deleted successfully.'); window.location.href='college_management.php';</script>";
        } else {
            echo "<script>alert('Error deleting college.'); window.history.back();</script>";
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
    <title>Delete College</title>
    <link rel="stylesheet" href="styles.css"> 
</head>
<body>
    <div class="container">
        <h2>Delete Confirmation</h2>
        <p>Are you sure you want to delete <strong><?php echo htmlspecialchars($collegeName); ?></strong>?</p>

        <form method="POST">
            <button type="submit" name="confirm_delete" class="btn btn-danger">Yes, Delete</button>
            <a href="college_management.php" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
</body>
</html>

