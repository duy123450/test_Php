<?php
$url = 'https://vnexpress.net/the-thao';
$content = file_get_contents($url);
echo $content;

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$content = curl_exec($ch);
curl_close($ch);
echo $content;
?>