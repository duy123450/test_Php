<?php
$product = [
    ['id' => 'sp1', 'name' => 'Iphone', 'qty' => 4, 'price' => 48],
    ['id' => 'sp2', 'name' => 'Samsung', 'qty' => 2, 'price' => 60]
];

$sort_order = $_GET['sort'] ?? 'asc';
if ($sort_order === 'asc') 
    usort($product, function ($a, $b) {
        return $a['price'] <=> $b['price'];
    });
else
    usort($product, function ($a, $b) {
        return $b['price'] <=> $a['price'];
    });
?>

<a href="?sort=asc">Tăng dần (ASC)</a> |
<a href="?sort=desc">Giảm dần (DESC)</a> |

<table border="1" cellspacing='0' cellpadding='0'>
    <tr>
        <th>id</th>
        <th>name</th>
        <th>quantity</th>
        <th>price</th>
    </tr>
    <?php foreach ($product as $item): ?>
    <tr>
        <td><?php echo htmlspecialchars($item['id']); ?></td>
        <td><?php echo htmlspecialchars($item['name']); ?></td>
        <td><?php echo htmlspecialchars($item['qty']); ?></td>
        <td><?php echo htmlspecialchars($item['price']); ?></td>
    </tr>
    <?php endforeach; ?>
</table>