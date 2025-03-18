<?php
include 'db.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $result = $conn->query("SELECT * FROM College WHERE CollegeID = $id");

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else {
        echo "College not found!";
        exit; }
} else {
    echo "Invalid request!";
    exit; }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit College</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-4">
        <h2>Edit College</h2>
        <form method="POST" action="update_college.php">
            <input type="hidden" name="id" value="<?php echo $row['CollegeID']; ?>">
            
            <div class="mb-3">
                <label class="form-label">College Name:</label>
                <input type="text" name="college_name" value="<?php echo $row['CollegeName']; ?>" class="form-control" required>
            </div>
            
            <div class="mb-3">
                <label class="form-label">College Code:</label>
                <input type="text" name="college_code" value="<?php echo $row['CollegeCode']; ?>" class="form-control" required>
            </div>

            <button type="submit" name="update" class="btn btn-primary">Update College</button>
        </form>
    </div>
</body>
</html>
