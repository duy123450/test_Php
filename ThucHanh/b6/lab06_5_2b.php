<?php
$url = 'http://dantri.com.vn/';
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$content = curl_exec($ch);
curl_close($ch);

$pattern = '/<p class="article-title-sm"><a[^>]*>(.*?)<\/a><\/p>/is'; 
$titles = [];

if (preg_match_all($pattern, $html_content, $matches)) {
    $titles = $matches[1];
    
    echo "<h1>Danh sách Tiêu đề mục Xã hội từ Dan Tri</h1>";
    echo "<ol>";
    
    foreach ($titles as $title) {
        // Loại bỏ các thẻ HTML còn sót lại và khoảng trắng thừa
        $clean_title = trim(strip_tags($title));
        echo "<li>" . htmlspecialchars($clean_title) . "</li>";
    }
    
    echo "</ol>";

} else {
    echo "<h1>Không tìm thấy tiêu đề tin bài nào với mẫu RegEx đã cho.</h1>";
    echo "Vui lòng kiểm tra lại cấu trúc HTML của trang web Dan Tri.";
}