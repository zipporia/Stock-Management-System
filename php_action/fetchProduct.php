<?php

require_once 'core.php';

$sql = "SELECT products.product_id, products.product_name, products.product_image, products.pbrand_id, products.pcategory_id,  products.product_quantity, products.product_rate, products.product_active, products.product_status, brands.brand_name, categories.category_name 
FROM products 
INNER JOIN brands ON products.pbrand_id = brands.brand_id 
INNER JOIN categories ON products.pcategory_id = categories.category_id 
WHERE product.status = 1";

$result = $conn->query($sql);

$output = array('data' => array());

if($result->num_rows > 0){
    $active = "";

    while($row = $result->fetch_array()){
        // product id
        $productId = $row[0];

        if($row[7] == 1){
            $active = "<label class='label label-success'>Available</label>";
        }else{
            $active = "<label class='label label-danger'>Not Available</label>";
        }

        $button = '';
    }
}