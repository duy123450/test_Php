<?php
$url = 'https://vnexpress.net/the-thao';
$content = file_get_contents($url);
if ($content !== false) {
    $pattern = '/<div[^>]*>.*?<[^>]*class=["\']title_news["\'][^>]*>.*?<\/div>/is';

    preg_match_all($pattern, $content, $arr);

    if (!empty($arr[0]))
        foreach ($arr[0] as $divContent)
            echo "Nội dung: <br>" . htmlspecialchars($divContent) . "<br><br>";
    else 
        echo "Không tìm thấy các thẻ <div class=\'title_news\'>";
}
else 
    echo "Không thể tải nội dung trang.";