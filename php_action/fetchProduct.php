<?php

require_once 'core.php';

$sql = "SELECT products.product_id, products.product_name, products.product_image, products.pbrand_id, products.pcategory_id,  products.product_quantity, products.product_rate, products.product_active, products.product_status, brands.brand_name, categories.category_name 
FROM products 
INNER JOIN brands ON products.pbrand_id = brands.brand_id 
INNER JOIN categories ON products.pcategory_id = categories.category_id 
WHERE products.product_status = 1";

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

        $button = '<!-- Single button -->
        <div class="btn-group">
            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Action <span class="caret"></span>
            </button>
            <ul class="dropdown-menu">
                <li><a href="#"> <i class="glyphicon glyphicon-edit"></i> Edit </a></li>
                <li><a type="button" data-toggle="modal" data-target="#removeProductModal" onclick="removeProduct('.$productId.')"> <i class="glyphicon glyphicon-trash"></i> Remove </a></li>
            </ul>
        </div>';

        $brand = $row[9];
        $category = $row[10];

        $imageUrl = substr($row[2], 3);
        $prodcutImage = "<img class='img-round' src='".$imageUrl."' style='height:30px;width:50px;' />";

        $output['data'][] = array(
            $prodcutImage,
            // product name
            $row[1],
            // rate
            $row[6],
            // quantity
            $row[5],
            $brand,
            $category,
            $active,
            $button
        );

    } // while
} // if

$conn->close();

echo json_encode($output);