<?php 

include "../db_connect.php";

$name = $_POST["name"];
$phone = $_POST["phone"];
$email = $_POST["email"];
$password = $_POST["password"];
$address = $_POST['address'];
$status = 0;

$sql = "INSERT INTO users (name, email, password, phone, address, status) VALUES (:name, :email, :password, :phone, :address, :status)";

$stmt = $conn->prepare($sql);
$stmt->bindParam(':name', $name);
$stmt->bindParam(':phone', $phone);
$stmt->bindParam(':email', $email);
$stmt->bindParam(':password', $password);
$stmt->bindParam(':address', $address);
$stmt->bindParam(':status', $status);
$stmt->execute();

$user_id = $conn->lastInsertId();
$role_id = 2;
$sql = "INSERT INTO model_has_roles (user_id, roles_id) VALUES (:user_id, :role_id)";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':user_id', $user_id);
$stmt->bindParam(':role_id', $role_id);
$stmt->execute();

header('Location: login.php');
exit;

