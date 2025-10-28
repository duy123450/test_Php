<?php
$u = $_POST['username'] ?? '';
$p = $_POST['password'] ?? '';
if($u === 'admin' && $p === '123456') {
    if(!isset($_SESSION))
        session_start();
    $_SESSION['admin'] = $u;
    header('Location: index.php');
    exit();
}
header('Location: login.html');
?>