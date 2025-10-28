<?php
if (!isset($_SESSION))
    session_start();
$n = isset($_SESSION["dem"]) ? $_SESSION["dem"] : 0;
print_r($_SESSION);
$n++;
?>
<h1>Bạn đã truy cập vào trang web <?php echo $n ?> lần</h1>
<a href="vd2.php">Toi VD2</a>
<?php $_SESSION["dem"] = $n ?>