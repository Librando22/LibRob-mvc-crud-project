<?php
include 'db.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>University Management</title>
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
        <h2>University Management System</h2>

        <h4>Add College</h4>
        <form action="add_college.php" method="POST">
            <div class="mb-3">
                <label class="form-label">College Name</label>
                <input type="text" name="college_name" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">College Code</label>
                <input type="text" name="college_code" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Add College</button>
        </form>

        <h4 class="mt-4">Add Department</h4>
        <form action="add_department.php" method="POST">
            <div class="mb-3">
                <label class="form-label">Department Name</label>
                <input type="text" name="department_name" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Department Code</label>
                <input type="text" name="department_code" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">College</label>
                <select name="college_id" class="form-control" required>
                    <?php
                    $result = $conn->query("SELECT * FROM College WHERE IsActive=1");
                    while ($row = $result->fetch_assoc()) {
                        echo "<option value='" . $row['CollegeID'] . "'>" . $row['CollegeName'] . "</option>"; }
                    ?>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Add Department</button>
        </form>

        <h4 class="mt-4">Colleges</h4>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Code</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $result = $conn->query("SELECT * FROM College WHERE IsActive=1");
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>
                        <td>{$row['CollegeID']}</td>
                        <td>{$row['CollegeName']}</td>
                        <td>{$row['CollegeCode']}</td>
                        <td>
                            <a href='edit_college.php?id={$row['CollegeID']}' class='btn btn-warning'>Edit</a>
                            <a href='delete_college.php?id={$row['CollegeID']}' class='btn btn-danger'>Delete</a>
                        </td>
                    </tr>"; }
                ?>
            </tbody>
        </table>

        <h4 class="mt-4">Departments</h4>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Code</th>
                    <th>College</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $result = $conn->query("SELECT d.*, c.CollegeName FROM Department d JOIN College c ON d.CollegeID = c.CollegeID WHERE d.IsActive=1");
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>
                        <td>{$row['DepartmentID']}</td>
                        <td>{$row['DepartmentName']}</td>
                        <td>{$row['DepartmentCode']}</td>
                        <td>{$row['CollegeName']}</td>
                        <td>
                            <a href='edit_department.php?id={$row['DepartmentID']}' class='btn btn-warning'>Edit</a>
                            <a href='delete_department.php?id={$row['DepartmentID']}' class='btn btn-danger'>Delete</a>
                        </td>
                    </tr>"; }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
