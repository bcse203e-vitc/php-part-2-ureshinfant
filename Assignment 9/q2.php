<?php
$lines = file("products.txt", FILE_IGNORE_NEW_LINES);
$products = [];
for ($i = 0; $i < count($lines); $i += 2) {
    $products[$lines[$i]] = (int)$lines[$i + 1];
}
asort($products);
echo "<table border='1'><tr><th>Product</th><th>Price</th></tr>";
foreach ($products as $p => $price) {
    echo "<tr><td>$p</td><td>$price</td></tr>";
}
echo "</table>";
?>

