<?php
// database configuration
$host = 'localhost';
$user = 'root';
$password = '';
$database = 'todo';

// connect with the database
try {
    $pdo = new PDO("mysql:host=$host;dbname=$database", $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
return $pdo;