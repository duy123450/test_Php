<?php
if (!isset($_SESSION))
    session_start();
if (!isset($_SESSION['admin'])) { // chua dang nhap
    header('Location: login.php');
    exit();
}
?>
<h1>Trang them sp</h1>
<h2>Chao <?php echo $_SESSION['admin']; ?></h2>
<form action="./logout.php" method="post">
    <input type="submit" value="Logout" />
</form>