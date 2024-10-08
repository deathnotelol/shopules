<?php
session_start();
include("../db_connect.php");

$email = $_POST['email'];
$password = $_POST['password'];

$sql = "SELECT users.*, model_has_roles.*, roles.name as role_name FROM users INNER JOIN model_has_roles ON users.id = model_has_roles.user_id 
INNER JOIN roles on model_has_roles.roles_id = roles.id
WHERE email=:email and password=:password";

$stmt = $conn->prepare($sql);
$stmt->bindParam(':email', $email);
$stmt->bindParam(':password', $password);
$stmt->execute();
$user = $stmt->fetch(PDO::FETCH_ASSOC);


if($stmt->rowCount() <= 0) { 
header('Location: login.php');
} else { 

    $_SESSION['login_user'] = $user;
    if($user['role_name'] == 'admin') {
        header('Location: ../backend/dashboard.php');
    } else {
        header('Location: index.php');
    }
}
