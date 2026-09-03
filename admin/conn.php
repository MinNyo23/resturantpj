<?php
$host = getenv('DB_HOST') ?: '127.0.0.1';
$user = getenv('DB_USER') ?: 'root';
$password = getenv('DB_PASSWORD') ?: '';
$database = getenv('DB_NAME') ?: 'restaurant';
$port = (int) (getenv('DB_PORT') ?: 3306);

$connection = mysqli_connect($host, $user, $password, $database, $port);
if (!$connection) {
    http_response_code(500);
    die('Database connection failed. Check the DB_* environment variables.');
}

mysqli_set_charset($connection, 'utf8mb4');
?>
