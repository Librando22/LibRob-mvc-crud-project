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
<style>
    body {
        background-color: #0a0a0a;
        color: #00ffcc;
        font-family: 'Orbitron', sans-serif;
        text-align: center; }
    .container {
        border: 2px solid #00ffcc;
        padding: 20px;
        margin: 50px auto;
        width: 80%;
        border-radius: 10px;
        background: rgba(0, 0, 0, 0.8);
        box-shadow: 0 0 15px #00ffcc; }
    button {
        background: #00ffcc;
        border: none;
        padding: 10px;
        font-size: 18px;
        color: #0a0a0a;
        cursor: pointer;
        border-radius: 5px; }
    button:hover {
        background: #00cc99;
        box-shadow: 0 0 10px #00cc99; }
</style>
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
