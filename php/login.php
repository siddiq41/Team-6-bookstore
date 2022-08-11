<?php
page.
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header("Location: login.html");
    exit();
}

if (!isset($_POST['email'], $_POST['password'])) {
    header("Location: login.html");
    exit();
}

require_once 'database.php';
session_start();

$email = $connection->real_escape_string($_POST['email']);
$password = $connection->real_escape_string($_POST['password']);

if (empty($email) || empty($password)) {
    $_SESSION['error'] = 'Missing inputs.';
    header("Location: login.html");
    exit();
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $_SESSION['error'] = 'Invalid email.';
    header("Location: login.html");
    exit();
}

$result = $connection->query("SELECT * FROM users WHERE email='$email'");
if ($result->num_rows <= 0) {
    $_SESSION['error'] = 'User not found.';
    header("Location: login.html");
    exit();
}

if ($row = $result->fetch_assoc()) {

    if (!password_verify($password, $row['password'])) {
        $_SESSION['error'] = 'Invalid credentials.';
        header("Location: login.html");
        exit();
    }

    $_SESSION['id'] = $row['id'];
    $_SESSION['name'] = $row['name'];
    $_SESSION['email'] = $row['email'];

    header("Location: mainpage.html");
    exit();
}
exit();
