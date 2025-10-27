<?php
$arr = [
    ['id' => 1, 'name' => 'Phone', 'price' => 10],
    ['id' => 2, 'name' => 'Laptop', 'price' => 12],
    ['id' => 3, 'name' => 'Fan', 'price' => 6]
];
?>
<a href="?sort=asc">Tang dan</a>
<a href="?sort=desc">Giam dan</a>
<h2>KQ hien thi mang arr da sap xep gia tang/giam</h2>
<?php // Sap xep mang
$sort = $_GET['sort'] ?? 'asc';
if ($sort == 'desc')
    usort($arr, function ($a, $b) {
        return $b['price'] - $a['price'];
    });
if ($sort == 'asc')
    usort($arr, function ($a, $b) {
        return $a['price'] - $b['price'];
    });
echo "<pre>" . $sort;
print_r($arr);
