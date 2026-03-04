<?php
session_start();

$username = $_POST['username'];
$password = $_POST['password'];

if ($username == "admin" && $password == "123") {

    $_SESSION['login'] = true;
    $_SESSION['user'] = $username;

    if (isset($_POST['remember'])) {
        setcookie('id_user', $username, time() + 3600, "/");

        $key = hash('sha256', $username);
        setcookie('key', $key, time() + 3600, "/");
    }

    header("Location: index.php");
    exit;
} else {
    echo "Login Gagal";
}
