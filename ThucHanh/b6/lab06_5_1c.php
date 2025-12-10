<?php
$url = 'https://vnexpress.net/the-thao';
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$content = curl_exec($ch);
curl_close($ch);

$doc = new DOMDocument();
libxml_use_internal_errors(true);
$doc->loadHTML($content);

$imgs = $doc->getElementsByTagName('img');

$file_pattern = '/^[a-zA-Z0-9_-]+\.(jpg|jpeg|png|gif)$/';
foreach($imgs as $i){
    /** @var DOMElement $imgss */
    $src = $i->getAttribute('src');
    $file_name = basename($src);
    if(preg_match($file_pattern, $file_name))
        echo "Hinh anh hop le: $file_name\n <br>";
    else
        echo "Hinh anh ko hop le: $file_name\n <br>";
}