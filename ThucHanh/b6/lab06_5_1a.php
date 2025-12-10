<?php
$url = 'https://vnexpress.net/the-thao';
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$content = curl_exec($ch);
curl_close($ch);
$links = [];
if(preg_match_all('/<a\s+(?:[^>]*?\s+)?href=["\'](.*?)(?=["\'])/is', $content, $matches))
 $links = $matches[1];
echo "<h3>Danh sách các URL được tìm thấy:</h3>";
print_r($links);