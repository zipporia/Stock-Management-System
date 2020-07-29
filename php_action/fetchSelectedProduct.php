<?php

	require_once 'core.php';

	$productId = $_POST['productId'];

	$sql = "SELECT product_id, product_name, product_image, pbrand_id, pcategory_id, product_quantity, product_rate, product_active, product_status FROM products WHERE product_id = $productId";
	$result = $conn->query($sql);

	if($result->num_rows > 0){
		$row = $result->fetch_array();
	}

	$conn->close();

	echo json_encode($row);