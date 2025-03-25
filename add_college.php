<?php
include 'db_connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $collegeName = trim($_POST['college_name']);

    if (!empty($collegeName)) {
        $stmt = $conn->prepare("INSERT INTO colleges (CollegeName) VALUES (?)");
        $stmt->bind_param("s", $collegeName);

        if ($stmt->execute()) {
            echo "<script>alert('College added successfully.'); window.location.href='college_management.php';</script>";
        } else {
            echo "<script>alert('Error adding college. Please try again.'); window.history.back();</script>";
        }

        $stmt->close();
    } else {
        echo "<script>alert('College name cannot be empty.');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add College</title>
    <link rel="stylesheet" href="styles.css">
    <script>
        function confirmAdd() {
            return confirm("Are you sure you want to add this college?");
        }
    </script>
</head>
<body>
    <div class="container">
        <h2>Add College</h2>
        <form method="POST" onsubmit="return confirmAdd();">
            <label for="college_name">College Name:</label>
            <input type="text" id="college_name" name="college_name" required>
            <button type="submit" class="btn btn-primary">Add College</button>
            <a href="college_management.php" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
</body>
</html>
