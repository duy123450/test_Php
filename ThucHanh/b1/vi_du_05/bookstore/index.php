<?php
include "config.php";
$obj = null;
try{
	$dsn="mysql:host=". HOST."; dbname=".DATABASE;
	//$dns ="mysql:host=" . $this->host."; dbname=". $this->database;
	$obj = new PDO($dsn, USERNAME, PASSWORD);
	$obj->query("set names 'utf8' ");
	}
catch(Exception $e)
{
	echo $e->getMessage();	exit;
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link href="css/style.css" rel="stylesheet" type="text/css" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Trang chủ....</title>
</head>

<body>
	<div id="container">
    	<?php
		$sql="select * from sach ";
		$stm = $obj->prepare($sql);
		$stm->execute();
		$data = $stm->fetchAll(PDO::FETCH_ASSOC);
		foreach($data as $book)
		{
			?>
            <div class="book">
            	ID:<?php echo $book["masach"];?><br>
                Name:<?php echo $book["tensach"];?><br>
                <img src="image_data/<?php echo $book["hinh"];?>" />
            </div>
            <?php
		}
		?>
    </div>
</body>
</html>