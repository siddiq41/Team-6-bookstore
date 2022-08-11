<?php

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header("Location: signup.html");
    exit();
}
 inputs.
if (!isset($_POST['name'], $_POST['email'], $_POST['password'], $_POST['confirm-password'])) {
    header("Location: signup.html");
    exit();
}

require_once 'database.php';
session_start();

$name = $connection->real_escape_string($_POST['name']);
$email = $connection->real_escape_string($_POST['email']);
$password = $connection->real_escape_string($_POST['password']);
$passwordConfirmation = $connection->real_escape_string($_POST['confirm-password']);

if (empty($name) || empty($email) || empty($password) || empty($passwordConfirmation)) {
    $_SESSION['error'] = 'Missing inputs.';
    header("Location: login.html");
    exit();
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $_SESSION['error'] = 'Invalid email.';
    header("Location: login.html");
    exit();
}

if ($password !== $passwordConfirmation) {
    $_SESSION['error'] = 'Password does not match Password Confirmation.';
    header("Location: login.html");
    exit();
}

$result = $connection->query("SELECT * FROM users WHERE email='$email'");
if ($result->num_rows > 0) {
    $_SESSION['error'] = 'User already exists.';
    header("Location: login.html");
    exit();
}

$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

$connection->query("INSERT INTO users (`name`, `email`, `password`) VALUES ('$name', '$email', '$hashedPassword')");

header("Location: login.html");
exit();
