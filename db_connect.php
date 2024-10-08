<?php
$servername = "localhost";
$dbname = "shopules";
$dbuser = "root";
$dbpass = "";

$dsn = "mysql:host=$servername; dbname=$dbname";

$pdo = new PDO($dsn, $dbuser, $dbpass);

try {
    $conn = $pdo;
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // echo "Connected Successfully";
} catch(PDOException $e) {
    echo "Connection failed " .$e->getMessage();
}

