<?php
$a = ['1' => 'Loai 1'];
$stmt = $connet->prepare($sql);
$stmt->execute($a);

// kq dung
$sql = 'insert into category values(?, ?)';