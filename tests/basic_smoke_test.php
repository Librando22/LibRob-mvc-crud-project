<?php
require_once 'db_connection.php';

try {
    $result = $conn->query("SELECT 1");
    if ($result) {
        echo "DB connection OK\n";
        exit(0);
    } else {
        echo "DB connection failed\n";
        exit(1);
    }
} catch (Exception $e) {
    echo "Exception: " . $e->getMessage() . "\n";
    exit(1);
}