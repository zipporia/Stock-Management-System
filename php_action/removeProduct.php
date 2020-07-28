<?php

require_once 'core.php';

$valid['success'] = array('success' => false, 'messages' => array());

$productId = $_POST['productId'];

if($productId){
    $sql = "UPDATE products SET product_active = 2, product_status = 2 WHERE product_id = {$productId}";

    if($conn->query($sql) === TRUE){
        $valid['success'] = true;
        $valid['messages'] = "Successfully Removed";
    } else{
        $valid['success'] = false;
        $valid['messages'] = "Error while Removing the product";
    }
    
    // close
    $conn->close();

    echo json_encode($valid);

} // if
