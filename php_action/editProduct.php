<?php

require_once 'core.php';

$valid['success'] = array('success' => false, 'messages' => array());

if($_POST){
    $productId = $_POST['productId'];
    $productName = $_POST['editProductName'];
    $quantity = $_POST['editQuantity'];
    $rate = $_POST['editRate'];
    $brandName = $_POST['editBrandName'];
    $categoryName = $_POST['editCategoryName'];
    $productStatus = $_POST['editProductStatus'];

    $sql = "UPDATE products SET product_name = '$productName', pbrand_id = '$brandName', pcategory_id = '$categoryName', product_quantity = '$quantity', product_rate = '$rate', product_active = '$productStatus', product_status = 1 WHERE product_id = '$productId'";

    if($conn->query($sql) === TRUE){
        $valid['success'] = true;
        $valid['messages'] = "Successfully Update";
    }else{
        $valid['success'] = false;
        $valid['messages'] = "Error while updating product info";
    }

    $conn->close();

    echo json_encode($valid);

}