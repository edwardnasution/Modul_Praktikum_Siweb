<?php
session_start();

$_SESSION = [];

session_unset();
session_destroy();

if (isset($_COOKIE['id_user'])) {
    setcookie('id_user', '', time() - 3600, '/');
}
if (isset($_COOKIE['key'])) {
    setcookie('key', '', time() - 3600, '/');
}

header("Location: ../login.php");
exit;
