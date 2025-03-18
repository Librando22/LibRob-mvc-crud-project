<?php
include 'db.php'; 

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $result = $conn->query("SELECT * FROM Department WHERE DepartmentID=$id");
    $department = $result->fetch_assoc(); }

if (isset($_POST['update'])) {
    $department_name = $_POST['department_name'];
    $department_code = $_POST['department_code'];
    $college_id = $_POST['college_id'];

    $update_query = "UPDATE Department SET DepartmentName='$department_name', DepartmentCode='$department_code', CollegeID='$college_id' WHERE DepartmentID=$id";
    
    if ($conn->query($update_query) === TRUE) {
        echo "Department updated successfully!";
    } else {
        echo "Error: " . $conn->error; } }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Department</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-4">
        <h2>Edit Department</h2>
        <form method="POST">
            <div class="mb-3">
                <label class="form-label">Department Name:</label>
                <input type="text" name="department_name" value="<?php echo $department['DepartmentName']; ?>" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Department Code:</label>
                <input type="text" name="department_code" value="<?php echo $department['DepartmentCode']; ?>" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">College:</label>
                <select name="college_id" class="form-control" required>
                    <?php
                    $colleges = $conn->query("SELECT * FROM College WHERE IsActive=1");
                    while ($row = $colleges->fetch_assoc()) {
                        $selected = ($row['CollegeID'] == $department['CollegeID']) ? 'selected' : '';
                        echo "<option value='" . $row['CollegeID'] . "' $selected>" . $row['CollegeName'] . "</option>"; }
                    ?>
                </select>
            </div>
            <button type="submit" name="update" class="btn btn-primary">Update Department</button>
        </form>
    </div>
</body>
</html>
