<?php

require_once 'core.php';

$productId = $_GET['i'];

$sql = "SELECT product_image FROM products WHERE product_id = {$productId}";
$data = $conn->query($sql);
$result = $data->fetch_row();

$conn->close();

echo 'stock/'.$result[0];

