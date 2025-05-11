<?php
$host = getenv('DB_HOST') ?: '127.0.0.1';
$user = getenv('DB_USER') ?: 'root';
$pass = getenv('DB_PASS') ?: '';
$db   = getenv('DB_NAME') ?: 'universitydb';

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die(" Connection failed: " . $conn->connect_error);
}
?>