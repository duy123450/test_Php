<?php
include_once "1.php";
if(isset($_GET['id'])){
    $target_id = (int) $_GET['id'];
    $found_pro = null;

    foreach ($arr as $pro) {
        if($pro['id'] == $target_id){
                $found_pro = $pro;
                break;
        }
    }

    if ($found_pro) {
        echo "<h1>Product Details</h1>";
        echo "<ul>";
        foreach ($found_pro as $k => $v)
            echo "<li><strong>" . ucfirst($k) . ":</strong> " . htmlspecialchars($v) . "</li>";
        echo "</ul>";
    } else
        echo "<h1>Product with " . $target_id . "</h1>";
} else
    echo "No product ID was provided in the URL.";