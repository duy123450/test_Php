<?php
$url = 'https://vnexpress.net/the-thao';
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$content = curl_exec($ch);
curl_close($ch);

$email_pattern = '/^[a-zA-Z0-9._-]+@[a-zA-Z0-9-]+\.[a-zA-Z.]{2,5}$/';
$phone_pattern = '/(\+?[0-9]{1,4}[ -]?)?(\(?\d{3}\)?[ -]?)?\d{3}[ -]?\d{4}/';

preg_match_all($email_pattern, $content, $emails);
preg_match_all($phone_pattern, $content, $phones);

echo "Emails:\n";
var_dump($emails[0]);

$count = 0;
$maxLinks = 10;
echo "\nPhones:\n\n";
foreach($phones[0] as $p){
    echo $count + 1 . ": " . $p . "<br>";
    $count++;
    if($count >= $maxLinks){
        break;
    }
}