<?php
$pro_arr = [
    'Loai 1',
    'Loai 2',
    'Loai 3'
];
$final_selection = [];

if (
    isset($_GET['pro_name']) && 
    isset($_GET['tim']) && 
    isset($_GET['pro_select']) && 
    is_array($_GET['pro_select'])
) {
    $pro_name = htmlspecialchars($_GET['pro_name']);
    $tim = htmlspecialchars($_GET['tim']);
    $selected_values = $_GET['pro_select'];

    echo "<h1>Selected Products</h1>";
    echo "<h3>Ten sp: " . $pro_name . "</h3>";
    echo "<h3>Cach tim: " . ($tim === 'gan_dung' ? 'Gan dung' : 'Chinh xac') . "</h3>";

    if (in_array('all', $selected_values)) {
        $final_selection = $pro_arr;
        echo "<h4>Selection mode: ALL PRODUCT</h4>";
    } else {
        $final_selection = array_filter($selected_values, function($val) {
            return $val !== ''; 
        });
        echo "<h4>Selection mode: SPECIFIC PRODUCT</h4>";
    }

    echo "<h3>Loai sp:</h3>";
    echo "<ul>";
    foreach ($final_selection as $pro_val) {
        echo "<li>" . htmlspecialchars(ucfirst($pro_val)) . "</li>";
    }
    echo "</ul>";
} else {
    echo "No product name, search method, or product type was submitted.";
}