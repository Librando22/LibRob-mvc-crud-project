<?php
require_once __DIR__ . '/UniversityApp/db_connection.php';

$result = $conn->query("SELECT 1");

if ($result) {
    echo " DB connection OK\n";
    exit(0);
} else {
    echo " DB connection failed\n";
    exit(1);
}